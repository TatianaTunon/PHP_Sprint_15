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
        <a href="{{route('ranking.winner')}}" class="btn btn-dark ">Winner</a>
        <a href="{{route('percentatge')}}" class="btn btn-dark ">% Éxitos</a>
        <a href="{{route('ranking.loser')}}" class="btn btn-dark ">Loser</a>
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
                    <td>
                    <script>
                     v_player='{{ $player->name}}';
                     if (v_player) 
                     {v_mostra=v_player;} 
                     else {v_mostra="Anonim";}
                    document.write(v_mostra); 
                     </script>
                     </td>
                     <td>{{ $player->created_at}}</td>
                    
                <!-- EDIT Y DELETE-->
                    <td> <div class="btn-group">
                    <a href="{{route('players.games', $player->id)}}" class="btn btn-success ">Jugar</a>
                    <a href="{{route('show.players', $player->id)}}" class="btn btn-info ">Tiradas</a>
                    <a href="{{route('players.edit', $player->id)}}" class="btn btn-warning ">Editar</a>
                    <form method="POST" action="{{route('craps.destroy', $player->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" href="#" class="btn btn-danger">Borrar</button>
                    </div> </td>
                    </form>
                @endforeach
                </tr>            
                </tbody>
            </table>
            
        </div>   
    </div>
</div>   
</form>
</div>

</div>

</div>
</div>
</body>
</html>
@endsection('content')
<!-- end document-->
