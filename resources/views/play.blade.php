<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="{{route('play')}}"  method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Choisir Un Nombre</label>
            <input type="number" class="form-control" id="exampleFormControlInput1"  name="nbr">
          </div>
          <div class="mb-3">
          <button type="submit" class="btn btn-warning"  >Deviner</button>
          </div>
    </form>
   
        @isset($mess)
        <div class="alert alert-primary" role="alert">
        {!!$mess!!}
    </div>
        @endisset
      
     
</body>
</html>