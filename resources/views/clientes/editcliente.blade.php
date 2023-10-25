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
    <a href="{{ route('clientes') }}" class="active">Clientes</a>
    <a href="{{ route('pedidos') }}">Pedidos</a>
    <a href="{{route('produtos')}}">Produtos</a>
    <a href="{{route('relatorios')}}">Relatórios</a>

    <div class="user">
      <span style="margin-left: 25px; font-size: 25px; color: rgb(255, 0, 0)">{{ session('user') }}</span>
    </div>  
  </div>

  <!-- Conteúdo da página -->
  <div class="content">
        <h2>Editar cliente</h2>
        <form action="{{ route('clientes.update', ['id_cliente' => $cliente->id_cliente]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome_cliente" class="form-control" value="{{$cliente->nome_cliente}}" id="nome_cliente" placeholder="Digite o nome">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{$cliente->email}}" id="email" placeholder="Digite o email">
          </div>
          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" name="telefone" class="form-control" value="{{$cliente->telefone}}" id="telefone" placeholder="Digite o telefone">
          </div>
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" class="form-control" value="{{$cliente->cpf}}" id="cpf" placeholder="Digite seu cpf">
          </div>
          <button type="submit" class="btn btn-dark">Salvar</button>
        </form>
      </div>
</div>
</body>
</html>