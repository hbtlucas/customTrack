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
    <a href="{{ route('clientes') }}">Clientes</a>
    <a href="{{ route('pedidos') }}">Pedidos</a>
    <a href="/produtos">Produtos</a>
    <a href="/faturas">Faturas</a>
    <a href="/relatorios">Relatórios</a>
  </div>

  <!-- Conteúdo da página -->
  <div class="content">
    <div class="row">
        <div style="margin-left: 30px;">
            <div style="padding: 20px; border: solid 1px rgb(85, 85, 85) ;" class="card">
              <div class="card-image">
                <img style="width: 600px; height: auto;" src="imagens/5012404.jpg" alt="Imagem de fundo">
              </div>
              <div class="card-content">
                <p>Essa aplicação tem como objetivo servir como um Gerenciador de Controle e Produção. <br>
                Ela foi pensada para empresas que produzem soluções de softwares personalizados,<br> mas 
                pode ser adaptada para qualquer empresa que necessite de um sistema <br> de gerenciamento.</p>
              </div>
              <div class="card-action">
                <a href="#">Vamos lá!</a>
              </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>