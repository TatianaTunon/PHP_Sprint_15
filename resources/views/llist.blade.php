@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">

<body class="animsition">
<div class="page-wrapper">

<!-- MAIN CONTENT-->
<div class="main-content">
   
        <h2 class="col-lg-6 offset-lg-5"> Players </h2>

<div class="col-lg-10 offset-lg-3 text-center">
    <div class="col-md-6">
        <div class="container-fluid">
            <div class="text-center">
                <p>Nº de players {{ $players->count() }}</p>
                <td>% mig de éxit = {{ $total_percentatge}}</td>
            </div>
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Nº Tiradas</th>
                        <th>% Éxitos</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                <tr>
                    <td>
                    <script>
                     v_player='{{ $player->name}}';
                     if (v_player) 
                     {v_mostra=v_player;} 
                     else {v_mostra="Anonim";}
                    document.write(v_mostra); 
                     </script>
                     </td>     
                     <td>{{ $player->total_tiradas}}</td>
                     <td>{{ $player->total_percentatge}}</td>
                @endforeach
                </tr>            
                </tbody>
            </table>
        <a href="{{route('index')}}" class="btn btn-primary">Volver</a>   
        </div>   
    </div>
</div>   


</div>
</body>
</html>
@endsection('content')
<!-- end document-->
