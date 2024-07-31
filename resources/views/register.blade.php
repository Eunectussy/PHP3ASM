<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        @if (session('message'))
        <h4 class="text-danger">{{ session('message') }}</h4>
        @endif
      <h3>Đăng ký</h3>
      <form action="{{ route('postRegister') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="abc">
          </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="123456">
        </div>
        <button class="btn btn-primary">Đăng ký</button>
        <a href="{{route('trangchu')}}" class="btn btn-success">Trang chủ</a>
        <a href="{{route('login')}}" class="btn btn-success">Đăng nhập</a>
      </form>
    </div>
    {{-- <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>