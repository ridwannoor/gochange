@extends('front.layouts.app')



@section('main')
 <!-- Work Details Start -->
 <section class="bg-half-170">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 order-md-1 order-2 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <img src="{{ url('data_file/'.$portfolios->image) }}" class="img-fluid rounded" alt="">
                {{-- <img src="images/work/2.jpg" class="img-fluid rounded mt-4" alt="">
                <img src="images/work/3.jpg" class="img-fluid rounded mt-4" alt="">
                <img src="images/work/1.jpg" class="img-fluid rounded mt-4" alt="">
                <img src="images/work/5.jpg" class="img-fluid rounded mt-4" alt=""> --}}
            </div><!--end col-->

            <div class="col-lg-6 col-md-6 col-12 mt-md-5 pt-md-5 order-md-2 order-1">
                <div class="sticky-bar">
                    <div class="work-details rounded shadow p-4">
                        <h5 class="title border-bottom pb-3 mb-3">Project Info :</h5>
                        <dl class="row mb-0">
                            <dt class="col-md-4 col-5">Title :</dt>
                            <dd class="col-md-8 col-7 text-muted">{{ $portfolios->title }}</dd>

                            <dt class="col-md-4 col-5">Category :</dt>
                            <dd class="col-md-8 col-7 text-muted">{{ $portfolios->category->title }}</dd>

                            <dt class="col-md-4 col-5">Date :</dt>
                            <dd class="col-md-8 col-7 text-muted">{{ $portfolios->created_at }}</dd>

                            <dt class="col-md-4 col-5">Website :</dt>
                            <dd class="col-md-8 col-7 text-muted">{{ $portfolios->website }}</dd>

                            {{-- <dt class="col-md-4 col-5">Location :</dt>
                            <dd class="col-md-8 col-7 mb-0 text-muted">3/2/64 Mongus Street, UK</dd> --}}
                        </dl>                       
                    </div>

                    <div class="mt-4 pt-2">
                        <p class="text-muted mb-0">" {{ $portfolios->deskripsi }} "</p>
                    
                        {{-- <ul class="list-unstyled feature-list text-muted px-0 mt-4">
                            <li><i data-feather="arrow-right-circle" class="fea icon-sm text-primary mr-2"></i>Digital Marketing Solutions for Tomorrow</li>
                            <li><i data-feather="arrow-right-circle" class="fea icon-sm text-primary mr-2"></i>Our Talented & Experienced Marketing Agency</li>
                            <li><i data-feather="arrow-right-circle" class="fea icon-sm text-primary mr-2"></i>Create your own skin to match your brand</li>
                            <li><i data-feather="arrow-right-circle" class="fea icon-sm text-primary mr-2"></i>Digital Marketing Solutions for Tomorrow</li>
                            <li><i data-feather="arrow-right-circle" class="fea icon-sm text-primary mr-2"></i>Our Talented & Experienced Marketing Agency</li>
                        </ul> --}}
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="widget mt-4 pt-2">
            <div class="col-md-12 mt-3">
                <h4 class="title text-center">Related Post</h4>
                <div id="three-post" class="owl-carousel owl-theme">  
                   
                    {{-- @foreach ($portfolios as $item)
                    <div class="review m-3 bg-white rounded shadow position-relative">
                        <div class="content position-relative overflow-hidden p-4">
                            <p class="text-muted mb-0">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. "</p>
                            <h1 class="display-1 m-0"><i class="icons ti-quote-left"></i></h1>
                        </div>
                        <div class="reviewer d-flex align-items-center px-4 pb-4">
                            <div class="text-center">
                                <img src="images/client/01.jpg" class="img-fluid avatar avatar-md-sm mr-2 mr-md-3 shadow rounded-pill" alt="">
                            </div>
                            <div>
                                <h6 class="mb-0">Martin Sobhe</h6>
                                <p class="text-muted mb-0">Front-end Developer</p>
                            </div>
                        </div>
                        <div class="review-icon">
                            <i data-feather="message-circle" class="fea icon-lg"></i>
                        </div>
                    </div>
                    @endforeach --}}
                   <!--end post-->
                   @foreach ($port as $item)
                   @if ($item->is_published == 1 )   
                   @if ($portfolios->id != $item->id)              
                   <div class="review m-3 bg-white rounded shadow position-relative">
                       <div class="work-container work-grid position-relative d-block overflow-hidden rounded">
                           <a class="mfp-image d-inline-block" href="{{ url('data_file/'.$item->image) }}" title="">
                               <img src="{{ url('data_file/'.$item->image) }}" width="100%" height="100%" class="img-fluid" alt="work-image">
                           </a>
                           <div class="content bg-white p-3">
                               <h5 class="mb-0"><a href="/portfolio/detail/{{ $item->id }}" class="text-dark title">{{ $item->title }}</a>
                               </h5>
                               <h6 class="text-muted tag mb-0">{{ $item->deskripsi }}</h6>
                           </div>
                       </div>
                   </div>
                   @endif
                   @endif
                   @endforeach   
                    
                </div><!--end owl carousel-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Work Details End -->

@endsection

