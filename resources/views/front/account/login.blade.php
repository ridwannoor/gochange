@extends('front.account.layouts.app')

@section('content')
      <section id="content">
            <div class="content-wrap nopadding">
                <div class="section nopadding nomargin"
                    style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('front/images/3759390.jpg') center center no-repeat; background-size: cover;">
                </div>
                <div class="section nobg full-screen nopadding nomargin">
                    <div class="container-fluid vertical-middle divcenter clearfix">
                      
                        <div class="card divcenter noradius noborder"
                            style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                            <div class="card-body" style="padding: 40px;">
                                <form name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
                                    @csrf
                                 <div class="center"><img src="{{ url('data_file/'.$generals->image) }}"  height="100px" alt="Canvas Logo"></div>  
                                    <div class="col_full">
                                        <label for="login-form-username">Email:</label>
                                        <input type="text" id="login-form-username" name="email"
                                            class="form-control not-dark" />
                                    </div>
                                    <div class="col_full">
                                        <label for="login-form-password">Password:</label>
                                        <input type="password" id="login-form-password" name="password"
                                            value="" class="form-control not-dark" />
                                    </div>
                                    <div class="col_full nobottommargin">
                                        <button class="button button-3d button-black nomargin" type="submit">Login</button>
                                        <a href="#" class="fright">Forgot Password?</a>
                                    </div>
                                </form>
                                <div class="line line-sm"></div>
                                <div class="center">
                                    <h4 style="margin-bottom: 15px;">or Login with:</h4>
                                    <a href="#" class="button button-rounded si-google si-colored">Google</a>
                                    <div class="line line-sm"></div>
                                    {{-- <span class="d-none d-md-block">or</span> --}}
                                  <span>Belum Memiliki Akun</span>  <a href="#">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <div class="center dark"><small>Copyrights &copy; All Rights.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection