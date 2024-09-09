@extends('front.layouts.app')



@section('main')
 <!-- About Start -->
 <section class="comingsoon vh-100 d-flex align-items-center bg-white">
    <div class="container-fluid px-0">
        <div class="row no-gutters position-relative">
            <div class="col-lg-6 offset-lg-6 padding-less img overflow-hidden vh-100 d-flex justify-content-center align-items-center" style="background-image:url('front/assets/images/bg/comingsoon.jpg')"></div><!-- end col -->    

            <div class="col-lg-6 hero-my-60">
                <div class="hero-img vh-100 d-flex justify-content-center align-items-center mx-3 mx-md-5 px-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <a href="javascript:void(0)">
                                {{-- <img src="front/assets/images/logo-dark.png" height="24" alt=""> --}}
                            </a>
                            <h3 class="text-uppercase my-4">Coming Soon...</h3>
                            <p class="text-muted para-desc para-dark mx-auto">Tampilan Ini Sedang Dalam Pengembangan, Mohon Menunggu</p>
                            <div id="countdown"></div>
                            <a href="/" class="btn btn-primary mt-4">Go Back Home</a>
                        </div>
                    </div>
                </div><!-- end about detail -->
            </div><!-- end col -->
        </div><!--end row-->
    </div><!-- end container fluid -->
</section><!-- end section -->
<!-- Contact End -->
<!-- About End -->
@endsection

