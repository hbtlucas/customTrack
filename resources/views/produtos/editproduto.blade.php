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
    <a href="{{route('clientes')}}">Clientes</a>
    <a href="{{route('pedidos')}}">Pedidos</a>
    <a href="{{route('produtos')}}" class="active">Produtos</a>
    <a href="{{route('relatorios')}}">Relatórios</a>

    <div class="user">
      <span style="margin-left: 25px; font-size: 25px; color: rgb(255, 0, 0)">{{ session('user') }}</span>
    </div>  
  </div>

  <!-- Conteúdo da página -->

  <div class="content">
        <h2>Editar Produto</h2>
        <form action="{{ route('produtos.update', ['id_produto'=>$produtos->id_produto]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nome_produto">Nome do produto:</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{ $produtos->nome_produto }}" placeholder="Digite o nome do produto">
          </div>

          <div class="form-group">
            <label for="categoria">Categoria do produto</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $produtos->categoria }}" placeholder="Software">
          </div>

          <div class="form-group">
            <label for="valor_produto">Valor do produto</label>
            <input type="number" class="form-control" id="valor_produto" name="valor_produto" value="{{ $produtos->valor_produto }}" placeholder="Valor do produto por unidade">
          </div>

          <button type="submit" class="btn btn-dark">Salvar</button>
        </form>
      </div>
</div>
</body>
</html>