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

 <h2>List of all available the books</h2>
      <hr>
        <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th>No</th>
      <th>Name of the book</th>
      <th>Author</th>
      <th>Want it ? Grab it now!</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $count=$this->uri->segment(3,0);
      ?>
    <?php foreach($books as $i) :?>
    <tr>
      <th scope="row"><?= ++$count?></th>
      <td><?= $i->name_book;?></td>
      <td><?= $i->auther_book;?></td>
      <td><?= anchor("user_dashboard/req_book/{$i->book_id}",'Request Librarian',['class'=>'btn btn-light']);?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
</body>
</html>