@extends('layouts.auth')
@section('title', 'Sign up')
@section('content')
    <form method="POST" action="{{ route('register') }}" class="form w-100" id="kt_sign_in_form">
        @csrf

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="required form-label fs-6 fw-bolder text-dark">Username</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" name="username" value="{{ old('username') }}"
                autofocus  required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="required form-label fs-6 fw-bolder text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="{{ old('email') }}"
                autofocus required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="required form-label fs-6 fw-bolder text-dark">Date of Birth</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="text" onfocus="(this.type = 'date')" name="date_of_birth" value="{{ old('date_of_birth') }}"
                autofocus required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="required form-label fs-6 fw-bolder text-dark">Gender</label>
            <!--end::Label-->

            <div class="fv-row mb-10 d-flex">
                <div class="form-check form-check-custom form-check-solid me-5">
                    <input class="form-check-input" type="radio" value="male"
                        id="male" name="gender" @if(old('gender') == 'male') checked @endif />
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-custom form-check-solid me-5">
                    <input class="form-check-input" type="radio" value="female"
                        id="female" name="gender" @if(old('gender') == 'female') checked @endif />
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="radio" value="not_mention"
                        id="not_mention" name="gender" @if(old('gender') == 'not_mention') checked @endif />
                    <label class="form-check-label" for="not_mention">
                        Not Mention
                    </label>
                </div>

            </div>

            {{--  <!--begin::Select-->
            <select class="form-control form-control-lg form-control-solid placeholder-opacity-0" data-hide-search="true"
                name="gender" required>
                <option class="d-none"></option>
                <option value='male' @if (old('title') == $key)) selected @endif>Male</option>
                <option value='female' @if (old('title') == $key)) selected @endif>Female</option>
                <option value='not_mention' @if (old('title') == $key)) selected @endif>Not Mention</option>
            </select>
            <!--end::Select-->  --}}
        </div>
        <!--end::Input group-->

        {{--  <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="required form-label fs-6 fw-bolder text-dark">Division</label>
            <!--end::Label-->

            <!--begin::Select-->
            <select class="form-control form-control-lg form-control-solid" data-hide-search="true"
                name="category" required>
                <option>Select an option</option>
                @foreach ($categories->groupBy('type')['expense'] as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <!--end::Select-->
        </div>
        <!--end::Input group-->  --}}

        <!--begin::Input group-->
        <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="required form-label fs-6 fw-bolder text-dark">Password</label>
                <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                autocomplete="off" required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="required form-label fs-6 fw-bolder text-dark">Confirm Password</label>
                <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="confirm_password"
                autocomplete="off" required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Register</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
@stop
