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
                    <a href="/admin/post" class="m-nav__link">
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
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $posts->title }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td> {!!$posts->deskripsi !!}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $posts->categorypost->title }}</td>
                            </tr>
                            <tr>
                                <td>Tag</td>
                                <td><span
                                        class="m-badge m-badge--success m-badge--wide">{{ $posts->tagposts->implode('title', ', ') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td> <img src="/data_file/{{ $posts->image }}" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Portlet-->
</div>
@endsection
