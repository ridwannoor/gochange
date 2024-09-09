@if( Session::has('errors') )
<div class="alert alert-danger alert-dismissible fade show" role="alert" align="left">
<div class="errlist">
@foreach($errors->all() as $error) 
{{$error}}</br>
@endforeach
</div>
</div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
        <strong>Well done!</strong> {{ $message }}.					  	
    </div>
@endif

@if ($message = Session::get('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
        <strong>Well done!</strong> {{ $message }}.					  	
    </div>
@endif
