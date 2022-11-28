<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
	@yield('head')
</head>
<style>
    html body {
        height: max-content; 
        
    }

    #content {
        height: 100%;
        width: 100%;
    }
    .inside-block {
        /* background: #07c5d3; */
        /* padding: 10% 0; */
        margin: 10% auto;
        text-align: center;
        width: 650px;
        
    }
    
    .logo-box {
        width: 50%;
        padding: 120px 0;
        background: #FAFAFA;
        border-radius: 70px 0 0 70px;
        border: 5px solid #07c5d3;
        border-right: none;
    }

    .form-login {
        min-width: 100%;
        box-shadow: rgb(0 0 0 / 40%) 2px 3px 5px;
        border-radius: 70px;
    }

    .login-box {
        width: 50%;
        padding: 0px 50px;
        color: #ffffff;
        background: #07c5d3;
        border-radius: 0 70px 70px 0;
        border: 5px solid #07c5d3;
        border-left: none;

    }
    
    .login-box p {
        margin: 60px 0 40px;
    }

    .login-box form > * {
        margin-bottom: 30px;
    }

    .login-box form > input {
        border-radius: 30px;
        border: none;
        padding: 8px 20px;

    }

    .login-box form input:focus {
        outline: 0;
    }

    .login-box form .login-submit {
        border-radius: 30px;
        border: none;
        cursor: pointer;
        text-align: center;
        padding: 5px 0;
        background: #e2e2e2;
        box-shadow: 3px 3px #69bdcc;
    }

    .login-box form .login-submit:focus{
        outline: 0
    }
</style>
<body>
    

    <div class="login col-md-12" id="content">
        <div class="inside-block d-flex">
            <div class="form-login d-flex">
                <div class="logo-box">
                    <img src="backend/images/icons/logo_bridge.png" alt="" width="182px" height="121px" />
                </div>
                <div class="login-box">
                    <p class="title">ログイン</p>
                    <form action="{{url('/doLogin')}}" method="post" class="d-flex flex-column">
                        @csrf
                        <div>
                            @if(Session::has('success'))
                                <div class="alert alert-success text-center" style="margin: 10px">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::has('error') && !empty(Session::has('error')))
    
                                <div class="alert alert-danger text-center" style="margin: 10px">
                                {{Session::get('error')}}
                            </div>
                            @endif
                        </div>
    
                        <input type="text" class="name" name="name" placeholder="メールアドレス" />
                        <input type="password" class="password" name="password" placeholder="パスワード" />
                        <button class="login-submit">ログイン</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
