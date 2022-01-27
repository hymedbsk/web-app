@if ($message = Session::pull('success'))
<div class="col-md-6 offset-3 mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif


@if ($message = Session::pull('error'))
<div class="col-md-6 offset-3 mt-4">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif


@if ($message = Session::pull('warning'))
<div class="col-md-6 offset-3 mt-4">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif


@if ($message = Session::pull('info'))''
<div class="col-md-6 offset-3 mt-4">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
