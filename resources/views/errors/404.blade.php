@extends('layouts.app', ['title' => 'Not Found'])

@section('content')

    <div class="row text-center">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">404 Page Not Found 😴 </h2>
            <p class="mb-4 mx-2"> Page Not Found </p>
            <div class="mt-3">
                <img src="{{asset('assets/img/illustrations/page-misc-error-light.png')}}"
                     alt="404" width="250" class="img-fluid"
                     height="250"
                >
            </div>
        </div>
    </div>

@endsection




