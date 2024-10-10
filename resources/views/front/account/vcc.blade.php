@extends('front.account.layouts.app')


@section('content')

@include('front.account.component.header')


<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="col-md-9">
                    {{-- <img src="front/images/icons/avatar.jpg"
                                class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar"
                                style="max-width: 84px;"> --}}
                    <div class="heading-block ">
                        <h3>{{ $title }}</h3>
                        {{-- <span>Your Profile Bio</span> --}}
                    </div>
                    <div class="clear"></div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <form style="max-width: 80%; ">
                                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nomor Handphone</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis VCC</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlSelect1">Metode Pembayaran</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div> --}}
                                <div class="style-msg2 successmsg">
                                    {{-- <div class="msgtitle">Menyetujui dengan <a href="#"> Syarat & Ketentuan </a> berlaku</div> --}}
                                    <div class="sb-msg">
                                        <span><strong>Perhatian!</strong> Transaksi langsung diproses setelah pembayaran diterima. Kami tidak bertanggung jawab jika terjadi kesalahan ketika memasukkan data.
                                            *tanpa biaya order >$50 | biaya Rp10.000,- <$50 | biaya Rp20.000,- <$25</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Lanjut</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-100 line d-block d-md-none"></div>
                <div class="col-md-3 clearfix">
                    @include('front.account.component.sidebar')


                </div>
            </div>
        </div>
    </div>
</section>
@include('front.component.footer')

@endsection