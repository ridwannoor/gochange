@extends('front.layouts.app')


@section('content')
  {{-- @include('front.component.slider') --}}
  <section id="slider" class="slider-element slider-parallax"
            style="background: url('front/images/landing/landing1.jpg') no-repeat; background-size: cover"
            data-height-xl="600" data-height-lg="500" data-height-md="400" data-height-sm="300" data-height-xs="250">
            <div class="slider-parallax-inner">
                <div class="container clearfix">
                    <div class="vertical-middle dark center">
                        <div class="heading-block nobottommargin center">
                            <h1>
                                <span class="text-rotater nocolor" data-separator="|" data-rotate="flipInX"
                                    data-speed="3500">
                                    Sunday Sunset Menjadikan Pembayaranmu Lebih <span
                                        class="t-rotate">Mudah|Aman|Cepat|Terpercaya</span>
                                </span>
                            </h1>
                            <span class="d-none d-md-block">Rate Pembayaran yang Rendah dan Bersaing.</span>
                        </div>
                        <a href="#"
                            class="button button-border button-light button-rounded button-reveal tright button-large topmargin d-none d-md-inline-block"><i
                                class="icon-angle-right"></i><span>Beli Sekarang</span></a>
                    </div>
                </div>
            </div>
        </section>
        
     <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="col_one_third">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-lock1 i-alt"></i></a>
                            </div>
                            <h3>Transaksi Aman</h3>
                            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size.
                                Resize browser to view.</p>
                        </div>
                    </div>
                    <div class="col_one_third">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-money-bill-alt i-alt"></i></a>
                            </div>
                            <h3>Transaksi Cepat & Mudah </h3>
                            <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp;
                                all others graphics are optimized.</p>
                        </div>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-clock1 i-alt"></i></a>
                            </div>
                            <h3>Jaminan Tepat Waktu</h3>
                            <p>Transaksi dilakukan di hari yang sama 1 x 24 jam</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                    {{-- <div class="col_one_third nobottommargin">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-stack i-alt"></i></a>
                            </div>
                            <h3>Premium Sliders Included</h3>
                            <p>Canvas included 20+ custom designed Slider Pages with Premium Sliders like Layer,
                                Revolution, Swiper &amp; others.</p>
                        </div>
                    </div>
                    <div class="col_one_third nobottommargin">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-tint i-alt"></i></a>
                            </div>
                            <h3>Unlimited Color Options</h3>
                            <p>Change the color scheme of the Theme in a flash just by changing the 6-digit HEX code in
                                the colors.php file.</p>
                        </div>
                    </div>
                    <div class="col_one_third nobottommargin col_last">
                        <div class="feature-box fbox-border fbox-effect">
                            <div class="fbox-icon">
                                <a href="#"><i class="icon-text-width i-alt"></i></a>
                            </div>
                            <h3>CUSTOMIZABLE FONTS</h3>
                            <p>Use any Font you like from Google Web Fonts, Typekit or other Web Fonts. They will blend
                                in perfectly.</p>
                        </div>
                    </div>
                    <div class="clear"></div> --}}
                </div>
                <div class="promo topmargin-lg promo-border bottommargin-lg promo-full">
                    <div class="container clearfix">
                        <h3>Hubungi Kami hari ini di <span>{{ $generals->phone }}</span> atau Email di <span><a
                                    href="http://themes.semicolonweb.com/cdn-cgi/l/email-protection"
                                    class="__cf_email__"
                                    data-cfemail="bfcccacfcfd0cdcbffdcded1c9decc91dcd0d2">{{ $generals->email }}</a></span>
                        </h3>
                        <span>Kami berusaha untuk menyediakan Pelanggan Kami dengan Dukungan 7x24 Jam</span>
                        <a href="#" class="button button-xlarge button-rounded">Hubungi Kami</a>
                    </div>
                </div>
                <div class="container clearfix">
                    <div id="side-navigation">
                        <div class="col_one_third nobottommargin">
                            <ul class="sidenav">
                                <li class="ui-tabs-active"><a href="#snav-content1"><i
                                            class="icon-screen"></i>Responsive Layout<i
                                            class="icon-chevron-right"></i></a></li>
                                <li><a href="#snav-content2"><i class="icon-magic"></i>Retina Ready Display<i
                                            class="icon-chevron-right"></i></a></li>
                                <li><a href="#snav-content3"><i class="icon-star3"></i>Fast Performance<i
                                            class="icon-chevron-right"></i></a></li>
                                <li><a href="#snav-content4"><i class="icon-gift"></i>Bootstrap 3.2 Compatible<i
                                            class="icon-chevron-right"></i></a></li>
                                <li><a href="#snav-content5"><i class="icon-adjust"></i>Light &amp; Dark Scheme<i
                                            class="icon-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="col_two_third col_last nobottommargin">
                            <div id="snav-content1">
                                <div class="heading-block">
                                    <h3>Flexible Responsive Layout</h3>
                                    <span>We support multiple Devices &amp; Layouts.</span>
                                </div>
                                <img src="front/images/others/mac-phone.png" alt="Image" class="alignleft"
                                    style="max-width: 320px;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo rerum facilis deserunt
                                    maxime perspiciatis suscipit numquam ipsam, quisquam nesciunt, expedita voluptas et
                                    placeat odio nisi dolorum. Ab minus nam tenetur accusamus eligendi maiores natus
                                    ipsum ratione possimus a, nostrum atque!</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur tempora
                                    perferendis maiores saepe voluptatibus possimus, voluptatum laborum. Veritatis
                                    deleniti expedita veniam quo eum commodi laboriosam illo obcaecati sit in, illum
                                    saepe neque voluptas quis, ullam porro autem. Qui incidunt amet eum dolores
                                    expedita, sit laudantium, saepe. Nam tempore rerum, quibusdam est quia impedit rem
                                    unde nostrum voluptatum minus ipsa quam fugiat ullam voluptatibus neque accusamus
                                    modi eos veniam. Dolor, reiciendis.</p>
                            </div>
                            <div id="snav-content2">
                                <div class="heading-block">
                                    <h3>Brilliant Retina Display</h3>
                                    <span>Crisp &amp; Clear Graphics across all your Retina &amp; Standard
                                        Devices.</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis praesentium quaerat
                                    blanditiis incidunt corporis, odit placeat dolorum. Voluptate laborum facere
                                    reprehenderit dolores repudiandae voluptatibus earum quod dignissimos odit! Aperiam
                                    optio delectus dolorum, fugit praesentium aut voluptate autem, sapiente labore
                                    architecto magni cumque magnam nobis, error accusamus soluta. Facilis, architecto,
                                    eos!</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum consequuntur quaerat
                                    vero qui ipsum sunt velit vel, officia, nihil amet ullam. Omnis nam rerum, harum!
                                </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima perspiciatis cumque,
                                    ipsa laudantium totam blanditiis, expedita ut odit, cupiditate rem facilis ea ab,
                                    hic amet numquam nulla possimus consectetur ipsum fuga! Atque quibusdam, id eius
                                    illum numquam porro architecto accusamus nam adipisci mollitia excepturi dolores
                                    non, maiores sit fuga vero cumque ullam. Vitae quidem totam similique tempore
                                    eligendi necessitatibus culpa.</p>
                            </div>
                            <div id="snav-content3">
                                <div class="heading-block">
                                    <h3>Powerful &amp; Optimized Code</h3>
                                    <span>Smart Reusable code all throughout the Template for Infinite
                                        Customizations.</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit perferendis quisquam
                                    quod eius illo possimus id maiores consequatur accusamus commodi?</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, optio animi adipisci
                                    distinctio fuga, nihil perferendis dignissimos. Aperiam odio voluptatem dignissimos
                                    aliquam? Ea, nihil animi, recusandae quos nulla, suscipit magni provident nesciunt
                                    incidunt quo dicta asperiores iste. Illo, qui culpa. Reprehenderit in asperiores
                                    blanditiis pariatur aliquid iusto. Quisquam voluptatibus nostrum architecto
                                    repudiandae voluptate, ipsum quae iure! Commodi recusandae, repellendus voluptas
                                    fugiat aspernatur culpa quod delectus quidem consequatur odio assumenda saepe
                                    inventore molestiae ea expedita hic dolorum distinctio ut! Maiores, error.</p>
                            </div>
                            <div id="snav-content4">
                                <div class="heading-block">
                                    <h3>Bootstrap Compatible</h3>
                                    <span>Use the amazing features of the Bootstrap Framework.</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam facilis reiciendis
                                    maxime minus, iusto molestiae dolor veritatis officia cumque a sit, ducimus iste
                                    beatae eos harum fugit. Fuga et, iste sequi ea quibusdam doloremque delectus.
                                    Ducimus delectus incidunt, deleniti assumenda dignissimos magni, quo laboriosam
                                    architecto dolorum, facere cum tempore, totam.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum esse odio, voluptatem,
                                    fuga dolore labore. Voluptate, tenetur. Ab temporibus sed adipisci dolor ipsa cumque
                                    iusto maiores dolorum molestias magni expedita pariatur modi facere cupiditate eius
                                    quas, officiis eligendi cum veritatis dolore autem? Inventore vero doloremque sunt,
                                    et modi eos placeat.</p>
                            </div>
                            <div id="snav-content5">
                                <div class="heading-block">
                                    <h3>Light &amp; Dark Schemes</h3>
                                    <span>Use the dual tone schemes or mix them according to your needs.</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium voluptas
                                    eveniet, recusandae ducimus commodi, maiores voluptatem consequuntur autem quod id
                                    molestiae quam nulla minus aliquam nobis laboriosam nisi ut aut adipisci esse omnis
                                    at. Voluptatem, natus distinctio minus possimus, aliquid magnam ratione. Adipisci
                                    odit nemo voluptatum quas animi, amet et fuga quisquam possimus, dolore id sint eum
                                    consequuntur, magnam aliquid impedit doloremque voluptates, ducimus laboriosam. Sint
                                    quisquam molestias libero voluptatum.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur nisi nemo et
                                    esse. Fugiat facere harum, error iusto assumenda illo debitis quas, fugit similique
                                    minima.</p>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    {{-- <div class="line"></div>
                    <h4 class="center">Layanan Kami</h4>
                    <ul class="clients-grid grid-6 bottommargin clearfix">
                        @foreach ($sponsors as $item)
                               <li><img src="{{ url('data_file/'.$item->image) }}"
                                    alt="Clients"></li>
                        @endforeach
                     
                                   
                         <li><a href="http://logofury.com/logo/enzo.html"><img src="front/images/clients/1.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofury.com/"><img src="front/images/clients/2.png" alt="Clients"></a></li>
                        <li><a href="http://logofaves.com/2014/03/grabbt/"><img src="front/images/clients/3.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofaves.com/2014/01/ladera-granola/"><img src="front/images/clients/4.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofaves.com/2014/02/hershel-farms/"><img src="front/images/clients/5.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofury.com/logo/food-fight-radio.html"><img src="front/images/clients/6.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofury.com/"><img src="front/images/clients/7.png" alt="Clients"></a></li>
                        <li><a href="http://logofury.com/logo/up-travel.html"><img src="front/images/clients/8.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofury.com/logo/caffi-bardi.html"><img src="front/images/clients/9.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofury.com/logo/bignix-design.html"><img src="front/images/clients/10.png"
                                    alt="Clients"></a></li>
                        <li><a href="http://logofury.com/"><img src="front/images/clients/11.png" alt="Clients"></a></li>
                        <li><a href="http://logofury.com/"><img src="front/images/clients/12.png" alt="Clients"></a></li>
                    </ul> --}}
                </div>
                <a href="#" class="button button-full center tright footer-stick">
                    <div class="container clearfix">
                        {{-- @php
                            $response =  json_decode(file_get_contents('/wskursbi.asmx/getSubKursAsing1? HTTP/1.1')); 
                        @endphp --}}
                   {{-- {{ $response->kurs->USD->jual }} --}}
                       {{-- <span>Kurs jual USD hari ini: </span>  . {{ $response->kurs->USD->jual }} . '<br>';
                        <span>Kurs beli USD hari ini:</span> . {{ $response->kurs->USD->beli }} . '<br>'; --}}
                        {{-- {{dd($bank ) }} --}}
                        {{-- {{ $data("kurs") }} --}}
                      Rate harga hanya <strong>Rp 15.775</strong> Konsultasi Terlebih Dahulu.
                      {{-- <i class="icon-caret-right" style="top:4px;"></i> --}}
                    </div>
                </a>
            </div>
        </section>
@endsection