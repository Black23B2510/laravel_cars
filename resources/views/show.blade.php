<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show database day 2</title>
    <link rel="stylesheet" href="../css/showdatabase.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        color:white;
        }
        .container {
            background-color: #84D9BA;
        }
        .row{
            margin-top:50px;
        }
        .col-md-4{
            margin-bottom:70px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="row g-3">
            <h1>Car {{ $car['id'] }}</h1>
            <div class="d-flex form">
                <div class="col-md-4">
                    <img style="height: 200px; width:200px;" src="/images/{{$car['image']}}" class="rounded float-start" alt="...">
                </div>
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Description </label>
                    <input type="email" class="form-control" id="getMake" value="{{$car['description']}}">

                    <label for="inputPassword4" class="form-label">Model</label>
                    <input type="text" class="form-control" id="getModel" value="{{$car['model']}}">

                    <label for="inputAddress" class="form-label">Produced_on </label>
                    <input type="text" class="form-control" id="getProduced_on" value="{{$car['produced_on']}}">
                </div>
            </div>
        </form>
        <a href={{route ('cars.index')}}><button class="btn btn-primary" type="submit">BACK TO LIST CARS</button></a>
    </div>
</body>
</html>