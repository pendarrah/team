@extends('app.master')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes" style="margin-top:10px;">

                    @if ($errors->any())
                        <div style="direction: rtl!important; text-align: right" class="alert alert-danger">
                            <ul style="direction: rtl!important; text-align: right" >
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="featured-box featured-box-primary text-left mt-5">
                                <div class="box-content">
                                    <h4 class="heading-primary text-uppercase mb-3">فراموشی رمز عبور</h4>
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
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
                                                <label> رمز عبور جدید </label>
                                                <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror">
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label> تکرار رمز عبور جدید </label>
                                                <input type="password" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror">
                                            </div>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-row">
                                            <div class="col-lg-2 mt-4"></div>
                                            <div class="form-group col-lg-6">
                                                <input style="margin-top: 30px" type="submit" value="ارسال پیامک بازیابی" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
                                            </div>
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

