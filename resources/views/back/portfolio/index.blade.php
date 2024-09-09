@extends('back.layouts.app')

@section('script-head')
<link href="{{ asset('back/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

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
                    <a href="/admin/portfolio" class="m-nav__link">
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
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ $judul }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="/admin/portfolio/create"
                                    class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-cart-plus"></i>
                                        <span>New Record</span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>

                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1 ;
                            @endphp
                            @foreach ($portfolios as $item)                             
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>    
                                    <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{url('data_file/'.$item->image)}}" alt="image" width="100%" >
                                    </div>
                                    <div class="col-lg-9">
                                      <strong> <a href="/admin/portfolio/show/{{ $item->id }}">{{ $item->title }}</a></strong>  <br>
                                        {!! Str::limit($item->deskripsi, 100) !!}
                                    </div>
                                </td>
                                <td>{{ $item->category->title }}</td>
                               
                                <td>
                                    @if ($item->is_published == 0)
                                    <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                                    @else
                                    <span class="m-badge m-badge--brand m-badge--wide">publish</span>
                                    @endif
                                </td>
                                <td width="150px">
                                    <a href="/admin/portfolio/publish/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-multimedia-5"></i></a>
                                    {{-- <a href="/admin/portfolio/show/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-visible"></i></a> --}}
                                    <a href="/admin/portfolio/edit/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-edit"></i></a>
                                    <a href="/admin/portfolio/destroy/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-delete"></i></a>
                                </td>
                            </tr>                            
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <!--end::Portlet-->

        </div>
    </div>
</div>
@endsection

@section('script-footer')
<script src="{{ asset('back/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('back/assets/demo/default/custom/crud/datatables/data-sources/html.js') }}"
    type="text/javascript"></script>
@endsection
