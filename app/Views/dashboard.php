<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Hi, <?= session()->get('username') ?></h1>
    </div>
  </div>
  <?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
      <?= session()->get('success') ?>
    </div>
  <?php endif; ?>
</div>
