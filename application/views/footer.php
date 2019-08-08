  <script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

  <?php foreach($js_files as $file): ?>
    <script src="<?= $file; ?>"></script>
  <?php endforeach; ?>

  <script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/funcoes.js') ?>"></script>
  <script src="<?= base_url('assets/js/mensagens.js') ?>"></script>
  <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
