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
    <a href="{{ route('pedidos') }}">Pedidos</a>
    <a href="{{route('produtos')}}">Produtos</a>
    <a href="{{route('relatorios')}} "class="active">Relatórios</a>

    <div class="user">
      <span style="margin-left: 25px; font-size: 25px; color: rgb(255, 0, 0)">{{ session('user') }}</span>
    </div>  
  </div>

  <!-- Conteúdo da página -->

  <div class="content">
        <h2>Adicionar novo relatório</h2>
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="titulo">Título do relatório</label>
            <input style="width: 300px" name="titulo" type="text" class="form-control" id="titulorelatorio" placeholder="Digite o titulo do relatório">
          </div>

          <div class="form-group">
            <label for="cliente">Cliente </label>
            <input style="width: 300px" name="cliente" type="text" class="form-control" id="cliente" placeholder="Digite o nome do cliente a quem deseja fazer o relatorio">
          </div>

          <div class="form-group">
            <label for="texto">Relatório</label>
            <input name="texto" type="text" class="form-control" id="texto">  
          </div>
          
          <button type="submit" class="btn btn-dark">Cadastrar</button>
        </form>
      </div>
</div>
</body>
</html>