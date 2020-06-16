<div class="container">
  <div class="row">
    <div class="clearfix">&nbsp;</div>
    <div class="container">
      <h3>Users</h3>
      <div class="clearfix">&nbsp;</div>
      <form class="" action="" method="post">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">User #</th>
              <th scope="col">Name</th>
              <th scope="col">E-mail</th>
              <th scope="col">Address</th>
              <th colspan="2">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($fetchdata as $row) {
            ?>
            <tr>
              <th scope="row"><?= $row->userid; ?></th>
              <td><?= $row->username; ?></td>
              <td><?= $row->email; ?></td>
              <td><?= $row->address; ?></td>
              <td>
                <?php if(session()->get('id') != $row->userid) { ?>
                  <a href="<?= site_url(); ?>delete-user/<?= $row->userid; ?>" id="del_user" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <?php } ?> &nbsp;
              </td>
              <td>
                <a href="<?= site_url(); ?>edit-user/<?= $row->userid; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
 
    $('#del_user').click(function(){
      alert('asd');
    });
  });
 </script>