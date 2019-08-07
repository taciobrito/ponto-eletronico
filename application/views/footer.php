  <script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

  <?php foreach($js_files as $file): ?>
    <script src="<?= $file; ?>"></script>
  <?php endforeach; ?>
</body>
</html>
