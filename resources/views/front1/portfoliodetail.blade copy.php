@extends('front.layouts.app')



@section('main')
<div id="fh5co-main">
    <div class="fh5co-narrow-content">
        <div class="row row-bottom-padded-md">
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <img class="img-responsive" src="{{ url('data_file/'.$portfolios->image) }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <h2 class="fh5co-heading">{{ $portfolios->title }}</h2>
                <p>{{ $portfolios->deskripsi }}</p>
                {{-- <p>Quisque sit amet efficitur nih. Interdum et malesuada fames ac ante ipsum primis in faucibus interda et malesuada parturient.</p> --}}
            </div>

            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                {{-- <h3><a href="/blog/detail/{{ $portfolios->id }}">{{ $item->title }}</a></h3> --}}
                <span><small>by {{ $portfolios->user->name }} </small> / <small>{{ $portfolios->category->title }} </small> </span>
                {{-- <p>{{ Str::limit($item->expend ,50)}}</p> --}}
                {{-- <a href="/blog/detail/{{ $item->id }}" class="lead">Read More <i class="icon-arrow-right3"></i></a> --}}
            </div>
        </div>
    </div>
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Portfolios</h2>
        <div class="row row-bottom-padded-md">
            @foreach ($port as $item)
            @if ($item->is_published == 1)
            @if ($portfolios->id != $item->id) 
            <div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
                <div class="blog-entry">
                    <a href="/portfolio/detail/{{ $item->id }}" class="blog-img"><img src="{{ url('data_file/'.$item->image) }}" class="img-responsive"
                            alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
                    <div class="desc">
                        <h3><a href="/portfolio/detail/{{ $item->id }}">{{ $item->title }}</a></h3>
                        <span><small>by {{ $item->user->name }} </small> / <small>{{ $item->category->title }} </small></span>
                        <p>{{ $item->expend }}
                        </p>
                        <a href="/portfolio/detail/{{ $item->id }}" class="lead">Read More <i class="icon-arrow-right3"></i></a>
                    </div>
                </div>
            </div>
            @endif 
            @endif 
            @endforeach
        </div>
    </div>

</div>
@endsection

