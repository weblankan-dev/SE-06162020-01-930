<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Register</h3>
        <hr>
        <form class="" action="" method="post">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="username">User Name</label>
               <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="contactnumber">Contact Number</label>
               <input type="text" class="form-control" name="contactnumber" id="contactnumber" value="<?= set_value('contactnumber') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="address">Address</label>
               <textarea class="form-control" name="address" id="address"><?= set_value('address') ?></textarea>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Confirm Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="col-12 col-sm-8 text-right">
              <a href="<?= site_url(); ?>">Already have an account</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
