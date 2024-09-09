@extends('front.layouts.app')

@section('main')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">

                <div class="col-md-12 align-self-center p-static order-2 text-center">

                    <h1 class="text-dark font-weight-bold text-8">Blog</h1>
{{-- <span class="sub-title text-dark">Check out our Latest News!</span> --}}
                </div>

                <div class="col-md-12 align-self-center order-1">

                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">
                        @foreach ($posts as $item)
                            @if ($item->is_published == 1)
                                
                        <div class="col-md-4 col-lg-3">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="/blog/detail/{{ $item->id }}">
                                        <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="/blog/detail/{{ $item->id }}">{{ $item->title }}</a></h2>
                                    <p>{{ Str::limit($item->expend ,200)}}</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a href="#">{{ $item->user->name }}</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">{{ $item->category->title }}</a></span>
                                        <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                        <span class="d-block mt-2"><a href="/blog/detail/{{ $item->id }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>

                        @endif
                        @endforeach
                       
                    </div>

                    <div class="row">
                        <div class="col">
                           
                            <ul class="pagination float-right">
                                {{-- <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li> --}}
                                <li class="page-item active"><a class="page-link" href="{{ $posts->links() }}"></a></li>
                               {{-- <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                                {{-- <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a> --}}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection


