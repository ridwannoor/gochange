@extends('front.layouts.app')



@section('main')
 <!-- About Start -->
 <section class="bg-half-170">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="shadow rounded p-4">
                    <h5 class="mb-0">Hubungi Kami !</h5>
                    <div class="custom-form mt-4 pt-2">
                        @include('front.component.message')
                        <form method="POST" action="/contact/save">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="POST" />
                                {{-- <input type="hidden" name="id" value="{{$posts->id}}" />  --}}
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Your Name <span class="text-danger">*</span></label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Your Name :">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Your Email :">
                                    </div> 
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Subject</label>
                                        <input name="subject" id="subject" class="form-control" placeholder="Subject :">
                                    </div>                                                                               
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Comments</label>
                                        <textarea name="comment" id="comments" rows="4" class="form-control" placeholder="Message :"></textarea>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit"  class="submitBnt btn btn-primary">Send Message</button>
                                    {{-- <input type="submit" class="submitBnt btn btn-primary" value="Send Message"> --}}
                                    <div id="simple-msg"></div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div><!--end -->
            </div><!--end col-->

            <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ml-md-4">
                    <h4 class="mb-4">Kontak Detail</h4>
                    <p class="text-muted para-desc mb-0" style="text-align: justify">{{ $generals->deskripsi }}</p>

                    <div class="contact-detail mt-4 pt-2">
                        <h5>Alamat Kami: </h5>
                        <p class="text-muted mb-0" style="max-width: 330px;">{{ $generals->alamat }}</p>
                    </div>

                    <div class="contact-detail">
                        {{-- <h5>Kontak Kami: </h5> --}}
                        {{-- <p class="text-muted mb-1" style="max-width: 330px;">Start working with Incrave Business Agency that can provide everything</p> --}}
                        <p class="text-primary">Email : {{ $generals->email }} <br>
                       Phone : {{ $generals->phone }}</p>
                    </div>

                    {{-- <div class="contact-detail mt-4">
                        <h5>Our Phone: </h5>
                        <p class="text-muted mb-1" style="max-width: 330px;">Start working with Incrave Business Agency that can provide everything</p>
                        <a href="tel:+152534-468-854" class="text-primary">{{ $generals->phone }}</a>
                    </div> --}}
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    
    {{-- <div class="container-fluid mt-100 mt-60">
        <div class="row">
            <div class="col-12 px-0">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" allowfullscreen></iframe>
                </div><!--end map-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container--> --}}
</section><!--end section-->
<!-- Contact End -->
<!-- About End -->
@endsection

