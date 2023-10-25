<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    .user {
    position: absolute;
    margin-bottom: 20px;
    bottom: 0; 
    font-size: 25px;
    color: red;
    font-weight: 700;
}
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
        <span style="margin-left: 25px; font-size: 30px; color: rgb(255, 255, 255);">Custom</span>
        <span style="font-size: 30px; color: rgb(255, 0, 0);">Track</span>
    <a href="{{ route('clientes') }}">Clientes</a>
    <a href="{{ route('pedidos') }}" class="active">Pedidos</a>
    <a href="{{route('produtos')}}">Produtos</a>
    <a href="{{route('relatorios')}}">Relatórios</a>

    <div class="user">
      <span style="margin-left: 25px; font-size: 25px; color: rgb(255, 0, 0)">{{ session('user') }}</span>
    </div>  
  </div>

  <!-- Conteúdo da página -->
  <div class="content">

    <div style="padding: 20px;" class="row">
      <form style="margin: 10px;" method="" action="{{ route('index') }}">
        <button class="btn btn-dark" type="submit">Home</button>
      </form>

      <form style="margin: 10px;" method="" action="{{ route('pedidos.cadastropedido') }}">
        <button class="btn btn-dark" type="submit">Cadastrar Pedido</button>
      </form>

      <form style="margin: 10px" action="{{route('pedidos.search')}}">
        <div class="form-group d-flex gap-2">
          <input class="form-control" type="text" name="search" placeholder="pesquisar" id="search">&nbsp;
          <button class="btn btn-info d-flex align-items-center" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></button>
        </div>
    </form>
    
  </div>

    <div class="row">
        <div style="margin-left: 30px;">
            <table class="table table-striped">
              <thead> 
                <tr>
                  <th>Id</th>
                  <th>Nome do cliente</th>
                  <th>Nome do produto</th>
                  <th>Quantidade</th>
                  <th>Forma de pagamento</th>
                  <th>Status do pedido</th>
                  <th>Status do pagamento</th>
                  <th>Valor Final</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pedidos as $pedidos)                    
                  <tr>
                    <td>{{$pedidos->id_pedido}}</td>
                    <td>{{$pedidos->clientes->nome_cliente}}</td>
                    <td>{{$pedidos->produtos->nome_produto}}</td>
                    <td>{{$pedidos->quantidade}}</td>
                    <td>{{$formasPagamento[$pedidos->id_forma_pagamento]}}</td>
                    <td>{{$pedidos->status_pedido}}</td>
                    <td>{{$pedidos->status_pagamento}}</td>
                    <td>{{$pedidos->valor_pedido}}</td>
                    <td>
                      <div class="row">
                      <form style="margin-left: 5px" action="{{ route('pedidos.delete',['id_pedido' => $pedidos->id_pedido]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                      </form>

                      <form style="margin-left: 5px" action="{{ route('pedidos.edit', ['id_pedido' => $pedidos->id_pedido]) }}">
                        @csrf
                        <button type="submit" class="btn btn-info">Editar</button>
                      </form>
                      </div>

                    </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>