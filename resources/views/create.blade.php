@extends('layout')

@section('content')
<div class="container p-3 col-md-6">
<div class="card">
    <form method="POST" action="{{ route('players.store') }}">
    @csrf <!--token-->
  <div class="card-header bg-primary text-white">
  <h3>New Player</h3>
  </div>
    <div class="card-body">
        <label for="name">Nombre</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Nombre" value="{{ old('name') }}"></br>
      
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
     
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </form>
</div>
</div>
@endsection