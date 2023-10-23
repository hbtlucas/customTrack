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
  </div>

  <!-- Conteúdo da página -->

  <div class="content">
        <h2>Editar Pedido</h2>
        <form action="{{ route('pedidos.update',['id_pedido'=>$pedidos->id_pedido]) }}" method="POST">
          @csrf
          @method ('PUT')
          <div class="form-group">
            <label for="email-cliente">Email do cliente</label>
            <input name="email-cliente" type="email" value="{{$pedidos->clientes->email}}" class="form-control" id="email-cliente" placeholder="Digite o email do cliente que está fazendo o pedido">
          </div>

          <div class="form-group">
            <label for="produto">Nome do produto:</label>
            <input name="produto" type="text" value="{{$pedidos->produtos->nome_produto}}" class="form-control" id="produto" placeholder="Digite o nome do produto">
          </div>

          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input name="quantidade" type="number" value="{{$pedidos->quantidade}}" class="form-control" id="quantidade" placeholder="Digite a quantidade">
          </div>
          
          <div class="form-group">
            <label for="id_forma_pagamento">Forma de Pagamento:</label>
            <select name="id_forma_pagamento" class="form-control" id="id_forma_pagamento">
              <option value="1" {{$pedidos->id_forma_pagamento == 1 ? 'selected' : '' }}>Pix</option>
              <option value="2" {{$pedidos->id_forma_pagamento == 2 ? 'selected' : '' }}>Cartão de Crédito</option>
              <option value="3" {{$pedidos->id_forma_pagamento == 3 ? 'selected' : '' }}>Cartão de Débito</option>
              <option value="4" {{$pedidos->id_forma_pagamento == 4 ? 'selected' : '' }}>Dinheiro Físico</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="status_pedido">Status do pedido: </label>
            <select name="status_pedido" class="form-control">
              <option value="andamento" {{ $pedidos->status_pedido == 'andamento' ? 'selected' : '' }}>Andamento</option>
              <option value="aprovacao" {{ $pedidos->status_pedido == 'aprovacao' ? 'selected' : '' }}>Aguardando Aprovação</option>
              <option value="concluido" {{ $pedidos->status_pedido == 'concluido' ? 'selected' : '' }}>Concluido</option>
            </select>
          </div>

          <div class="form-group">
            <label for="status_pagamento">Status do pagamento </label>
            <select name="status_pagamento" class="form-control" id="status_pagamento">
              <option value="aprovado" {{ $pedidos->status_pagamento == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
              <option value="andamento" {{ $pedidos->status_pagamento == 'andamento' ? 'selected' : '' }}>Em falta</option>
            </select>
          </div>
          
          <button type="submit" class="btn btn-dark">Salvar</button>
        </form>
      </div>
</div>
</body>
</html>