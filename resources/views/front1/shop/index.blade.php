@extends('front.layouts.app')

@section('main')

 <!-- Start Classic Work -->
 <section class="bg-half-170">
    <div class="container">
        <div class="row">
            <ul class="col container-filter list-unstyled categories-filter text-center" id="filter">
               
                @foreach ($products as $item)
                    {{-- <li class="list-inline-item"><a class="categories d-block text-muted rounded {{ $loop->first ? 'active' :'' }}" data-filter="*">All</a></li> --}}
                    <li class="list-inline-item"><a class="categories d-block text-muted rounded {{ $loop->first ? 'active' :'' }}" data-filter=".{{ $item->categoryproduct->title }}">{{ $item->categoryproduct->title }}</a></li>
                @endforeach
                {{-- <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".branding">Branding</a></li>
                <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".designing">Designing</a></li>
                <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".photography">Photography</a></li>
                <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".development">Development</a></li> --}}
            </ul>
        </div><!--end row-->
    </div><!--end container-->

    <div class="container">
        <div class="row projects-wrapper">
            @foreach ($products as $item)
            <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2 {{ $item->categoryproduct->title }}">
                <div class="work-container work-classic">
                    @foreach ($item->productdetails as $itemdetails)
                    <div id="carouselExampleIndicators" class="img-fluid rounded work-image" data-ride="carousel" data-interval="5000">

                        {{-- <ol class="carousel-indicators">
                            @foreach ($item->productdetails as $itemdetails)				
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' :'' }}"></li>
                            @endforeach
                        </ol> --}}
            
                        <div class="carousel-inner" role="listbox">
                            @foreach ($item->productdetails as $itemdetails)
                            <!-- Slider 1 -->
                            <div class="carousel-item {{ $loop->first ? 'active' :'' }}">
                                <img class="img-fluid" src="{{ url('data_file/product/'.$itemdetails->image) }}" alt="First slide">
                            </div>
                            @endforeach				
                        </div>
            
            
                    </div>
                    {{-- <a href="/shop/detail/{{ $item->id }}"><img src="{{ url('data_file/product/'.$itemdetails->image) }}" class="img-fluid rounded work-image" alt=""></a> --}}
                    @endforeach		
                    <div class="content pt-3">
                        <h5 class="mb-0"><a href="/shop/detail/{{ $item->id }}" class="text-dark title">{{ $item->title }}</a></h5>
                        <h6 class="text-muted tag mb-0">{{ $item->categoryproduct->title }}</h6>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
           
            
           
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

{{-- <section class="bg-half-170">

    <div class="container">

        <div class="masonry-loader masonry-loader-showing">
            <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                @foreach ($products as $item)
                    @if ($item->is_published == 1)
                        
                <div class="col-12 col-sm-6 col-lg-3 product">
                    <a href="/shop/detail/{{ $item->id }}">
                        <span class="onsale">Sale!</span>
                    </a>
                    <span class="product-thumb-info border-0">
                        <a href="#" class="add-to-cart-product bg-color-primary">
                            <span class="text-uppercase text-1">Add to Cart</span>
                        </a>
                        <a href="/shop/detail/{{ $item->id }}"> 
                               
                                <div id="carouselExampleIndicators" class="product-thumb-info-image" data-ride="carousel" data-interval="5000">

                                    <ol class="carousel-indicators">
                                        @foreach ($item->productdetails as $itemdetails)				
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' :'' }}"></li>
                                        @endforeach
                                    </ol>
                        
                                    <div class="carousel-inner" role="listbox">
                                        @foreach ($item->productdetails as $itemdetails)
                                        <!-- Slider 1 -->
                                        <div class="carousel-item {{ $loop->first ? 'active' :'' }}">
                                            <img class="img-fluid" src="{{ url('data_file/product/'.$itemdetails->image) }}" alt="First slide">
                                        </div>
                                        @endforeach				
                                    </div>
                                </div>
                               
                        </a>
                        <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                            <a href="/shop/detail/{{ $item->id }}">
                                <h4 class="text-4 text-primary">{{ $item->title }}</h4>
                                <span class="price">
                                    
                                    <ins><span class="amount text-dark font-weight-semibold">Call Us</span></ins>
                                </span>
                            </a>
                        </span>
                    </span>
                </div>

                @endif        
                @endforeach
            </div>
            <div class="row">
                <div class="col">
                    <ul class="pagination float-right">
                        <li class="page-item"></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</section> --}}

@endsection