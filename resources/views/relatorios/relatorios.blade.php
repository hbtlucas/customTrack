<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    /* Estilos para a sidebar */
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #333;
      padding-top: 20px;
      color: white;
    }

    .sidebar a {
      padding: 15px 25px;
      text-decoration: none;
      font-size: 20px;
      color: white;
      display: block;
      transition: 0.2s;
    }

    .sidebar a.active {
    background-color: #ff3c00;
    color: white;
    }

    .sidebar a:hover {
      background-color: #555;
    }

    /* Estilos para o conteúdo */
    .content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
        <span style="margin-left: 25px; font-size: 30px; color: rgb(255, 255, 255);">Custom</span>
        <span style="font-size: 30px; color: rgb(255, 0, 0);">Track</span>
    <a href="{{route('clientes')}}">Clientes</a>
    <a href="{{route('pedidos')}}">Pedidos</a>
    <a href="{{route('produtos')}}">Produtos</a>
    <a href="{{route('relatorios')}}" class="active">Relatórios</a>
  </div>

  <!-- Conteúdo da página -->
  <div class="content">

    <div class="row">
        <form style="margin: 10px" method="GET" action="{{route('index')}}">
          <button style="" class="btn #546e7a blue-grey darken-1" type="submit">Home</button>
        </form>
  
        <form style="margin: 10px;" method="GET" action="{{ route('relatorios.cadastro') }}">
          @csrf
          <button style="" class="btn #546e7a blue-grey darken-1" type="submit">Adicionar Relatório</button>
        </form>

    </div>
  
    @foreach ($relatorios as $relatorios)
        <div class="row">
          <div class="col s12 m6">
            <div class="card">
              <div class="card-content">
                <span class="card-title">{{$relatorios->titulo}}</span>
                <span class="card-subtitle">Cliente: {{$relatorios->cliente}}</span>
                <p>{{$relatorios->texto}}</p>
              </div>
              <div class="card-action">

                <div class="row">
                  <div style="margin-left: 10px">
                    <form action="{{ route('relatorios.edit',['id'=>$relatorios->id]) }}">
                      @csrf
                      <button type="submit" class="btn #37474f blue-grey darken-3" >Editar</button>
                    </form>
                  </div>

                  <div style="margin-left: 10px">
                    <form action="{{ route('relatorios.delete',['id'=>$relatorios->id]) }}" method="POST">
                      @csrf
                      @method ('DELETE')
                        <button type="submit" class="btn red" >Deletar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

    </div>
</body>
</html>