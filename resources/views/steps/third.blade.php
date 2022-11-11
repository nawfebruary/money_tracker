@extends('layouts.auth')
@section('title', 'Shwesuboo')
@section('content')
    <div class="stepper stepper-links d-flex flex-column">
        <!--begin::Nav-->
        <div class="stepper-nav justify-content-center py-2">
            <!--begin::Step 1-->
            <div class="stepper-item me-5 me-md-15 " data-kt-stepper-element="nav">
                <h3 class="stepper-title">1</h3>
            </div>
            <!--end::Step 1-->
            <!--begin::Step 2-->
            <div class="stepper-item me-5 me-md-15 " data-kt-stepper-element="nav">
                <h3 class="stepper-title">2</h3>
            </div>
            <!--end::Step 2-->
            <!--begin::Step 3-->
            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                <h3 class="stepper-title">3</h3>
            </div>
            <!--end::Step 3-->
            <!--begin::Step 4-->
            <div class="stepper-item" data-kt-stepper-element="nav">
                <h3 class="stepper-title">4</h3>
            </div>
            <!--end::Step 4-->
        </div>
        <!--end::Nav-->
        <form class="mx-auto mw-500px w-100 pt-15" action={{ route('register.third-step.create') }} method="POST">
            @csrf
            <!--begin::Wrapper-->
            <div class="w-100">
                <!--begin::Heading-->
                <div class="mb-13">
                    <!--begin::Title-->
                    <h2 class="mb-3">{{ $RelevantUserType['title'] }}</h2>
                    <!--end::Title-->
                </div>
                <div class="mb-13">
                    <!--begin::Image-->
                    <img alt="Logo" src="{{ $RelevantUserType['image'] }}" class="rounded w-100" />
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <div class="fv-row d-flex align-items-center justify-content-center mb-5" data-kt-buttons="true">
                    <!--begin::Option-->
                    <label id='outgoing'
                        class="btn btn-md btn-success w-50 me-2">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="{{ $RelevantUserType['key'] }}" value="1" required />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="fs-3 fw-bolder text-gray-900 d-block">Yes</span>

                    </label>
                    <!--end::Option-->
                    <!--begin::Option-->
                    <label id='outgoing'
                        class="btn btn-md btn-danger w-50">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="{{ $RelevantUserType['key'] }}" value="0" required />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <span class="fs-3 fw-bolder text-gray-900 d-block">No</span>

                    </label>
                    <!--end::Option-->
                </div>
                {{--  <!--begin::Actions-->
                <div class="d-flex flex-stack">
                    <a href="{{ route('register.second-step.create', ['param' => true]) }}"
                        class="btn btn-lg btn-light me-3">Back</a>  --}}
                    <button type="subimit" class="btn btn-lg btn-primary d-none" id="third_next">
                        <span class="indicator-label">Financing</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                {{--  </div>
                <!--end::Actions-->  --}}
            </div>
            <!--end::Wrapper-->
        </form>
    </div>
    <!--end::Stepper-->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#outgoing', function(event) {
                $('#third_next').click();
            })
        })
    </script>
@endsection
