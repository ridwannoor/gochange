@extends('back.layouts.app')

@section('m-subheader')
<div class="m-subheader">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/home" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                {{-- <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">Maps</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">JQVMap</span>
                    </a>
                </li> --}}
            </ul>
        </div>
     
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    <div class="col-lg-12">
        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text m--font-light">
                            Activity
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    {{-- <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                            <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                                <i class="fa fa-genderless m--font-light"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__section m-nav__section--first">
                                                    <span class="m-nav__section-text">Quick Actions</span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">Activity</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">Messages</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">FAQ</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="#" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-text">Support</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget17">
                    <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-primary">
                        <div class="m-widget17__chart" style="height:120px;"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="m_chart_activities" width="476" height="270" style="display: block; height: 216px; width: 381px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    <div class="m-widget17__stats">
                        <div class="m-widget17__items m-widget17__items-col1">
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-newspaper m--font-brand"></i>             
                                </span> 
                                <span class="m-widget17__subtitle">
                                    Artikel
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $blogs->count() }} 
                                </span>  
                            </div>
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="flaticon-paper-plane m--font-info"></i>             
                                </span>  
                                <span class="m-widget17__subtitle">
                                    Portfolio
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $portfolios->count() }} 
                                </span>  
                            </div>
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-shopping-bag m--font-brand"></i>             
                                </span> 
                                <span class="m-widget17__subtitle">
                                    Product
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $products->count() }} 
                                </span>  
                            </div>
                           
                        </div>
                        <div class="m-widget17__items m-widget17__items-col2">			     
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-child m--font-success"></i>
                                </span>  
                                <span class="m-widget17__subtitle">
                                    Team
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $teams->count() }} 
                                </span>  
                            </div>
                           
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-play m--font-brand"></i>             
                                </span> 
                                <span class="m-widget17__subtitle">
                                    Video
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $videos->count() }} 
                                </span>  
                            </div>
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-comment m--font-info"></i>             
                                </span>  
                                <span class="m-widget17__subtitle">
                                    Testimoni
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $testimonis->count() }} 
                                </span>  
                            </div>
                        </div>
                        <div class="m-widget17__items m-widget17__items-col3">			     
                            
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-minus m--font-danger"></i>
                                </span>  
                                <span class="m-widget17__subtitle">
                                    Service
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $services->count() }} 
                                </span>  
                            </div>
                           
                            <div class="m-widget17__item">
                                <span class="m-widget17__icon">
                                    <i class="fa fa-image m--font-info"></i>             
                                </span>  
                                <span class="m-widget17__subtitle">
                                    Gallery
                                </span> 
                                <span class="m-widget17__desc">
                                    {{ $gallerys->count() }} 
                                </span>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="alert alert-info m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30"
        role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation-1"></i>
        </div>
        <div class="m-alert__text">
            JQVMap is a jQuery plugin that renders Vector Maps with resizable Scalable Vector Graphics
            (SVG).
            For more info please check out <a class="m-link m-link--brand m--font-bold"
                href="http://jqvmap.com/" target="_blank">the official documentation.</a>
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                World Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_world" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                USA Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_usa" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Europe Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_europe" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Russia Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_russia" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Germany Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_germany" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div> --}}
</div>
@endsection

