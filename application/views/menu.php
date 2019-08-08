<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url(); ?>">Ponto Eletrônico Web</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <?php foreach(LINKS_MENU as $item) : ?>
        <li class="nav-item <?= $item['controller'] == $this->uri->segment(SEGMENTS['controller']) ? 'active' : ''; ?>">
          <a class="nav-link" href="<?= base_url($item['controller']); ?>"><?= $item['label']; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
