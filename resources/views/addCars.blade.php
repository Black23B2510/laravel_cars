<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <title>Add cars</title>
  <style>
    img{
      width: 40%;
      height: auto;
    }
  </style>
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
  <form action="{{route('cars.store')}}" class="was-validated" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="model">Model</label>
      <input type="text" name="model" class="form-control" id="model" aria-describedby="" placeholder="">
      <small id="model" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" name="description" class="form-control" id="description" placeholder="description">
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" onchange="changeImage(event)" name="image" class="form-control" id="image" placeholder="" value="{{isset($image)?$image:''}}">
      <img src="/images/{{ isset($car)?$car->image:''}}" alt="" id="newImage">
    </div>
    <div class="form-group">
      <label for="produced_on">Produced_on</label>
      <input name="produced_on" type="date" class="form-control" id="produced_on" placeholder="date">
    </div>
    <div class="form-group">
      <label for="mf_name">Manufacturer_name</label>
      <select class="form-control" name="manufacture_id" id="manufacture_id">
        <option value="1">dudu</option>
        <option value="2">denden</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add new Car</button>
    </div>
  </form>
  <br>
  <a href={{route ('cars.index')}}><button class="btn btn-primary" type="submit">BACK TO LIST CARS</button></a>
  <script>
    const changeImage = (e) => {
        console.log('change')
        var imgEle = document.getElementById('newImage')
        imgEle.src = URL.createObjectURL(e.target.files[0])
        imgEle.onload = () => {
            URL.revokeObjectURL(output.src)
            // congdkfj
        }
    }
</script>
</body>
</html>