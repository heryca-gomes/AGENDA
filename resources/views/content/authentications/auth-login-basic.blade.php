@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
<style>
    body {
        background-color: #195128 !important;
    }
</style>
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

@section('content')
<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card p-2">
                <!-- Logo -->
                <div class="d-flex justify-content-center m-4">
                    <a href="{{url('/')}}" class="app-brand-link gap-2">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 50%" />
                    </a>
                </div>
                <div class="card-body mt-2">
                    <form id="formAuthentication" class="mb-3" action="{{url('sign-in')}}" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Entrar com email ou usuario" autofocus>
                            <label for="email">Email ou Usuario</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <label for="password">Senha</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Permanecer conectado
                                </label>
                            </div>
                            <a href="javascript:void(0);" class="float-end mb-1">
                                <span>Esqueceu a senha?</span>
                            </a>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success d-grid w-100" type="submit">Entrar</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <span>Novo aqui?</span>
                        <a href="{{url('auth/register-basic')}}">
                            <span>Criar conta</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection