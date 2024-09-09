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
            
            <div class="m-portlet__body">
				<!--begin::Section-->
				<div class="m-section">
				
					<div class="m-section__content">
						<table class="table">
						  	{{-- <thead>
						    	<tr>
						      		<th>#</th>
						      		<th>First Name</th>
						      		<th>Last Name</th>
						      		<th>Username</th>
						    	</tr>
						  	</thead> --}}
						  	<tbody>
						    	<tr>							      
							      	<td>Badan Usaha</td>
							      	<td>{{ $partners->badan->title }}</td>
                                </tr>
                                <tr>							      
                                    <td>Nama Perusahaan</td>
                                    <td>{{ $partners->nama_perusahaan }}</td>
                                </tr>
                                <tr>							      
                                    <td>Npwp</td>
                                    <td>{{ $partners->npwp }}</td>
                                </tr>
                                <tr>							      
                                    <td>No Telp Perusahaan</td>
                                    <td>{{ $partners->telp }}</td>
                                </tr>
                                <tr>							      
                                    <td>Kontak Person</td>
                                    <td>{{ $partners->kontak_person }}</td>
                                </tr>
                                <tr>							      
                                    <td>Handphone</td>
                                    <td>{{ $partners->phone }}</td>
                                </tr>
                                <tr>							      
                                    <td>Email</td>
                                    <td>{{ $partners->email }}</td>
                                </tr>
                                <tr>							      
                                    <td>Alamat</td>
                                    <td>{{ $partners->alamat }}</td>
                                </tr>
						  	</tbody>
						</table>
					</div>
				</div>
				<!--end::Section-->
            </div>
			
			<!--end::Form-->
		</div>
		<!--end::Portlet-->

   </div>
</div>
</div>
@endsection

