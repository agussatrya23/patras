<script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script type="text/javascript">
    
    var instafeedLimit;
    if ($(window).width() < 760) {
        instafeedLimit = 6;
    } else if ($(window).width() < 991) {
        instafeedLimit = 6;
    } else {
        instafeedLimit = 9;
    }
    if ($('#instafeed-container').length) {
        var userFeed = new Instafeed({
            get: 'user',
            sortBy: 'most-recent',
            limit: instafeedLimit,
            target: "instafeed-container",
            accessToken: 'IGQWROb3ZAqYnhtNFVqSkhIRE1sRksxM1NFeVJQLXhzcUpvcXNpUUZAHQWhSbVBYa1lJcFU4d1Vma3p6VjM0RlJzM1N0ODNQaU9GQzZACUi14cjBTSExCa09lT19ob25mM3VxUDNfNkNnbTczQ3RIdTZAhcGM0M3plR00ZD',
            template: '<div class="col-lg-4 col-md-6 col-sm-6 col-11" style="padding-right:5px; padding-left:5px;">\
                            <div class="news_box style_four has_images" style="background-image: url({{image}});">\
                                <a href="{{link}}" target="_blank" class="auhtour_box">\
                                    <img src="'+ urlAsset +'/images/intagram-img.jpg" class="img-fluid">\
                                    <div class="contnet_a">\
                                        <h4> {{username}} </h4>\
                                    </div>\
                                </a>\
                                <div class="date">\
                                    <a href="{{link}}" target="_blank" class="{{type}}"></a>\
                                </div>\
                                <div class="content_box">\
                                    <div class="category">\
                                        <a href="{{link}}" target="_blank" class="categories">\
                                            <img src="'+ urlAsset +'/images/heart.png" class="img-fluid">\
                                        </a>\
                                        <a href="{{link}}" target="_blank" class="categories">\
                                            <img src="'+ urlAsset +'/images/comment.png" class="img-fluid">\
                                        </a>\
                                        <a href="{{link}}" target="_blank" class="categories">\
                                            <img src="'+ urlAsset +'/images/share.png" class="img-fluid">\
                                        </a>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>',
            after: function() {
                function tanggalInsta(tgl) {
                    if (tgl == null) {
                        return 'undefined';
                    }
                    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    let tglnya = new Date(tgl);
                    let skrng = new Date().getDate();
                    let skrngjam = new Date().getHours();
                    let skrngmenit = new Date().getMinutes();
                    let thn = tglnya.getFullYear();
                    let bln = monthNames[tglnya.getMonth()];
                    let hr = tglnya.getDate();
                    let hours = tglnya.getHours();
                    let minutes = tglnya.getMinutes();
                    let lalu = skrng - hr;
                    let jamlalu = skrngjam - hours;
                    let menitlalu = skrngmenit - minutes;
                    if (lalu == 0) {
                        if (jamlalu > 0) {
                            return jamlalu + ' jam yang lalu';
                        } else {
                            if (menitlalu > 0) {
                                return menitlalu + ' menit yang lalu';
                            } else {
                                return 'baru saja';
                            }
                        }
                        // console.log(tglnya.getHours());
                    } else if (lalu >= 1 && lalu < 7) {
                        return lalu + ' hari yang lalu';
                    } else if (lalu == 7) {
                        return '1 minggu yang lalu';
                    } else {
                        return hr+' '+bln+' '+thn;
                    }
                }
                
                const tanggal_insta = $('#instafeed-container').find('.posttime-insta');
                $.each(tanggal_insta, function (index, value) {
                    tanggal_insta.eq(index).html(tanggalInsta(tanggal_insta.eq(index).text()));
                })
                // $('#instafeed-container').masonry({
                //     // options...
                //     itemSelector: '.grid-item',
                //     columnWidth: '.grid-item',
                //     fitWidth: true,
                // });
                
            }
        });
        userFeed.run();
    }
</script>
