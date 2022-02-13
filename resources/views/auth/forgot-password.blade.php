@extends('layouts.auth')

@section('content')
    <form class="form w-100" method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">{{ __('Mot de passe oublié?') }}</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div
                class="text-gray-400 fw-bold fs-4">{{ __('Entrez votre e-mail pour réinitialiser votre mot de passe.') }}</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-label fw-bolder text-gray-900 fs-6">{{ __('Email') }}</label>
            <input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off"/>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                <span class="indicator-label">{{ __('Envoyer') }}</span>
                <span class="indicator-progress">{{ __('Patientez svp...') }}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <a href={{ route('password.request') }}""
               class="btn btn-lg btn-light-primary fw-bolder">{{ __('Annuler') }}</a>
        </div>
        <!--end::Actions-->
    </form>
@endsection
