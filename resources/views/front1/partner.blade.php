@extends('front.layouts.app')



@section('main')
 <!-- About Start -->
 <section class="bg-half-170">
 
    <div class="container">
        <div class="row projects-wrapper">
            @foreach ($banners as $item)
                <div class="col-lg-2 col-md-6 col-12 mt-4 pt-2">
                    <div class="work-container work-classic">
                        <a href="javascript:void(0)"><img src="{{ url('data_file/'.$item->image) }}" width="100%" height="100%" class="img-fluid rounded work-image" alt=""></a>
                        {{-- <div class="content pt-3">
                            <h5 class="mb-0"><a href="javascript:void(0)" class="text-dark title">Iphone mockup</a></h5>
                            <h6 class="text-muted tag mb-0">Branding</h6>
                        </div> --}}
                    </div>
                </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->

</section><!--end section-->
<!-- Contact End -->
<!-- About End -->
@endsection

