<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{!! asset('resources/member/fonts/material-icon/css/material-design-iconic-font.min.css') !!}">

    <!-- Main css -->
    <link rel="stylesheet" href="{!! asset('resources/member/css/style.css') !!}">
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Đăng ký</h2>
                    <form action="{!! route('manager.store') !!}" method="POST" class="register-form" id="register-form">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Full Name"/>
                            {!! $errors->first('name') !!}
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-account material-icons-phone"></i></label>
                            <input type="text" name="phone" id="phone" placeholder="Your Phone"/>
                            {!! $errors->first('phone') !!}
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                            {!! $errors->first('email') !!}
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                            {!! $errors->first('pass') !!}
                        </div>
                        <div class="form-group">
                            <label  for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            {!! $errors->first('re_pass') !!}
                        </div>
                        <div class="form-group">
                            <span>Admin</span>
                            <select name="admin" style="width: 75px; border-radius: 6px ; background-color: aliceblue">
                                <option value="0">Employess</option>
                                <option value="1">Manager</option>
                            </select>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Sing in  Form -->

</div>

<!-- JS -->
<script src="{!! asset('public/member/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('public/member/js/main.js') !!}"></script>
</body>
</html>
