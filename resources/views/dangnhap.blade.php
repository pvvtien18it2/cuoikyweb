<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{!! url('resources/fonts/material-icon/css/material-design-iconic-font.min.css') !!}">

    <!-- Main css -->
    <link rel="stylesheet" href="{!! url('resources/css/style.css') !!}">
</head>
<body>

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{!! url('resources/images/signin-image.jpg') !!}" alt="sing up image"></figure>
                    <a href="{!! route('getdangky') !!}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form action="{!! route('postdangnhap') !!}" method="POST" class="register-form" id="login-form">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        @if (isset($error))
                            {!! $error !!}
                        @endif
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            {!! $errors->first('your_name') !!}
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            {!! $errors->first('your_pass') !!}
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Sing in  Form -->

</div>

<!-- JS -->
<script src="{!! url('resources/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! url('resources/js/main.js') !!}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
