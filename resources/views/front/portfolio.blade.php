@extends('front.layouts.app')



@section('main')


{{-- <section class="bg-half-260" style="background: url('front/assets/images/work/bg.jpg') center center;"></section> --}}

<section class="bg-half-170">
    <div class="container">
        <div class="row justify-content-center">
            <ul class="col container-filter list-unstyled categories-filter text-center" id="filter">
                <li class="list-inline-item"><a class="categories d-block text-muted rounded active" data-filter="*">All</a></li>
                @foreach ($portfolios as $item)
                 @if ($item->is_published == 1 )   
                <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".{{ $item->category->title }}">{{ $item->category->title }}</a></li>
                {{-- <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".designing">Designing</a></li>
                <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".photography">Photography</a></li>
                <li class="list-inline-item"><a class="categories d-block text-muted rounded" data-filter=".development">Development</a></li> --}}
                @endif
                @endforeach
            </ul>
        </div><!--end row-->
    </div><!--end container-->

    <div class="container">
        <div class="row projects-wrapper">
           
            @foreach ($portfolios as $item)
            @if ($item->is_published == 1 )   
                <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2 {{ $item->category->title }}">
                    <div class="work-container work-grid position-relative d-block overflow-hidden rounded">
                        <a class="mfp-image d-inline-block" href="{{ url('data_file/'.$item->image) }}" title="">
                            <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid" alt="work-image">
                        </a>
                        <div class="content bg-white p-3">
                            <h5 class="mb-0"><a href="/portfolio/detail/{{ $item->id }}" class="text-dark title">{{ $item->title }}</a></h5>
                            <h6 class="text-muted tag mb-0">{{ $item->deskripsi }}</h6>
                        </div>
                    </div>
                </div>
                @endif   
            @endforeach
        
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

@endsection