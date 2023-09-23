@extends('layouts.app', ['title' => 'Not Authorized'])
@section('content')
    <div class="d-flex align-items-center justify-content-center" style="margin-top: 8em;margin-bottom: 8em;">
        <div class="text-center">
            <h1 class="display-1 fw-bold"> Unauthorized </h1>
            <p class="fs-3"> <span class="text-danger">
               403
            </span> Unauthorized</p>
            <p class="lead">
               opps!  not have permission
            </p>
        </div>
    </div>
@endsection
