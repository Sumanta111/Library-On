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
<h2>List of Availes Books.Submit these before the Submission date.Otherwise you will be charged fine..</h2>
      <hr>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Book Name</th>
      <th>Author Name</th>
      <th>Issue Date</th>
      <th>Submission Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $count=0;
    ?>
  <?php foreach ($result as $i):?>
    <tr>
      <th scope="row"><?= ++$count;?></th>
      <td><?= $i->book_name;?></td>
      <td><?= $i->author_name;?></td>
      <td><?= $i->issue_date;?></td>
      <td><?= $i->sub_date;?></td>
    </tr>
<?php endforeach;?>
  </tbody>
</table>
</div>
</body>
</html>