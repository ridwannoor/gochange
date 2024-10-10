<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                {{-- <h5 class="text-light footer-head font-weight-normal">{{ $generals->title }}</h5> --}}
                <a class="logo-footer" href="#">
                    <img src="{{ url('data_file/'.$generals->image) }}" height="35px" alt="">
                </a>
                <p class="mt-4" style="text-align: justify">{{ Str::limit( $generals->deskripsi ,200)}}</p>
              
            </div>
            <!--end col-->

            <!--end col-->

            <div class="col-lg-4 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head font-weight-normal">Menus</h5>
                <ul class="list-unstyled footer-list px-0 mt-4">
                    {{-- <li><a href="/" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i> Home</a></li> --}}
                    <li><a href="/produk" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Produk</a></li>
                    <li><a href="/blog" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Blog</a></li>
                    {{-- <li><a href="/partner" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Partner</a></li> --}}
                    {{-- <li><a href="/blog" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Blog</a></li>
                    <li><a href="/portfoliio" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Portfolio</a></li> --}}
                    <li><a href="/contact" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Contact</a></li>                    
                </ul>
            </div>
            <!--end col-->

            <div class="col-lg-4 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head font-weight-normal">Office</h5>
                <ul class="list-unstyled footer-list px-0 mt-4">
                    <li><i data-feather="map-pin" class="fea icon-sm mr-2"></i><a href="#" class="text-foot">{{ $generals->alamat }}</a></li>
                    <li><i data-feather="mail" class="fea icon-sm mr-2"></i><a href="mailto:{{ $generals->email }}"
                            class="text-foot">{{ $generals->email }}</a></li>
                    <li><i data-feather="phone" class="fea icon-sm mr-2"></i><a href="tel:{{ $generals->phone }}"
                            class="text-foot">{{ $generals->phone }}</a></li>
                </ul>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>
<!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-left">
                    <p class="mb-0">© 2022 atharva.id by CV Light Creative
                    </p>
                </div>
            </div>
            <!--end col-->

            <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <ul class="list-unstyled text-sm-right social-icon social mb-0">
                    <li class="list-inline-item"><a href="{{ $generals->facebook }}"  target="__blank" class="rounded"><i
                                data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="{{ $generals->instagram }}" target="__blank" class="rounded"><i
                                data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="{{ $generals->youtube }}" class="rounded"><i
                                data-feather="youtube" class="fea icon-sm fea-youtube"></i></a></li>
                    {{-- <li class="list-inline-item"><a href="{{ $generals->alamat }}" class="rounded"><i
                                data-feather="github" class="fea icon-sm fea-social"></i></a></li> --}}
                    {{-- <li class="list-inline-item"><a href="{{ $generals->linkedin }}" target="__blank" class="rounded"><i
                                data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li> --}}
                </ul>
                <!--end icon-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>