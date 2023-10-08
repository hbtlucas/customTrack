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
    <a href="{{ route('clientes') }}" class="active">Clientes</a>
    <a href="{{ route('pedidos') }}">Pedidos</a>
    <a href="produtos">Produtos</a>
    <a href="faturas">Faturas</a>
    <a href="relatorios">Relatórios</a>
  </div>

  <!-- Conteúdo da página -->
  <div class="content">

    <div style="padding: 20px;" class="row">
      <form style="margin: 10px;" method="" action="{{ route('index') }}">
        <button class="btn btn-dark" type="submit">Home</button>
      </form>

      <form style="margin: 10px;" method="" action="clientes/cadastrocliente">
        <button class="btn btn-dark" type="submit">Cadastrar Cliente</button>
      </form>
  </div>

    <div class="row">
        <div style="margin-left: 30px; border: solid rgb(43, 43, 43) 1px;">
            <table style="width: 1200px; height: auto;" class="table table-striped">
              <thead> 
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  <th>CPF</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Cliente 1</td>
                  <td>(66) 9999-3993</td>
                  <td>example@gmail.com</td>
                  <td>9999.9989-044-61</td>
                  <td>
                    <form action="">
                      <button type="submit" class="btn btn-danger">Deletar</button>
                      <button type="submit" class="btn btn-info">Editar</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Cliente 1</td>
                  <td>(66) 9999-3993</td>
                  <td>example@gmail.com</td>
                  <td>9999.9989-044-61</td>
                  <td>
                    <form action="">
                      <button type="submit" class="btn btn-danger">Deletar</button>
                      <button type="submit" class="btn btn-info">Editar</button>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Cliente 1</td>
                  <td>(66) 9999-3993</td>
                  <td>example@gmail.com</td>
                  <td>9999.9989-044-61</td>
                  <td>
                    <form action="">
                      <button type="submit" class="btn btn-danger">Deletar</button>
                      <button type="submit" class="btn btn-info">Editar</button>
                    </form>
                  </td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>