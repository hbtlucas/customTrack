<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
   

body{
  height:100vh;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items: center;
    background: #F5F5F5;
}

.card{
  overflow:hidden;
  border-radius:10px;
  min-height:500px;

}

.img-left{
  width:45%;
  background: url({{asset('imagens/landscape.jpg')}}) center;
  background-size: cover;
}

.card-body{
  padding:2rem;
}

input[type = 'text']{
  border-radius:100px;
  border:none;
  background: #E3F2FD;
}
input[type="submit"] {
    border-radius: 100px;
    background-color: red; 
    color: white; 
    padding: 10px 20px; 
    border: none; 
    cursor: pointer; 
}

input[type="submit"]:hover {
    background-color: darkred; 
}
  </style>
</head>
<body>

  <div class="container">

    <div class='col-md-9 card mx-auto d-flex flex-row px-0'>
      
    <div class="img-left d-md-flex d-none"></div>
    
      <div class="card-body d-flex flex-column justify-content-center">
        <br>
        <h2 class="title text-center mt-4 pb-3">Custom<span style="color: red">Track</span></h2>
        <h4 class="title text-center mt-4 pb-3">Inicie sua sessão</h4>

    <form class='col-sm-10 col-12 mx-auto' method="POST" action="{{route('iniciarsessao')}}">
      @csrf
          <div class='form-group '>
            <input type="text" name="user" id="user" class="form-control " placeholder='Qual seu nome?'>
          </div>
           <div class='form-group py-3 '>
            <input type="submit" class="btn  btn-outline-primary d-block w-100 " value="Iniciar">
          </div>

   </form>
        </div>

    </div>
    
    
  </div>

</body>
</html>