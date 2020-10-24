@extends('app.master')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes" style="margin-top:20px;">

                    @if ($errors->any())
                        <div style="direction: rtl!important; text-align: right" class="alert alert-danger">
                            <ul style="direction: rtl!important; text-align: right" >
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="featured-box featured-box-primary text-left mt-5">
                                <div class="box-content">
                                    <h4 class="heading-primary text-uppercase mb-3">ورود به سایت</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label> شماره موبایل </label>
                                                <input type="text" name="mobile" class="form-control form-control-lg @error('mobile') is-invalid @enderror">
                                            </div>
                                            @error('mobile')
                                             <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <a class="float-right" href="{{ route('password.request') }}">(فراموشی کلمه عبور؟)</a>
                                                <label>کلمه عبور</label>
                                                <input type="password" name="password" class="form-control form-control-lg  @error('password') is-invalid @enderror">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label style="margin-right: 20px;" class="form-check-label" for="remember">
                                                            مرا بخاطر بسپار
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input type="submit" value="ورود" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
                                            </div>
                                            <a class="float-left m-1" href="/register">(حساب کاربری ندارید؟)</a>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection
