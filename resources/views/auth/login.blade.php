@extends('../_templates/master')

@section('main')
<div class="vertical-align-wrap">
    <div class="vertical-align-middle">
        <div class="auth-box ">
            <div class="left">
                <div class="content">
                    <div class="header">
                        <div class="logo text-center"><img src="assets/img/logo-kota-padang.png" width="100" alt="Klorofil Logo"></div>
                        <p class="lead">Login to your account</p>
                    </div>
                    <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group form-group">
                            <span class="input-group-addon"><i class="lnr lnr-user"></i></span>
                            <input class="form-control" placeholder="Type your username here......" type="text" name="username" required autofocus>
                        </div>
                        <div class="input-group form-group">
                            <span class="input-group-addon"><i class="lnr lnr-lock"></i></span>
                            <input class="form-control" placeholder="Type your password here......" type="password" name="password" required>
                        </div>
                        <div class="form-group clearfix">
                            <!-- <label class="fancy-checkbox element-left">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </label> -->
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('LOGIN') }}</button>
                        <!-- <div class="bottom">
                            <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="overlay"></div>
                <div class="content text">
                    <h1 class="heading">Sistem Informasi Surat Pertanggungjawaban</h1>
                    <p>by The Develovers</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection