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
        <h2>Cadastro de Pedido</h2>
        <form action="{{route('pedidos.store')}}" method="POST">
          @csrf
            <div class="form-group">
              <label for="id_cliente">Cliente:</label>
              <select name="id_cliente" class="form-control" id="id_cliente" required>
                  <option value="">Selecione um cliente</option>
                  @foreach ($clientes as $cliente)
                      <option value="{{ $cliente->id_cliente }}">{{ $cliente->nome_cliente }} ({{ $cliente->email }})</option>
                  @endforeach
              </select>
              @error('id_cliente')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>

          <div class="form-group">
            <label for="produto">Produto:</label>
            <select name="id_produto" class="form-control" id="id_produto" required>
              <option value="">Selecione um produto</option>
              @foreach ($produtos as $produto)
                <option value="{{ $produto->id_produto}}"> {{ $produto-> nome_produto }}</option>
              @endforeach
            </select>
            @error('id_produto')
                  <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input name="quantidade" type="number" class="form-control" id="quantidade" placeholder="Digite a quantidade">
          </div>
          
          <div class="form-group">
            <label for="id_forma_pagamento">Forma de Pagamento:</label>
            <select name="id_forma_pagamento" class="form-control" id="id_forma_pagamento">
              <option value="1">Pix</option>
              <option value="2">Cartão de Crédito</option>
              <option value="3">Cartão de Débito</option>
              <option value="4">Dinheiro Físico</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="status_pedido">Status do pedido: </label>
            <select name="status_pedido" class="form-control">
              <option value="andamento">Andamento</option>
              <option value="aprovacao">Aguardando Aprovação</option>
              <option value="concluido">Concluido</option>
            </select>
          </div>

          <div class="form-group">
            <label for="status_pagamento">Status do pagamento </label>
            <select name="status_pagamento" class="form-control" id="status_pagamento">
              <option value="aprovado">Aprovado</option>
              <option value="andamento">Em falta</option>
            </select>
          </div>
          
          <button type="submit" class="btn btn-dark">Cadastrar</button>
        </form>
      </div>
</div>
</body>
</html>