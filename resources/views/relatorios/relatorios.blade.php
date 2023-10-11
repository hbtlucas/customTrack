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
    <a href="clientes.html">Clientes</a>
    <a href="pedidos.html">Pedidos</a>
    <a href="produtos.html">Produtos</a>
    <a href="faturas.html">Faturas</a>
    <a href="relatorios.html" class="active">Relatórios</a>
  </div>

  <!-- Conteúdo da página -->
  <div class="content">

    <div class="row">
        <form style="margin: 10px" method="" action="index.html">
          <button style="background-color: #808080;" class="btn" type="submit">Home</button>
        </form>
  
        <form style="margin: 10px;" method="" action="novorelatorio.html">
          <button style="background-color: #808080" class="btn" type="submit">Adicionar Relatório</button>
        </form>
    </div>
  

        <div class="row">
          <div class="col s12 m6">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Titulo do relatorio</span>
                <span class="card-subtitle">Cliente 1</span>
                <p>Este é um exemplo de conteúdo dentro do card. Você pode adicionar texto, imagens, botões e outros elementos aqui.</p>
              </div>
              <div class="card-action">
                <a href="#">Editar</a>
                <a href="#">Deletar</a>
              </div>
            </div>
          </div>
        </div>
      

      <div class="row">
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Titulo do relatorio</span>
              <span class="card-subtitle">Cliente 1</span>
              <p>Este é um exemplo de conteúdo dentro do card. Você pode adicionar texto, imagens, botões e outros elementos aqui.</p>
            </div>
            <div class="card-action">
              <a href="#">Editar</a>
              <a href="#">Deletar</a>
            </div>
          </div>
        </div>
      </div>
    
    
      <div class="row">
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Titulo do relatorio</span>
              <span class="card-subtitle">Cliente 1</span>
              <p>Este é um exemplo de conteúdo dentro do card. Você pode adicionar texto, imagens, botões e outros elementos aqui.</p>
            </div>
            <div class="card-action">
              <a href="#">Editar</a>
              <a href="#">Deletar</a>
            </div>
          </div>
        </div>
      </div>
    
    
    </div>
</body>
</html>