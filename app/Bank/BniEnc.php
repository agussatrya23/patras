<?php
namespace App\Bank;

class BniEnc
{
	const TIME_DIFF_LIMIT = 480;

	public static function encrypt(array $json_data, $cid, $secret) {
		return self::doubleEncrypt(strrev(time()) . '.' . json_encode($json_data), $cid, $secret);
	}

	public static function decrypt($hased_string, $cid, $secret) {
		$parsed_string = self::doubleDecrypt($hased_string, $cid, $secret);
		list($timestamp, $data) = array_pad(explode('.', $parsed_string, 2), 2, null);
		if (self::tsDiff(strrev($timestamp)) === true) {
			return json_decode($data, true);
		}
		return null;
	}

	private static function tsDiff($ts) {
		return abs($ts - time()) <= self::TIME_DIFF_LIMIT;
	}

	private static function doubleEncrypt($string, $cid, $secret) {
		$result = '';
		$result = self::enc($string, $cid);
		$result = self::enc($result, $secret);
		return strtr(rtrim(base64_encode($result), '='), '+/', '-_');
	}

	private static function enc($string, $key) {
		$result = '';
		$strls = strlen($string);
		$strlk = strlen($key);
		for($i = 0; $i < $strls; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % $strlk) - 1, 1);
			$char = chr((ord($char) + ord($keychar)) % 128);
			$result .= $char;
		}
		return $result;
	}

	private static function doubleDecrypt($string, $cid, $secret) {
		$result = base64_decode(strtr(str_pad($string, ceil(strlen($string) / 4) * 4, '=', STR_PAD_RIGHT), '-_', '+/'));
		$result = self::dec($result, $cid);
		$result = self::dec($result, $secret);
		return $result;
	}

	private static function dec($string, $key) {
		$result = '';
		$strls = strlen($string);
		$strlk = strlen($key);
		for($i = 0; $i < $strls; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % $strlk) - 1, 1);
			$char = chr(((ord($char) - ord($keychar)) + 256) % 128);
			$result .= $char;
		}
		return $result;
	}

	private static function get_content($url, $post = '') {
		$usecookie = __DIR__ . "/cookie.txt";
		$header[] = 'Content-Type: application/json';
		$header[] = "Accept-Encoding: gzip, deflate";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		// curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_ENCODING, true);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");

		if ($post)
		{
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$rs = curl_exec($ch);

		if(empty($rs)){
			var_dump($rs, curl_error($ch));
			curl_close($ch);
			return false;
		}
		curl_close($ch);
		return $rs;
	}

	public static function execution($data_asli,$client_id,$secret_key,$url)
	{
		$hashed_string = self::encrypt($data_asli,$client_id,$secret_key);

		$data = array(
			'client_id' => $client_id,
			'data' => $hashed_string,
		);

		$response = self::get_content($url, json_encode($data));
		$response_json = json_decode($response, true);
		if ($response_json['status'] !== '000') {
			var_dump($response_json);
		}
		else {
			$data_response = self::decrypt($response_json['data'], $client_id, $secret_key);
		}
		$data_response['status'] = $response_json['status'];
		return $data_response;
	}

}
