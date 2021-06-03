@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">

<body class="animsition">
<div class="col-lg-12 offset-lg-5 mt-5">

<div class="input-group">
  <div class="form-outline">
    <table class="table table-active bg-dark">
      <thead>
        <tr class="text-white">
          <th>Dado1</th>
          <th>Dado2</th>
          <th>Resultado</th>
        </tr>
      </thead> 
      <tr class="text-white">
        <th>{{ $crap->crap1 }}</th>
        <th>{{ $crap->crap2 }}</th>
        <th>{{ $crap->res }}</th>
      </tr>
    </table>
  </div>
 
</div>
<a href="{{route('index')}}" class="btn btn-primary">Volver</a>
</div>

</div>
</body>
</html>
@endsection('content')

