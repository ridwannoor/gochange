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

                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/admin/router/store" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="POST" />
                        </div>
                        <div class="row ">

                            <div class="col-lg-6">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Router List
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body m-2">

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Session Name</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="session_name" value="" id=" example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">IP Mikrotik</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="ip_mikrotik" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Username</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="username" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Password</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="password" value="" id="example-text-input">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Port</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="port" value="" id="example-text-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Hotspot Info
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body  m-2">
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Hotspot Name</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="hotspot_name" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">DNS Name</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="dns_name" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Currency</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="currency" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Session Timeout</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="session_timeout" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Live Report</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="live_report" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-4 col-form-label">Phone</label>
                                            <div class="col-8">
                                                <input class="form-control m-input" type="text" name="phone" value="" id="example-text-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Upload Logo
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body m-2">
                                        <div class="form-group m-form__group row">
                                            <!-- <label for="example-text-input" class="col-4 col-form-label">Session Name</label> -->
                                            <div class="col-12">
                                                <input class="form-control m-input" type="file" name="image" value="" id="example-text-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Help
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body  m-2">
                                        <table class="table table-border">
                                            <tr>
                                                <td>Session Name</td>
                                                <td>Fill with one word without any special characters.</td>
                                            </tr>
                                            <tr>
                                                <td>DNS Name</td>
                                                <td>Please check in Winbox, menu IP -> Hotspot -> Server Profile.</td>
                                            </tr>
                                            <tr>
                                                <td>Idle Timeout</td>
                                                <td>Idle timeout is a time countdown to logout.</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="m-portlet__body text-right">
                                    <a href="/admin/setting" type="button" class="btn  btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                    <button type="submit" class="btn  btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                                    <a href="#" type="button" class="btn  btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                                    <button type="button" class="btn  btn-success"><i class="fa fa-plug" aria-hidden="true"></i> Connect</button>
                                </div>
                            </div>
                        </div>
                    </form>
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