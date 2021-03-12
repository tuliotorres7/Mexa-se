<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mexa-se</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Instrutor
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('user.index')}}">Cadastro</a></li>
            <li><a class="dropdown-item" href="{{'relatorio'}}">Relatório</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('cliente.index')}}">Cadastro</a></li>
          </ul>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link" href="{{'relatorioPresenca'}}">Relatorio de Presença</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{'dashboard'}}">Gerar QR</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{'logout'}}">Sair</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>