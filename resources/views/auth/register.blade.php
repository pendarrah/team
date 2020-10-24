@extends('app.master')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes" style="margin-top:100px;">

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
                                    <h4 class="heading-primary text-uppercase mb-3">ثبت نام جدید</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label>شماره تماس</label>
                                                <input type="text" name="mobile" class="form-control form-control-lg">
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label>کلمه عبور</label>
                                                <input type="password" name="password" class="form-control form-control-lg">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>تکرار کلمه عبور</label>
                                                <input type="password" name="password_confirmation" class="form-control form-control-lg">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <input type="submit" value="ثبت نام" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
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
