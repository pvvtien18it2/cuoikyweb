
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
    <style>
            .container div {
            margin: 10px;
            padding :10px;
            background: #ebf5fb;
            }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="/blog/public/home">DANH SÁCH KHÁCH HÀNG ĐẶT PHÒNG ONLINE</a>
    </nav>
    <div class="container">
            @foreach ($blog as $b)
            <div class="border">
                <p>HỌ VÀ TÊN: {{$b->name}}</p>
                <p>SỐ ĐIỆN THOẠI: {{$b->phone}}</p>
                <p>EMAIL: {{$b->email}}</p>
                <p>ĐỊA CHỈ: {{$b->add}}</p>
                <p>NGÀY ĐẾN: {{$b->come}}</p>
                <p>NGÀY ĐI: {{$b->back}}</p>
                <p>số ngừogi: {{$b->people}}</p>
                <p>Loại phòng: {{$b->rooms}}</p>

                    <form style="text-align: center" action="{{ route('post.delete',$b->id) }}" method="POST">
                            @csrf
                            @method('delete')
                    <a class="btn btn-primary" href="{{ route('post.edit', $b->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-5"></div>
                {!! $blog->render() !!}
            </div>
            <div class="col-sm-5"></div>
        </div>
        <hr>
    <div id="footer" class="container"></div>
        <div class="row text-center">
          <div class="col-sm-12">
            <p>Copyright &copy; 2017 by VuAn</p>
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
