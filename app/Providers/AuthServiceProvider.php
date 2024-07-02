<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\JadwalPelajaran;
use App\Models\MdKelas;
use App\Models\MdMapelJenis;
use App\Models\RiwayatPejabat;
use App\Models\RiwayatPembinaEkskul;
use App\Models\Ta;
use App\Helper;
use auth;

class AuthServiceProvider extends ServiceProvider
{
  /**
  * The policy mappings for the application.
  *
  * @var array
  */
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
  * Register any authentication / authorization services.
  *
  * @return void
  */
  public function boot()
  {
    $this->registerPolicies();
  }
}
