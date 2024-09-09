@extends('back.layouts.app')

@section('m-subheader')
<div class="m-subheader">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/admin/home" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="/admin/partner" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>
                {{-- <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">JQVMap</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">  
    @include('back.component.alert')

   <div class="row">
       <div class="col-xl-12">
       <!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							{{ $judul }}	
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/admin/invoice/update" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$invoices->id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>No Invoice</label>
                            <input class="form-control m-input" name="no_invoice" type="text" value="{{ $invoices->no_invoice }}" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Tanggal Invoice</label>
                            <div class="input-group date">
                                <input type="text" class="form-control m-input" readonly name="tgl_invoice" value="{{ $invoices->tgl_invoice }}" id="m_datepicker_2"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- <input class="form-control m-input" name="tgl_invoice" type="date" > --}}
                        </div>
                        <div class="col-lg-4">
                            <label>No Purchase Order</label>
                            <input class="form-control m-input" name="no_po" type="text" value="{{ $invoices->no_po }}">
                        </div>
                    </div>
					<div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>Partner</label>
                                <select class="form-control m-select2" name="partner_id" id="m_select2_1" >
                                    <option value="{{ $invoices->partner_id }}">{{ $invoices->partner->nama_perusahaan . ", " . $invoices->partner->badan->title }}</option>
                                    @foreach ($partners as $item)                            
                                        @if ($invoices->partner_id != $item->id)
                                        <option value="{{ $item->id }}">{{ $item->nama_perusahaan . ", " . $item->badan->title }}</option>  
                                        @endif      
                                    @endforeach                            
                                </select>    
                        </div>  
                             
                        <div class="col-lg-6">
                            <label>Perihal</label>
                            <textarea name="perihal" id="perihal" class="form-control m-input" cols="30" rows="3"> {{ $invoices->perihal }}</textarea>
                                {{-- <input class="form-control m-input" name="nama_perusahaan" type="text" > --}}
                        </div>
					</div>
                   
                    <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                
                                <div class="mb-4">
                                    <button id="btnAdd" type="button" class="btn btn-primary">
                                        Add Row
                                    </button>
                                    <button id="btnDel" type="button" class="btn btn-danger">
                                        Delete Row
                                    </button>
                                </div>


                                <table class="table table-striped-table-bordered table-hover" id="tblAddRow">
                                    <thead>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $no = 1 ;
                                    @endphp
                                    <tbody>
                                        @foreach ($invoices->invoicedetail as $item)                                            
                                        <tr>
                                            <td>
                                                <textarea name="deskripsi[]" class="form-control m-input" id="deskripsi" cols="30" rows="3">{{ $item->deskripsi }}</textarea>
                                                {{-- <input type="text" name="deskripsi[]" id="deskripsi" class="form-control m-input"> --}}
                                            </td>
                                            <td><input type="text" name="qty[]" id="qty"
                                                    class="form-control m-input" value="{{ $item->qty }}"></td>
                                            <td>
                                                <input type="text" name="harga[]" id="harga"
                                                    class="form-control m-input"  value="{{ $item->harga }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right " >Diskon (-)</td>
                                            <td><input type="text" name="diskon" class="form-control m-input" value="{{ $invoices->diskon }}"></td>
                                        </tr>
                                        {{-- <tr>
                                            <td></td>
                                            <td style="text-align: right " >PPN</td>
                                            <td><input type="text" name="ppn" class="form-control m-input" value="{{ $invoices->ppn }}"></td>
                                        </tr> --}}
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right " >Lainnya (+)</td>
                                            <td><input type="text" name="lainnya" class="form-control m-input" value="{{ $invoices->lainnya }}"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        

                   
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<div class="row">
							<div class="col-2">
							</div>
							<div class="col-10">
                                <div class="btn-group pull-right">
                                    <button type="submit" class="btn btn-success">Lanjut <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                    {{-- <a href="/admin/partner" class="btn btn-secondary">Back</a> --}}
                                </div>                               
								{{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
							</div>
						</div>
					</div>
				</div>
			</form>
		
			<!--end::Form-->
		</div>
		<!--end::Portlet-->

   </div>
</div>
</div>
@endsection

@section('script-footer')
{{-- <script src=""></script> --}}
<script>
    $(document).ready(function () {
        // Add row the table
        $('#btnAdd').on('click', function () {
            var lastRow = $('#tblAddRow tbody tr:last').html();
            // var id =  $(this).data('id');
            // $('#hargabarang_id').val(id);

            $('#tblAddRow tbody').append('<tr>' + lastRow + '</tr>');
            $('#tblAddRow tbody tr:last input').val('');
        });

        // Delete last row in the table
        $('#btnDel').on('click', function () {
            var lenRow = $('#tblAddRow tbody tr').length;
            //alert(lenRow);
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $('#tblAddRow tbody tr:last').remove();
                jumlah_amount();
            }
        });


        // Delete row on click in the table
        $('#tblAddRow').on('click', 'tr a', function (e) {
            var lenRow = $('#tblAddRow tbody tr').length;
            e.preventDefault();
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $(this).parents('tr').remove();
            }
        });
    });
</script>
@endsection

