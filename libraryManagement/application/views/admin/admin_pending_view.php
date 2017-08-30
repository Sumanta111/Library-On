<?php 
require_once('admin_profile_header_view.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Home|Library_Management</title>
  </head>
  <body>
    <div class="container-fluid">
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




      <h2>List of all the books <?= anchor('admin_dashboard/new_book','Add New',['class'=>'btn btn-success','style'=>'float:right']);?></h2>
      <hr>
        <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th>No</th>
      <th>Name of the book</th>
      <th>Author</th>
      <th>Requested By</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $count=0;
    ?>
<?php foreach($result as $i) :?>
    <tr>
      <th scope="row"><?= ++$count;?></th>
      <td><?= $i->req_book;?></td>
      <td><?= $i->req_auther;?></td>
      <td><?= $i->req_fname;?>&nbsp;<?= $i->req_lname;?></td>
      <td><?= anchor("admin_dashboard/approve_req/{$i->req_id}",'Approve',['class'=>'btn btn-info']);?>&nbsp;&nbsp;<?= anchor("admin_dashboard/delete_req/{$i->req_id}",'Cancel',['class'=>'btn btn-danger']);?></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
    </div>
  </body>
</html>
