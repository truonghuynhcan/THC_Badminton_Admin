@extends('layout.basic')
@section('title', 'Đăng ký')
@section('body')

    <body class="d-flex align-items-center bg-light-green">
        <!-- MAIN CONTENT -->
        <main class="container">
            <div class="row align-items-center justify-content-center vh-100">
                <div class="col-md-7 col-lg-6 d-flex flex-column py-6">
                    <div class="my-auto">
                        <!-- Title -->
                        <h1 class="mb-2">
                            Đăng ký
                        </h1>

                        <!-- Subtitle -->
                        <p class="text-secondary">
                            Bạn chưa có tài khoản? Tạo tài khoản của bạn, chỉ mất chưa đầy một phút.
                        </p>

                        <!-- Form -->
                        <form method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Họ và tên <span class="text-danger">(*)</span>
                                        </label>
                                        <!-- Input -->
                                        <input type="text" class="form-control" placeholder="Họ và tên của bạn"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Email <span class="text-danger">(*)</span>
                                        </label>
                                        <!-- Input -->
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Password <span class="text-danger">(*)</span>
                                        </label>
                                        <!-- Input -->
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="form-control" autocomplete="off"
                                                data-toggle-password-input placeholder="Password" name="pass" required>
                                            <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                                data-toggle-password></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Confirm password <span class="text-danger">(*)</span>
                                        </label>
                                        <!-- Input -->
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="form-control" autocomplete="off"
                                                data-toggle-password-input placeholder="nhập lại password"
                                                name="repass" required>
                                            <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                                data-toggle-password></button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <div class="form-check">
                                <!-- Input -->
                                <input type="checkbox" class="form-check-input" id="agree">
                                <!-- Label -->
                                <label class="form-check-label" for="agree">
                                    Tôi đồng ý với <a href="javascript: void(0);">Điều khoản và điều kiện</a> và đã hiểu
                                    <a href="javascript: void(0);">Chính sách bảo mật</a>
                                </label>
                            </div>
                            @if (Session::has('message'))
                                <div class="alert alert-warning" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                                @php
                                    Session::forget('message');
                                @endphp
                            @endif
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <!-- Button -->
                                <button type="submit" class="btn btn-primary">
                                    Đăng ký
                                </button>
                                <!-- Link -->
                                <small class="mb-0 text-muted">
                                    Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 px-lg-4 px-xl-6 d-none d-lg-block">

                    <!-- Image -->
                    <div class="text-center">
                        {{-- <img src="https://d33wubrfki0l68.cloudfront.net/d7b3128e115346d419e411ffe3ac9a97c6c1bbd5/70041/assets/images/illustrations/sign-up-illustration.svg"
                            alt="..." class="img-fluid"> --}}
                        <img src="{{ asset('images/bg/email-verification-cover.jpg') }}" alt="..." class="img-fluid">
                    </div>
                </div>
            </div> <!-- / .row -->
        </main> <!-- / main -->

    </body>
@endsection
