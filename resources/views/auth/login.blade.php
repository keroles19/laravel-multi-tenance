@extends('auth.layouts.auth_app', ['title' => 'Login'  ])

@section('content')

    <div class="d-none d-lg-flex col-lg-6 col-xl-7 align-items-center p-5 bg-black">
        <div class="w-100 d-flex justify-content-center">
            <img src="{{ asset('assets/img/branding/logo.png') }}"
                 class="img-fluid"
                 alt="{{ env('APP_NAME') }}"
                 width="500"
            />
        </div>
    </div>

    <div class="d-flex col-12 col-lg-6 col-xl-5 align-items-center authentication-bg p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-5">
                <span class="app-brand-logo demo">
                   <!-- set logo here  -->
                </span>
                <span class="app-brand-text demo text-body fw-bolder" style="text-transform: uppercase">
                {{ env('APP_NAME') }}
            </div>
            <!-- /Logo -->

            <div style="position: absolute; right: 20px">
            </div>
            <h4 class="mb-2"> Login To Orderking </h4>
            <form id="formAuthentication" class="mb-3 submit_form_loader_btn" action="{{ route('login') }}"
                  method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label"> Email  <b class="text-danger">*</b>
                    </label>
                    <input
                        type="email"
                        class="form-control @if ($errors->any()) border-danger @endif"
                        name="email"
                        placeholder="Enter Email"
                        autofocus
                        autocomplete="off"
                        value="{{old('email')}}" required
                    />
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password<b
                                class="text-danger">*</b></label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input
                            type="password" autocomplete="off"
                            id="password"
                            class="form-control"
                            name="password"
                            value="{{old('password')}}"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="Enter password" required
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary  w-100">Login</button>
            </form>
        </div>
    </div>
@endsection
