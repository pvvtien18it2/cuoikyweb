<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <title>Thông tin cá nhân</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <form action="{{route('employee.matkhau')}}" method="put" class="form-control-lg " style="margin: auto; width: 800px; margin-top: 45px">
                @csrf
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('status') }}
                </div>
                @endif
                <div class="form-group row">
                    <label for="Họ và tên" class="col-md-5 col-form-label">Họ và tên</label>
                    <div class="col-md-7">
                        <span class="form-control">{{$user->name}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Số điện thoại" class="col-md-5 col-form-label">Số điện thoại</label>
                    <div class="col-md-7">
                        <span class="form-control">0{{$user->phone}}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Email" class="col-md-5 col-form-label">Email</label>
                    <div class="col-md-7">
                        <span class="form-control">{{$user->email}}</span>
                    </div>
                </div>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-left: 70%">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Đổi mật khẩu
                    </button>
                    @if($user->admin == 0)
                        <a href="{{route('employee.index')}}" style="margin-left: 20px" class="btn btn-danger">Trở lại</a>
                    @else
                        <a href="{{route('manager.index')}}" style="margin-left: 20px" class="btn btn-danger">Trở lại</a>
                    @endif
                </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="form-group row">
                                <label for="Nhập mật khẩu cũ" class="col-md-5 col-form-label">Nhập mật khẩu cũ</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="lastPass" placeholder="Nhập mật khẩu cũ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Nhập mật khẩu mới" class="col-md-5 col-form-label">Nhập mật khẩu mới</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="passNew" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Nhập lại mật khẩu mới" class="col-md-5 col-form-label">Nhập lại mật khẩu mới</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="rePassNew" placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>
                            <div class="row">
                                <button style="margin: auto; width: 20%"  type="submit" class="btn btn-success form-control">Xác nhận </button>
                            </div>

                        </div>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
