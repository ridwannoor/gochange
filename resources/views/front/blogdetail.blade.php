@extends('front.layouts.app')



@section('main')
<!-- Hero Start -->
<section class="bg-half-170 bg-animation-left half-home shadow d-table w-100">
    <div class="container">
        <div class="row align-items-center position-relative" style="z-index: 1;">
            <div class="col-lg-6">
                <img src="{{ url('data_file/'.$posts->image) }}" class="img-fluid rounded" alt="">
            </div><!--end col-->

            <div class="col-lg-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="title-heading ml-lg-4">
                    <ul class="post-meta list-unstyled">
                        <li class="list-inline-item h6 user text-muted mr-2"><i data-feather="tag" class="fea icon-sm"></i> <a href="javascript:void(0)" class="text-muted tag">{{ $posts->categorypost->title }}</a></li>
                        <li class="list-inline-item h6 date text-muted"><i data-feather="calendar" class="fea icon-sm"></i> {{ $posts->created_at }}</li>
                    </ul>
                    <h4>{{ $posts->title }}</h4>
                    {{-- <div class="mt-4">
                        <div class="d-flex">
                            <img src="images/client/05.jpg" class="img-fluid avatar avatar-md-sm rounded-pill mr-2 shadow" alt="">
                            <div class="author mt-2">
                                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark name">Lisa Marvel</a></h6>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Post detail Start -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="blog-post single-blog-post p-4 shadow rounded position-relative overflow-hidden">
                    <div class="blog-content">
                        <div class="post-meta d-flex justify-content-between mb-4">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-dark like mr-2"><i data-feather="heart" class="fea icon-sm like-icon mr-1"></i>36</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-dark comment"><i data-feather="message-circle" class="fea icon-sm mr-1"></i>{{ $posts->comment_count }}</a></li>
                            </ul>
                            <div><i data-feather="tag" class="fea icon-sm mr-1"></i><a href="javascript:void(0)" class="text-dark tag">{{ $posts->categorypost->title }}</a></div>
                        </div>

                        <p class="text-muted justify-content-lg-end" >
                            {!!$posts->deskripsi !!}
                        </p>
                        {{-- <blockquote class="blockquote position-relative p-4">
                            <p class="text-muted mb-0 font-italic">" There are many variations of passages of Lorem Ipsum available, by injected humour, or randomised words which don't look even slightly believable. "</p>
                        </blockquote> --}}
                        {{-- <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa obcaecati, facere aliquam voluptate consequatur dolorum exercitationem deleniti doloribus at soluta esse maiores necessitatibus inventore distinctio aut fugit, corporis, quod hic?</p> --}}

                        <div class="sidebar">
                            <div class="widget">
                                <div class="tagcloud mt-3">
                                    {{-- @foreach ($poss as $item)
                            @if ($item->is_published == 1) --}}
                                <div class="tagcloud mt-3">
                                    @foreach ($posts->tagposts as $item)
                                          <a href="jvascript:void(0)" class="rounded">{{ $item->title }}</a>
                                    @endforeach
                                  
                                </div>
                            {{-- @endif                                    
                            @endforeach --}}
                                    {{-- <a href="jvascript:void(0)" class="rounded">{{ $posts->tagposts->implode('title', ', ') }}</a> --}}
                                    {{-- <a href="jvascript:void(0)" class="rounded">Portfolio</a>
                                    <a href="jvascript:void(0)" class="rounded">Personal</a>
                                    <a href="jvascript:void(0)" class="rounded">Photography</a>
                                    <a href="jvascript:void(0)" class="rounded">Product</a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="mb-0">Related Post :</h5>
                        </div>

                        <div class="row">
                            @foreach ($po as $item)
                            @if ($item->is_published == 1)    
                            @if ($posts->id != $item->id) 
                            {{-- @if ()--}}
                                                  
                            <div class="col-lg-6 col-12 mt-4 pt-2">
                                <div class="blog-post shadow rounded position-relative overflow-hidden">
                                    <div class="blog-img overflow-hidden position-relative">
                                        <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid" height="100%" alt="">
                                        <div class="overlay bg-dark"></div>
                                        <div class="d-flex author-desc align-items-center">
                                            <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid avatar avatar-md-sm rounded-pill mr-2 shadow" height="100%" alt="">
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
                            @endif  
                            @endforeach
        
                            {{-- <div class="col-lg-6 col-12 mt-4 pt-2">
                                <div class="blog-post shadow rounded position-relative overflow-hidden">
                                    <div class="blog-img overflow-hidden position-relative">
                                        <img src="images/blog/07.jpg" class="img-fluid" alt="">
                                        <div class="overlay bg-dark"></div>
                                        <div class="d-flex author-desc align-items-center">
                                            <img src="images/client/02.jpg" class="img-fluid avatar avatar-md-sm rounded-pill mr-2 shadow" alt="">
                                            <div class="author">
                                                <a href="javascript:void(0)" class="text-white h6 name">Lisa Marvel</a><p class="text-white-50 small mb-0">23rd Jan, 2020</p>
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
                                        <h5><a href="javascript:void(0)" class="title text-dark">Spotify Premium now has 100 million subscribers</a></h5>
                                        <p class="text-muted">Due to its widespread use as filler text for layouts, non-readability is of great importance</p>
        
                                        <div class="post-meta d-flex justify-content-between pt-3 border-top">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-dark like mr-2"><i data-feather="heart" class="fea icon-sm like-icon mr-1"></i>36</a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-dark comment"><i data-feather="message-circle" class="fea icon-sm mr-1"></i>08</a></li>
                                            </ul>
                                            <a href="javascript:void(0)" class="text-dark read">Read More <i class="mdi mdi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div><!--end post-->
                            </div> --}}
                            <!--end col-->
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <div class="p-4 shadow rounded position-relative overflow-hidden">
                        <h5>Comments :</h5>
                        <ul class="media-list list-unstyled mb-0">
                            @foreach ($posts->comment as $ops)
                                @if ($ops->approved == 1)
                                    
                            <li class="comment-desk mt-4">
                                {{-- <a href="#" class="float-right text-muted"><i class="mdi mdi-reply"></i>&nbsp; Reply</a> --}}
                                <div class="commentor">
                                    <a class="float-left pr-3" href="#">
                                        {{-- <img src="images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img"> --}}
                                    </a>
                                    <div class="overflow-hidden d-block">
                                        <h6 class="media-heading mb-0"><a href="javascript:void(0)" class="text-dark">{{ $ops->name }}</a></h6>
                                        <small class="text-muted">{{ $ops->created_at }}</small>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted font-italic p-3 bg-light rounded">"{{ $ops->comment }}"</p>
                                </div>
                            </li>
                            
                            @endif
                            @endforeach
                            
                        </ul>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <div class="p-4 shadow rounded position-relative overflow-hidden">
                        <h5>Leave a comment :</h5>

                        <form class="mt-4" action="/comment/store" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="POST" />
                                <input type="hidden" name="id" value="{{$posts->id}}" /> 
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Comment</label>
                                        <textarea id="message" placeholder="Your Comment" rows="5" name="comment" class="form-control" required=""></textarea>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input id="name" name="name" type="text" placeholder="Name" class="form-control" required="">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <input id="email" type="email" placeholder="Email" name="email" class="form-control" required="">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="send">
                                        <button type="submit" class="btn btn-primary">Send Comment</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="sidebar sticky-bar">
                
                    <div class="widget ">
                        <div class="p-4 rounded border">
                            <h4 class="title text-center">Categories</h4>
                            <ul class="list-unstyled mb-0 mt-3 catagory">
                                @foreach ($catpost as $item)
                                    <li><a href="jvascript:void(0)">{{ $item->title }}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                  

                    <div class="widget mt-4 pt-2">
                        <div class="p-4 rounded border">
                            <h4 class="title text-center">Related Post</h4>
                            
                            <div class="widget-grid overflow-hidden mt-3">
                                @foreach ($po as $item)
                                @if ($item->is_published == 1)
                                @if ($posts->id != $item->id) 
                                <div class="item">
                                    <a href="javascript:void(0)">
                                        <img src="{{ url('data_file/'.$item->image) }}" alt="img-missing" class="img-fluid rounded">
                                    </a>
                                </div>
                                @endif 
                                @endif                                   
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="widget mt-4 pt-2">
                        <div class="p-4 rounded border text-center">
                            <h4 class="title text">Tags Cloud</h4>
                            {{-- @foreach ($poss as $item)
                            @if ($item->is_published == 1) --}}
                                <div class="tagcloud mt-3">
                                    @foreach ($tagpost as $item)
                                          <a href="jvascript:void(0)" class="rounded">{{ $item->title }}</a>
                                    @endforeach
                                  
                                </div>
                            {{-- @endif                                    
                            @endforeach --}}
                          
                        </div>
                    </div>

                   
                </div><!--end sidebar-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Post detail end -->
@endsection

