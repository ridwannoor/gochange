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
                        <div class="col-lg-12" >
                               
                             <form style="max-width: 80%;" method="POST" action="/api/checkout">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="POST" />
                                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                   {{-- <div class="form-group">
                                    <label for="no_invoice">Nomor Inovice</label>
                                    <input type="text" name="no_invoice" class="form-control" id="no_invoice" required>
                                </div> --}}
                                <div class="form-row">                                   
                                    <div class="form-group col-md-6">
                                        <label>USD</label>
                                        <input type="text" name="usd" class="form-control" id="txt1" onkeyup="sum();" onkeypress="return hanyaAngka(event)" required>
                                     <input type="hidden" name="jumlah" class="form-control" id="txt2" onkeyup="sum();" value="{{ $selectedOption ?? '' }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>IDR</label>
                                        <input type="text" name="idr" class="form-control" id="txt3" readonly onchange="updateInputValue()" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email Akun Tujuan</label>
                                    <input type="email" name="customer_email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Saldo</label>                                  
                                    <select class="form-control" id="jenissaldo" name="jenissaldo_id" onchange="updateInputValue()">
                                        @foreach ($jenissaldo as $item)
                                          <option value="{{ $item->harga }}">{{ $item->name }}  {{ (isset($selectedOption) && $selectedOption == $item->harga) ? 'selected' : '' }}

                                          </option>
                                           
                                        @endforeach
                                      
                                    </select>
                                </div>
                                <div class="style-msg2 successmsg">
                                    <div class="msgtitle">Menyetujui dengan <a href="#"> Syarat & Ketentuan </a> berlaku</div>
                                    <div class="sb-msg">
                                       <span><strong>Perhatian!</strong>  Transaksi langsung diproses setelah pembayaran diterima. Kami tidak bertanggung jawab jika terjadi kesalahan ketika memasukkan data.
                                        *tanpa biaya order >$50 | biaya Rp10.000,- <$50 | biaya Rp20.000,- <$25</span>
                                    </div>
                                </div>
                                 {{-- <a href="{{ $data }}" class="btn btn-primary">Bayar Sekarang</a> --}}
                             <button type="submit" class="btn btn-success btn-block text-white">Lanjut Pembayaran</button>
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
<div id="loading" class="loader"></div>
    

</section>
@include('front.component.footer')

   <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result1 = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue) + 20000;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (parseInt(txtFirstNumberValue) < 50) {
                document.getElementById('txt3').value = result1;
                }
            else{
                document.getElementById('txt3').value = result;
            }
        }
    </script> 

    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>

   <script>
    function updateInputValue() {
        var dropdown = document.getElementById('jenissaldo');
        var input = document.getElementById('txt2');
        var input1 = document.getElementById('txt1');
        // var input1 = document.getElementById('txt1');

        input.value = dropdown.value;

        var result1 = parseInt(input) * parseInt(input1) + 20000;
        var result = parseInt(input) * parseInt(input1);
            if (parseInt(input) < 50) {
                document.getElementById('txt3').value = result1;
                }
            else{
                document.getElementById('txt3').value = result;
        }
        //  input1.value = dropdown.value;
    }
    </script>



@endsection

