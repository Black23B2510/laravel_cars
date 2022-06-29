<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Phuong trinh bac nhat</title>
</head>
<body>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form method="POST" action="{{route('PTBN')}}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <label for="a">He so a:</label>
    <input required  type="number" id="a" name="a" value="{{isset($a)?$a:''}}"><br><br>
    <label for="b">He so b:</label>
    <input required type="number" id="b" name="b" value="{{isset($b)?$b:''}}"><br><br>
    <input type="submit" value="Giai PT">
  </form>
  <h1>{{isset($kq)?$kq:''}}</h1>
</body>
</html>