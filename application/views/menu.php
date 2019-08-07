<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Ponto Eletrônico Web</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>">Início <span class="sr-only">(página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('registros'); ?>">Registros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('ocorrencias'); ?>">Ocorrências</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('empresas'); ?>">Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('cargos'); ?>">Cargos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('contratos'); ?>">Contratos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('funcionarios'); ?>">Funcionários</a>
      </li>
    </ul>
  </div>
</nav>