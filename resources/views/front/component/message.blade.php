
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><i data-feather="thumbs-up" class="fea icon-sm mr-2"></i>Berhasil</strong> Pesan Tersampaikan, Kami Akan Membalas Anda.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
 </div>
@endif


@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><i data-feather="thumbs-up" class="fea icon-sm mr-2"></i>Well done!</strong>You successfully read this important alert message.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
 </div>
@endif