@extends('back.layouts.app')

@section('script-head')
<link href="{{ asset('back/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
                                <a href="/admin/addrouter" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>&nbsp; Add Router
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
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Session Name</th>
                                <th>Action</th>
                                <th>Hotspot Name</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $no = 1 ;
                            @endphp
                            @foreach($settings as $sett)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$sett->session_name}}</td>
                                <td>
                                    <button class="btn btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm"><i class="fa fa-plug" aria-hidden="true"></i></button>
                                </td>
                                <td>{{ $sett->hotspot_name }}</td>                         
                            </tr>
                            @endforeach()
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
<script src="{{ asset('back/assets/demo/default/custom/crud/datatables/data-sources/html.js') }}" type="text/javascript"></script>
@endsection