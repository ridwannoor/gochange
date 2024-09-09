<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.shreethemes.in/incrave/index-minimal-portfolio.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Aug 2020 03:51:34 GMT -->


 @include('front.component.head')

<body>
    <!-- Loader -->
    {{-- <div id="WAButton"></div>  --}}
    <!-- Loader -->

    <!-- TAGLINE START-->
    <div class="tagline">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <ul class="list-unstyled mb-0 px-0 tag-social">
                            <li class="list-inline-item mr-2"><a href="{{ $generals->facebook }}" target="__blank" class="text-dark"><i
                                        data-feather="facebook" class="fea icon-sm"></i></a></li>
                            {{-- <li class="list-inline-item mr-2"><a href="{{ $generals->linkedin }}"  target="__blank" class="text-dark"><i
                                        data-feather="linkedin" class="fea icon-sm"></i></a></li> --}}
                            <li class="list-inline-item mr-2"><a href="{{ $generals->instagram }}" target="__blank" class="text-dark"><i
                                        data-feather="instagram" class="fea icon-sm"></i></a></li>
                            <li class="list-inline-item"><a href="{{ $generals->youtube }}" class="text-dark"><i
                                        data-feather="youtube" class="fea icon-sm"></i></a></li>
                        </ul>

                        <ul class="list-unstyled mb-0 px-0 tag-right">
                            {{-- <li class="list-inline-item mr-2"> --}}
                                {{-- <div class="form-group mb-0">
                                    <select class="form-control custom-select select-lang">

                                        <option value="4">English</option>
                                        <option value="1">Spanish</option>
                                        <option value="3">French</option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-dark"><i
                                        data-feather="settings" class="fea icon-sm"></i></a></li> --}}
                            {{-- <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#LoginForm" class="text-dark"><i data-feather="user"
                                        class="fea icon-sm"></i></a></li> --}}
                                        <li class="list-inline-item mr-2"><i data-feather="mail" class="fea icon-sm mr-2"></i><a href="mailto:{{ $generals->email }}"
                                            class="text-dark">{{ $generals->email }}</a></li>
                                        <li class="list-inline-item"><i data-feather="phone" class="fea icon-sm"></i><a href="javascript:void(0)"
                                            class="text-dark"> {{ $generals->phone }}</a></li>
                        </ul>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>
    <!--end tagline-->
    <!-- TAGLINE END-->

    <!-- Navbar STart -->
    
 @include('front.component.header')
    
    @yield('main')

    @include('front.component.footer')
  

    <!-- Modal Content Start -->
    <div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Login </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="login-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Your Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" required=""
                                        placeholder="Your Email :">
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" required="" placeholder="Password :">
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group d-inline-block">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                    <p class="forgot-pass mb-0"><a href="page-reset-password.html"
                                            class="text-dark font-weight-bold">Forgot password ?</a></p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-12 mb-0">
                                <button class="btn btn-primary w-100">Sign in</button>
                            </div>
                            <!--end col-->
                            <div class="col-12 mt-4 text-center">
                                <h6 class="mb-0">Or Login With</h6>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-6 mt-4">
                                        <a href="#" class="btn btn-block btn-light bg-facebook"><i
                                                class="mdi mdi-facebook"></i> Facebook</a>
                                    </div>
                                    <div class="col-sm-6 mt-4">
                                        <a href="#" class="btn btn-block btn-light"><i class="mdi mdi-google"></i>
                                            Google</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small> <a
                                        href="page-signup.html" class="text-dark font-weight-bold">Sign Up</a></p>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                    <!--end form-->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Content End -->

    <!-- Back to top -->
    <a href="#" class="back-to-top rounded text-center" id="back-to-top">
        <i class="mdi mdi-chevron-up d-block"></i>
    </a>

    @include('front.component.script')
</body>


</html>
