<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Cars</title>
    <style>
        .table{
            margin: 1%;
        }
        img{
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @endif
    <div class=row>
        
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Model</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Produced on</th>
                    <th scope="col">Manufacture_name</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <tr>
                            <th scope="row">{{ $car->id }}</th>
                            <td>{{ $car->model}}</td>
                            <td><a href="{{ route('cars.show', $car->id) }}"><img src="/images/{{$car->image}}" alt=""></a></td>
                            <td>{{ $car->description }}</td>
                            <td>{{ $car->produced_on }}</td>
                            <td>{{ $car->manufacture->name }}</td>
                            <td><a href="{{ route('cars.edit',$car->id) }}" class="btn btn-secondary">EDIT</a></td>
                            <td><button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-secondary">DELETE</button></td>
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        <div><a href={{ route('cars.create') }}><button type="submit">ADD A NEW CAR</button></a></div>
    </div>
</body>  
</html>