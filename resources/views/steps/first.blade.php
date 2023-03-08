@extends('layouts.step')
@section('title', 'MoneyTracker')
@section('content')
    <div class="stepper stepper-links d-flex flex-column">
        <!--begin::Nav-->
        <div class="stepper-nav justify-content-center py-2">
            <!--begin::Step 1-->
            <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav">
                <h3 class="stepper-title">1</h3>
            </div>
            <!--end::Step 1-->
            <!--begin::Step 2-->
            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
                <h3 class="stepper-title">2</h3>
            </div>
            <!--end::Step 2-->
            <!--begin::Step 3-->
            <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav">
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
        <form class="mx-auto mw-500px w-100 pt-15" action={{ route('register.first-step.create') }} method="POST">
            @csrf
            <!--begin::Wrapper-->
            <div class="w-100">
                <!--begin::Heading-->
                <div class="mb-13">
                    <!--begin::Title-->
                    <h2 class="mb-3">User Type</h2>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                @foreach ($list as $key => $type)
                    <div class="fv-row mb-15">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="radio" value="{{ $key }}"
                                id="{{ $type }}" name="user_type" />
                            <label class="form-check-label" for="{{ $type }}">
                                {{ $type }}
                            </label>
                        </div>
                    </div>
                @endforeach
                @error('user_type')
                    <div class="mt-3 list-disc list-inside text-red-600">{{ $message }}</div>
                @enderror


                {{-- <!--begin::Input group-->
                <div class="fv-row mb-15" data-kt-buttons="true">
                    <!--begin::Input-->
                    <select class="form-select form-select-solid" required name="user_type">
                        <option class='d-none' value=''>Select an user type</option>
                        @foreach ($list as $key => $type)
                            @if ($user_type == $key)
                                <option value="{{ $key }}" selected>{{ $type }}</option>
                            @else
                                <option value="{{ $key }}">{{ $type }}</option>
                            @endif
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group--> --}}
                <!--begin::Actions-->
                <div class="d-flex justify-content-end mb-5">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <span class="indicator-label">Next</span>
                    </button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Wrapper-->
        </form>
    </div>
    <!--end::Stepper-->
@endsection
@section('script')

@endsection
