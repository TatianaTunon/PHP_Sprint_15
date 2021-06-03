@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">

<body class="animsition">
<div class="page-wrapper">

<!-- MAIN CONTENT-->
<div class="main-content">

<div class="col-lg-10 offset-lg-3 text-center">
    <div class="col-md-6">
        <div class="container-fluid">
        <h1><script>
            v_player='{{ $player->name}}';
            if (v_player) 
            {v_mostra=v_player;} 
            else {v_mostra="Anonim";}
            document.write(v_mostra); 
        </script></h1>  
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                <th>crap1</th>
                <th>crap2</th>
                <th>result</th>
                </tr>
            </thead>
                <tbody> 
                @foreach($crap as $crap)
                <tr>             
                <td> <?php echo ($crap->crap1); ?></td>
                <td> <?php echo ($crap->crap2); ?></td>
                <td> <?php echo ($crap->res); ?></td>
                </tr>
                @endforeach
                </tbody>
            </table>   
        </div>  
     <a href="{{route('index')}}" class="btn btn-primary">Volver</a>  
    </div>
</div>   

</div>

</div>
</body>
</html>
@endsection('content')
<!-- end document-->
