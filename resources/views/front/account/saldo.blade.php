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
                               
                             <form style="max-width: 80%;" id="formRequestData" class="needs-validation" >
                                @csrf
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
                             <button class="btn btn-success btn-block text-white">Purchase</button>
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


  <script src="https://sandbox.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js"></script>
    <script src="https://cdn-doku.oss-ap-southeast-5.aliyuncs.com/doku-ui-framework/doku/js/jquery-3.3.1.min.js"></script>

<script>
   

  $("#formRequestData").submit(function (e) {
        $("#loading").show();
        let unindexed_array_config = $('#formConfig').serializeArray();
        let unindexed_array_payment_request = $('#formRequestData').serializeArray();
        let indexed_array = {};

        $.map(unindexed_array_config, function (n) {
            indexed_array[n['name']] = n['value'];
        });

        $.map(unindexed_array_payment_request, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });

        let reusableStatusVal = $("#vaReusable option:selected").val();
        let reusableStatus = false;
        if (reusableStatusVal === 'true') {
            reusableStatus = true;
        }

        indexed_array['amount'] = $("#amount").val();
        indexed_array['expiredTime'] = parseInt($("#vaExpiredTime").val());
        indexed_array['info1'] = $("#vaInfo1").val();
        indexed_array['info2'] = $("#vaInfo2").val();
        indexed_array['info3'] = $("#vaInfo3").val();
        indexed_array['amount'] = $("#amount").val();
        indexed_array['country'] = $("#country option:selected").val();
        indexed_array['reusableStatus'] = reusableStatus;
        indexed_array['province'] = $("#province option:selected").val();
        indexed_array['channel'] = $("#channel option:selected").val();
        indexed_array['postalCode'] = $("#postalCode").val();
        var invoiceNumber = randomString(20, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        indexed_array['invoiceNumber'] = invoiceNumber;

        $channel = indexed_array['channel'];
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: JSON.stringify(indexed_array),
            url: "{{ route('payment') }}",
            contentType: "application/json",
            success: function (result) {
                $("#loading").hide();
                if ($channel == 'dokuva' || $channel == 'bankmandiriva' || $channel == 'bcava' || $channel == 'bsiva' || $channel == 'briva') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Success',
                        confirmButtonText: 'Close Instruction',
                        html:
                            '<h4>Your VA Number : ' + result.virtual_account_info.virtual_account_number + '</h4> ' +
                            '<h5><a target="_blank" href="'+result.virtual_account_info.how_to_pay_page+'">Click here to see payment instructions</a></h5>',
                        width: 1500,
                    });
                } else if ($channel == 'creditcard' ) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Success',
                        confirmButtonText: 'Close Instruction',
                        html:
                            '<h4>Your Invoice Number : ' + result.order.invoice_number + '</h4> ' +
                            '<iframe width="100%" height="700" src="'+result.credit_card_payment_page.url+'" frameborder="0"></iframe>',
                        width: 1500,
                    });
                } else if ($channel == 'shopeepay') {
                    window.open(result.shopeepay_payment.redirect_url_http, '_blank');
                } else if ($channel == 'dw') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Success',
                        confirmButtonText: 'Close Instruction',
                        html:
                            '<h4>Your Invoice Number : ' + result.order.invoice_number + '</h4> ' +
                            '<iframe width="100%" height="700" src="'+result.doku_wallet_payment_page.url+'" frameborder="0"></iframe>',
                        width: 1500,
                    });
                } else if ($channel == 'ovo') {
                    if (result.ovo_payment.status == "SUCCESS") {
                        $status = 'success'
                        $statusTitle = 'Success'
                    } else {
                        $status = 'error'
                        $statusTitle = 'Failed'
                    }
                    Swal.fire({
                        icon: $status,
                        title: 'Order '.$statusTitle,
                        confirmButtonText: 'Close Instruction',
                        html:
                            '<h4>Your Invoice Number : ' + result.order.invoice_number + '</h4> ' +
                            '<h6>Your Amount         : ' + result.order.amount + '</h4> ' +
                            '<h6>Your OVO ID         : ' + result.ovo_info.ovo_id + '</h4> ' +
                            '<h6>Your OVO NAME       : ' + result.ovo_info.ovo_account_name + '</h4> ' +
                            '<h6>Your OVO DATE       : ' + result.ovo_payment.date + '</h4> ' +
                            '<h6>Your STATUS PAYMENT : ' + result.ovo_payment.status + '</h4>',
                        width: 1500,
                    });
                }
            },
            error: function(xhr, textStatus, error){
                $("#loading").hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Order Failed',
                    confirmButtonText: 'Close',
                })
            },
            beforeSend: function() {
                if ($channel == 'ovo') {
                    $("#loading").hide();
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Pending',
                        confirmButtonText: 'Close Instruction',
                        html:
                            '<h4>please make payment to the following account</h4> ' +
                            '<h4>Your Invoice Number : ' + invoiceNumber + '</h4> ' +
                            '<h6>Your Amount         : ' + indexed_array['amount'] + '</h4> ',
                        width: 1500,
                    });
                }
            }
        });
        e.preventDefault();
        return false;
    });

</script>

@endsection

