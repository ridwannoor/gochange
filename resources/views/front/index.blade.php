@extends('front.layouts.app')

@section('script-head')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection


@section('main')
<section class="section pt-0 pb-0">
    {{-- <div class="row"> --}}
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            @foreach ($sliders as $item)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' :'' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner" role="listbox">
            @foreach ($sliders as $item)
            <div class="carousel-item {{ $loop->first ? 'active' :'' }}">
                <img src="{{ url('data_file/'.$item->image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>{{ $item->title }}</h5> --}}
                    {{-- <p>{{ $item->deskripsi }}</p> --}}
                </div>
            </div>
            {{-- <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>                     --}}
            @endforeach
        </div>
        <!-- Previous Btn -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Next Btn -->
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- </div> --}}
</section>
<!--end section-->
<!-- Image End -->
{{-- <section class="py-4 mt-50 mt-60 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                .<div class="card text-left border-0" style="background-color: lightcyan" >
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-body">
                    <h5 class="card-title">Kualitas Terbaik</h5>
                    <p class="card-text">Material bahan terbaik</p>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
                .<div class="card text-left  border-0" style="background-color: lavender" >
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-body">
                    <h5 class="card-title">Dukungan Pelanggan 24/7</h5>
                    <p class="card-text">mudah akses untuk layanan konsultasi

                    </p>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
                .<div class="card text-left border-0" style="background-color: beige" >
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-body">
                    <h5 class="card-title">100% Transaksi Aman</h5>
                    <p class="card-text">pembayaran terpercaya dan mudah

                    </p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Start -->
<section class="py-4">    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                {{-- <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-2 mt-4">KATEGORI PRODUK</h4>
                    
                </div> --}}
            </div><!--end col-->
            @foreach ($categories as $item)
                <div class="col-lg-3 text-center py-4">
                    <a href="javascript:void(0)">
                        <div class="explore-feature px-3 py-5 text-center rounded-pill">
                            <img src="/data_file/productcat/{{ $item->image }}" style="border-radius: 10px" class="fea feature-icon text-primary" width="100%" alt="">
                            {{-- <i data-feather="settings" class="fea text-primary"></i> --}}
                            {{-- <p class="text-muted mt-3 mb-0">{{ $item->title }}</p> --}}
                        </div>
                    </a>
                </div>
            @endforeach
           
            <!--end col-->

            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<section class="section py-4 border-bottom border-top">
            <div class="container">
                <div class="row justify-content-center">
                     @foreach ($banners as $item)
                    <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                        <img src="{{ url('data_file/'.$item->image) }}" class="avatar avatar-ex-sm" alt="">
                    </div><!--end col-->
                    @endforeach
                   
                </div><!--end row-->
            </div><!--end container-->
        </section>

<!--end section-->
<section class="section mt-100" style="background-color: cadetblue">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-5 col-12 mt-5 mt-sm-0 pt-5 pt-sm-0">
                <div class="play-icon">
                    <a href="{{ $generals->instagram }}" class="video-play-icon">
                        <i class="mdi mdi-play mdi-24px text-white rounded-circle bg-primary shadow"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-12 order-2 order-md-1 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title mr-lg-5">
                    <h4 class="title text-light mb-4">{{ $generals->title }}</h4>
                    <p class="text-light text-justify">{{$generals->deskripsi  }}</p>
                    {{-- <ul class="list-unstyled feature-list text-light px-0">
                        <li><i class="mdi mdi-circle-medium text-primary mr-1"></i>Digital Marketing Solutions for Tomorrow</li>
                        <li><i class="mdi mdi-circle-medium text-primary mr-1"></i>Our Talented &amp; Experienced Marketing Agency</li>
                        <li><i class="mdi mdi-circle-medium text-primary mr-1"></i>Create your own skin to match your brand</li>
                    </ul> --}}
                    <div class="my-4">
                        <a href="/contact" class="btn btn-primary">See More <i data-feather="chevron-right" class="fea icon-sm"></i></a>
                    </div>

                    <div class="d-inline-block">
                        <div class="pt-4 d-flex align-items-center border-top">
                            <i data-feather="help-circle" class="fea icon-md mr-2 text-primary"></i>
                            <div class="content">
                                <h6 class="mb-0 text-light">Have Question ? Get in touch!</h6>
                                <a href="/contact" class="text-primary">Learn More <i data-feather="chevron-right" class="fea icon-sm"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
    

</section>


<div class="container-fluid">
    <div class="row projects-wrapper">
        @foreach ($galleries as $item)
            <div class="col-lg-3 col-md-6 col-12 p-0">
                <div class="work-container work-grid position-relative d-block overflow-hidden">
                    <a class="mfp-image d-inline-block" href="{{ url('data_file/'.$item->image) }}" title="">
                        <img src="{{ url('data_file/'.$item->image) }}" class="img-fluid" alt="work-image">
                    </a>
                    <div class="content bg-white p-3">
                        <h5 class="mb-0"><a href="javascript:void(0)" class="text-dark title">{{ $item->title }}</a></h5>
                        <p class="text-muted tag mb-0">{!! Str::limit($item->deskripsi, 20) !!}</p>
                    </div>
                </div>
            </div><!--end col-->
        @endforeach        
    </div><!--end row-->
</div>
<!--end container-->

@endsection


@section('script-footer')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
     $('#summernote').summernote({
            height: "300px"
        });
    </script>
{{-- <script src="{{ asset('back/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js') }}" type="text/javascript"></script> --}}
{{-- <script>
     $(document).ready(function () {
        $('#categoryproduct').on('change', function (e) {
            console.log(e);
            var categoryproduct_id = e.target.value;
            $.get('/admin/product/subcat?categoryproduct_id=' + categoryproduct_id, function (data) {
                console.log(data);
                $('#subcategory').empty();
                $.each(data, function (index, subcatObj) {
                    $('#subcategory').append('<option value="' + subcatObj.id + '">' +
                        subcatObj.name + '</option>');
                })
            });
        });
    });
</script> --}}
@endsection