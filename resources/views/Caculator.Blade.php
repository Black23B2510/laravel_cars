<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Caculator</title>
  <style>
    /* input{
      padding: 1%
    }
    .div{
      margin:1%
    } */
  </style>
</head>
<body>
  {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
  <div>
    <h2>CACULATOR</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post" action="{{route('radio')}}">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="div">
        <div class="div">
          <label for="a">a</label>
          <input type="number" name="a" id="a" required value="{{isset($a)?$a:''}}">
        </div>
        <div>
          <label for="b">b</label>
          <input type="number" name="b" id="b" required value="{{isset($b)?$b:''}}">
        </div>
      </div>
      <div class=" div">
        <input type="radio" name="radio" id="radio" value="Cong"{{ isset($check)&&($check=="Cong"?"checked": '') }} >
        <label for="radio">Cong</label><br>
        <input type="radio" value="Tru" name="radio" id="radio">
        <label for="radio">Tru</label><br>
        <input type="radio" value="Nhan" name="radio" id="radio">
        <label for="radio">Nhan</label><br>
        <input type="radio" value="Chia" name="radio" id="radio">
        <label for="radio">Chia</label>
        {{-- <select name="tinh" id="tinh" required value="{{isset($cacul)?$cacul:''}}">
          <option value="cong" selected>Cong</option>
          <option value="tru">Tru</option>
          <option value="nhan">Nhan</option>
          <option value="chia">Chia</option>
        </select> --}}
      </div>
      <div><button type="submit">Tinh</button></div>
    </form>
    <h1>{{isset($kq)?$kq:''}}</h1>
  </div>
</body>
</html>