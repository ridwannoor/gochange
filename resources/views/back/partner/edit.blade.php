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
			<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/admin/partner/update" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$partners->id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-2">
                            <label>Badan Usaha</label>
                                <select class="form-control m-input" name="badan_id" id="badan_id">
                                    <option value="{{ $partners->badan_id }}">{{ $partners->badan->title }}</option>
                                @foreach ($badans as $item)    
                                    @if ($partners->badan_id != $item->id)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>  
                                    @endif      
                                @endforeach                     
                                </select>    
                        </div>
                        <div class="col-lg-3">
                            <label>Npwp</label>
                                <input class="form-control m-input" name="npwp" type="text" value="{{ $partners->npwp }}">
                        </div>
                        <div class="col-lg-4">
                            <label>Nama Perusahaan</label>
                                <input class="form-control m-input" name="nama_perusahaan" type="text" value="{{ $partners->nama_perusahaan }}">
                        </div>
                        <div class="col-lg-3">
                            <label>Email</label>
                            <input class="form-control m-input" name="email" type="text" value="{{ $partners->email }}">
                        </div>	
					</div>
                    <div class="form-group m-form__group row">
                        <div class="col-lg-3">
                            <label>No Telp Perusahaan</label>
                            <input class="form-control m-input" name="telp" type="text" value="{{ $partners->telp }}">
                        </div>
                        <div class="col-lg-6">
                            <label>Kontak Person</label>
                                <input class="form-control m-input" name="kontak_person" type="text" value="{{ $partners->kontak_person }}">
                        </div>
                        <div class="col-lg-3">
                            <label>No Handphone </label>
                            <input class="form-control m-input" name="phone" type="text" value="{{ $partners->phone }}">
                        </div>
					</div>
					<div class="form-group m-form__group row">
                        
                        <div class="col-lg-6">
                            <label>Alamat</label>
						    <textarea class="form-control m-input" name="alamat" id="alamat" cols="30" rows="10">{{ $partners->alamat }}</textarea>
                            <span>Max : 100 Karakter</span>                           
                        </div>
                        <div class="col-lg-6">
                            <label>Alamat Domisili</label>
                            <textarea class="form-control m-input" name="alamat_domisili" id="alamat_domisili" cols="30" rows="10">{{ $partners->alamat_domisili }}</textarea>
                            <span>Max : 100 Karakter</span>
                        </div>	
                    </div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<div class="row">
							<div class="col-2">
							</div>
							<div class="col-10">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="/admin/partner" class="btn btn-secondary">Back</a>
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

