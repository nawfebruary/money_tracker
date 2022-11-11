@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="form w-100" id="kt_sign_in_form">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Reset Password</h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                value="{{ old('email', $request->email) }}" autofocus required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
            <!--end::Label-->
        <!--begin::Input-->
        <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off"
            required />
        <!--end::Input-->
        </div>
        <!--end::Input group-->

        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fw-bolder text-dark fs-6 mb-0">Confirm Password</label>
            <!--end::Label-->
        <!--begin::Input-->
        <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation"
            autocomplete="off" required />
        <!--end::Input-->
        </div>
        <!--end::Input group-->



        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">  {{ __('Reset Password') }}</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
@stop
