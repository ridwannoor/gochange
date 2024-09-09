@extends('front.layouts.app')

@section('main')
<div id="fh5co-main">
    

    <div class="fh5co-narrow-content">
        <div class="row pb-4 mb-2">
            <div class="col-md-6 mb-4 mb-md-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">

                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark mt-3" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="{{ url('data_file/'.$portfolios->image) }}" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div>
                    {{-- <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="img/projects/project-short-2.jpg" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                            <img src="img/projects/project-short-3.jpg" class="img-fluid border-radius-0" alt="">
                        </div>
                    </div> --}}
                </div>

                <hr class="solid my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1000">

                <div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1100">
                    <strong class="text-uppercase text-1 mr-3 text-dark float-left position-relative top-2">Share</strong>
                    <ul class="social-icons">
                        <li class="social-icons-facebook"><a href="{{ $generals->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-whatsapp"><a href="{{ $generals->whatsapp }}" target="_blank" title="Twitter"><i class="fab fa-whatsapp"></i></a></li>
                        <li class="social-icons-instagram"><a href="{{ $generals->instagram }}" target="_blank" title="Linkedin"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-normal text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="600">Portfolio <strong class="font-weight-extra-bold">Description</strong></h2>
                </div>
                <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">{{ $portfolios->deskripsi }}</p>

                <div class="overflow-hidden mt-4">
                    <h2 class="text-color-dark font-weight-normal text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000">Portfolio <strong class="font-weight-extra-bold">Details</strong></h2>
                </div>
                <ul class="list list-icons list-primary list-borders text-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">
                    <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Client:</strong>{{ $portfolios->title }}</li>
                    <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Date:</strong> {{ $portfolios->created_at }}</li>
                    <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Category:</strong><a href="#" class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">{{ $portfolios->category->title }}</a> </li>
                    {{-- <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Tag:</strong> <a href="#" class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">DESIGN</a><a href="#" class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">BRAND</a><a href="#" class="badge badge-dark badge-sm badge-pill px-2 py-1 ml-1">WEBSITES</a></li> --}}
                    <li><i class="fas fa-caret-right left-10"></i> <strong class="text-color-primary">Project URL:</strong> <a href="#" target="_blank" class="text-dark">{{ $portfolios->url }}</a></li>
                </ul>
            </div>
        </div>

    </div>

</div>

<section class="section section-height-3 bg-color-grey m-0 border-0 appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': -150}">
    <div class="container py-4">
        <h4 class="mb-3 text-4 text-uppercase">Related <strong class="font-weight-extra-bold">Portfolio</strong></h4>
        <div class="row">
            @foreach ($port as $item)
            @if ($portfolios->id != $item->id)            
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="portfolio-item">
                    <a href="portfolio-single-wide-slider.html">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid border-radius-0" alt="">
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner">{{ $item->title }}</span>
                                    <span class="thumb-info-type">{{ $item->category->title }}</span>
                                </span>
                                <span class="thumb-info-action">
                                    <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
                                </span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
            @endif    
            @endforeach            
        </div>
    </div>
</section>

@endsection