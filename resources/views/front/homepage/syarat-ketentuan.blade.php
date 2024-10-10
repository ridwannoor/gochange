@extends('front.layouts.app')

@section('content')

<section id="page-title">
    <div class="container clearfix">
        <h1>{{ $title }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
          
        </div>
    </div>
</section>

@endsection
