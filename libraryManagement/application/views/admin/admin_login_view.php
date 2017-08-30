
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Home|Library_Management</title>
    <?= link_tag('assets/css/bootstrap.min.css')?>
    <?= link_tag('assets/Custom css/carousel.css')?>
  </head>
  <body>
<div class="container">

      <?= form_open('admin/admin_login',['class'=>'form-signin']);?>
        <h2 class="form-signin-heading">Welcome Admin! Please Sign In</h2>

<?php if($failed=$this->session->flashdata('login_failed')): ?>
<div class="alert alert-danger" role="alert">
  <strong><?= $failed;?></strong>
</div>
<?php endif; ?>



        <label for="inputEmail" class="sr-only">Email address</label>
          <?php
          $input1=array('type'=>'email','placeholder'=>'Enter your email','name'=>'email','id'=>'inputEmail','class'=>'form-control','value'=>set_value('email'));
          echo form_input($input1);
          echo form_error('email');
          ?>
          <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <?php
          $input2=array('type'=>'password','placeholder'=>'Enter your password','name'=>'password','id'=>'inputPassword','class'=>'form-control');
          echo form_input($input2);
          echo form_error('password');
          ?>
          <hr>
        <?= form_submit('submit','Sign In',['class'=>'btn btn-lg btn-success btn-block']);?>
      <?=form_close();?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  </body>
</html>
