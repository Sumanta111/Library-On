<?php require_once('user_profile_header_view.php');?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<div class="container">
	<br>
<?php if($feedback=$this->session->flashdata('feedback')): ?>
  <?php if($feedback_class=$this->session->flashdata('feedback_class')): ?>
  <br>
<div class="<?= $feedback_class ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <center><strong><?= $feedback;?></strong></center>
</div>
<?php endif; ?>
<?php endif; ?>
<h2>List of all Requested book. Wait until it has approved by the librarian..</h2>
      <hr>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Book Name</th>
      <th>Author Name</th>
      <th>Choices</th>
    </tr>
  </thead>
  <tbody>
    <?= form_open('user_dashboard/update_info');?>
    <?php
      $count=0;
    ?>
    <?php foreach($info as $i): ?>
    <tr>
      <th scope="row"><?= ++$count;?></th>
      <td><?= $i->req_book;?></td>
      <td><?= $i->req_auther;?></td>
      <td><?= anchor("user_dashboard/delete_req/{$i->req_book_id}",'Delete',['class'=>'btn btn-danger']);?></td>
    </tr>
  <?php endforeach;?>
  <?= form_close();?>
  </tbody>
</table>
</div>
</body>
</html>