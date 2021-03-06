<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@lang('Login') | {{env('APP_NAME')}}</title>
    <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <!-- Bootstrap-->
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">--}}
    <!-- Theme style -->
    {{--<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">--}}
    <!-- Ionicons -->
    {{--<link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">--}}
    {{--<link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/free.min.css">--}}
    {{--<link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/brand.min.css">--}}
    {{--<link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/flag.min.css">--}}
    {{--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"--}}
          {{--rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">--}}
    <link rel="stylesheet" href="{{ asset('assets/Iransans/main.css') }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="post" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                            <h1>@lang('Login')</h1>
                            <p class="text-muted">@lang('Sign In to your account')</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}"
                                       placeholder="{{__('Email')}}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" placeholder="{{__('Password')}}" name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                       <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary" type="submit">@lang('Login')</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="{{ url('/password/reset') }}">
                                        @lang('Forgot Password?')
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>@lang('Sign up')</h2>
                            <p>@lang('Register Description')</p>
                                <a class="btn btn-primary active mt-3" href="{{ url('/register') }}">@lang('Register Now!')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CoreUI and necessary plugins-->
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>--}}

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
