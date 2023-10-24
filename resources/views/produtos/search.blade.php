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
        <a href="{{route('clientes')}}">Clientes</a>
        <a href="{{route('pedidos')}}">Pedidos</a>
        <a href="{{route('produtos')}}" class="active">Produtos</a>
        <a href="{{route('relatorios')}}">Relatórios</a>
  </div>

  <!-- Conteúdo da página -->
  <div class="content">

    <div style="padding: 20px;" class="row">
      <form style="margin: 10px;" method="" action="{{route('index')}}">
        <button class="btn btn-dark" type="submit">Home</button>
      </form>

      <form style="margin: 10px;" method="" action="{{route('produtos.cadastroproduto')}}">
        <button class="btn btn-dark" type="submit">Adicionar Produto</button>
      </form>

      <form style="margin: 10px" action="{{route('produtos.search')}}">
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
                  <th>Nome do produto</th>
                  <th>Valor unitário</th>
                  <th>Categoria</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produtos as $produto)
                <tr>
                  <td>{{ $produto->id_produto }}</td>
                  <td>{{ $produto->nome_produto }}</td>
                  <td>{{ $produto->valor_produto }} </td>
                  <td>{{ $produto->categoria }}</td>
                <td>
                  <div class="row">
                      <div style="margin-left: 10px">
                        <form action="{{ route('produtos.delete', ['id_produto'=>$produto->id_produto]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                      </div>

                      <div style="margin-left: 10px">
                        <form action="{{ route('produtos.edit', ['id_produto' => $produto->id_produto]) }}">
                          @csrf
                          <button type="submit" class="btn btn-info">Editar</button>
                        </form>
                      </div>
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