@extends('front.layouts.app')



@section('main')
 <!-- Blog Start -->
 <section class="bg-half-170">
    <div class="container">
        <div class="row">
            @foreach ($posts as $item)
                @if ($item->is_published == 1)
                    
            <div class="col-lg-4 col-md-6 col-12 mb-4 pb-2">
                <div class="blog-post shadow rounded position-relative overflow-hidden">
                    <div class="blog-img overflow-hidden position-relative">
                        <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid" width="100%" alt="">
                        <div class="overlay bg-dark"></div>
                        <div class="d-flex author-desc align-items-center">
                            {{-- <img src="images/client/05.jpg" class="img-fluid avatar avatar-md-sm rounded-pill mr-2 shadow" alt=""> --}}
                            <div class="author">
                                <a href="javascript:void(0)" class="text-white h6 name">{{ $item->user->name }}</a><p class="text-white-50 small mb-0">{{ $item->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="shape overflow-hidden text-white">
                            <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="blog-content p-4">
                        <h5><a href="/blog/detail/{{ $item->id }}" class="title text-dark">{{ $item->title }}</a></h5>
                        <p class="text-muted">{!! Str::limit($item->deskripsi ,100)!!}</p>

                        <div class="post-meta d-flex justify-content-between pt-3 border-top">
                            <ul class="list-unstyled mb-0">
                                {{-- <li class="list-inline-item"><a href="javascript:void(0)" class="text-dark like mr-2"><i data-feather="heart" class="fea icon-sm like-icon mr-1"></i>36</a></li> --}}
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-dark comment"><i data-feather="message-circle" class="fea icon-sm mr-1"></i>{{ $item->comment_count }}</a></li>
                            </ul>
                            <a href="/blog/detail/{{ $item->id }}" class="text-dark read">Read More <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!--end post-->
            </div><!--end col-->

            @endif
            @endforeach
            <div class="col-12">
                <ul class="pagination mb-0 justify-content-center list-unstyled">
                    <li class="d-inline"><a href="#" class="float-left text-dark border rounded pr-3 pl-3 pt-2 pb-2">{{ $posts->links() }}</a></li>
                    {{-- <li class="active d-inline"><a href="#" class="float-left text-white border rounded pr-3 pl-3 pt-2 pb-2">1</a></li>
                    <li class="d-inline"><a href="#" class="float-left text-dark border rounded pr-3 pl-3 pt-2 pb-2">2</a></li>
                    <li class="d-inline"><a href="#" class="float-left text-dark border rounded pr-3 pl-3 pt-2 pb-2">3</a></li>
                    <li class="d-inline"><a href="#" class="float-left text-dark border pr-3 pl-3 pt-2 pb-2"><i data-feather="chevrons-right" class="fea icon-sm"></i></a></li> --}}
                </ul>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Blog End -->

@endsection

