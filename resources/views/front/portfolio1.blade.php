@extends('front.layouts.app')



@section('main')
<div id="fh5co-main">
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Portfolio</h2>
        <div class="row row-bottom-padded-md">
            @foreach ($portfolios as $item)
            @if ($item->is_published == 1)
            <div class="col-md-3 col-sm-6 col-padding text-center animate-box">
                <a href="/portfolio/detail/{{ $item->id }}" class="work image-popup" style="background-image: url({{ url('data_file/'.$item->image) }});">
                    <div class="desc">
                        <h3>{{ $item->title }}</h3>
                        <span>{{ $item->deskripsi }}</span>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
            
            
        </div>
    </div>

    @include('front.component.touch')
    
</div>
@endsection

