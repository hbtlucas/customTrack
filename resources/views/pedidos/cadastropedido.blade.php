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
    <a href="faturas">Faturas</a>
    <a href="relatorios">Relatórios</a>
  </div>

  <!-- Conteúdo da página -->

  <div class="content">
        <h2>Cadastro de Pedido</h2>
        <form>
          <div class="form-group">
            <label for="email">Email do Cliente:</label>
            <input type="email" class="form-control" id="email" placeholder="Digite o email do cliente que está fazendo o pedido">
          </div>

          <div class="form-group">
            <label for="produto">Nome do produto:</label>
            <input type="text" class="form-control" id="produto" placeholder="Digite o nome do produto">
          </div>

          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" placeholder="Digite a quantidade">
          </div>
          
          <div class="form-group">
            <label for="formaPagamento">Forma de Pagamento:</label>
            <select class="form-control" id="formaPagamento">
              <option value="pix">Pix</option>
              <option value="cartaoCredito">Cartão de Crédito</option>
              <option value="cartaoDebito">Cartão de Débito</option>
              <option value="dinheiroFisico">Dinheiro Físico</option>
            </select>
          </div>

          <button type="submit" class="btn btn-dark">Cadastrar</button>
        </form>
      </div>
</div>
</body>
</html>