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
                    <a href="/admin/general" class="m-nav__link">
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
    {{-- <div class="alert alert-info m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30"
        role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation-1"></i>
        </div>
        <div class="m-alert__text">
            JQVMap is a jQuery plugin that renders Vector Maps with resizable Scalable Vector Graphics
            (SVG).
            For more info please check out <a class="m-link m-link--brand m--font-bold"
                href="http://jqvmap.com/" target="_blank">the official documentation.</a>
        </div>
    </div> --}}

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
			<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/admin/general/update" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$generals->id}}" />
                </div>
                <div class="m-portlet__body">
					{{-- <div class="form-group m-form__group m--margin-top-10">
						<div class="alert m-alert m-alert--default" role="alert">
							Here are examples of <code>.form-control</code> applied to each textual HTML5 input type:
						</div>
					</div> --}}
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">Title</label>
						<div class="col-10">
							<input class="form-control m-input" name="title" type="text" value="{{ $generals->title }}" >
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-search-input" class="col-2 col-form-label">Deskripsi</label>
						<div class="col-10">
                            <textarea class="form-control m-input" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ $generals->deskripsi }}</textarea>
							{{-- <input class="form-control m-input" name="deskripsi" type="text" value="{{ $generals->deskripsi }}" > --}}
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-email-input" class="col-2 col-form-label">Phone</label>
						<div class="col-10">
							<input class="form-control m-input" type="tel" name="phone" value="{{ $generals->phone }}" >
						</div>
                    </div>
                    <div class="form-group m-form__group row">
						<label for="example-email-input" class="col-2 col-form-label">Alamat</label>
						<div class="col-10">
                            <textarea name="alamat"  class="form-control m-input" id="alamat" cols="30" rows="10">{{ $generals->alamat }}</textarea>
							{{-- <input class="form-control m-input" type="text" name="alamat" value="{{ $generals->phone }}" > --}}
						</div>
                    </div>
                    <div class="form-group m-form__group row">
						<label for="example-email-input" class="col-2 col-form-label">Email</label>
						<div class="col-10">
							<input class="form-control m-input" type="email" name="email" value="{{ $generals->email }}" >
						</div>
                    </div>
					<div class="form-group m-form__group row">
						<label for="example-url-input" class="col-2 col-form-label">URL</label>
						<div class="col-10">
							<input class="form-control m-input" name="website" type="url" value="{{ $generals->website }}">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-url-input" class="col-2 col-form-label">Facebook</label>
						<div class="col-10">
							<input class="form-control m-input" name="facebook" type="url" value="{{ $generals->facebook }}">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-search-input" class="col-2 col-form-label">Whatsapp</label>
						<div class="col-10">
							<input class="form-control m-input" name="whatsapp" type="text" value="{{ $generals->whatsapp }}" >
                            <span>format : angka depan 0 diganti dengan +62</span>
                        </div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-search-input" class="col-2 col-form-label">Instagram</label>
						<div class="col-10">
							<input class="form-control m-input" name="instagram" type="text" value="{{ $generals->instagram }}" >
						</div>
                    </div>
                    <div class="form-group m-form__group row">
						<label for="example-search-input" class="col-2 col-form-label">Logo</label>
						<div class="col-10">
                            <input class="form-control m-input" name="image" type="file">
                            <span>Size : 100px X 48px </span> <br>
                            <p class="text-danger">{{ $errors->first('image') }}</p>
                            <span>{{ $generals->image }}</span>
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
                                    <a href="/admin/general" class="btn btn-secondary">Back</a>
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

