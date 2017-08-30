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
  </head>
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
  <body>
    <br>
    <center><h2>User Login</h2></center>
<?php if($failed=$this->session->flashdata('login_failed')): ?>
<div class="alert alert-danger" role="alert">
  <strong><?= $failed;?></strong>
</div>
<?php endif; ?>



<?php if($feedback=$this->session->flashdata('feedback')): ?>
  <?php if($feedback_class=$this->session->flashdata('feedback_class')): ?>
  <br>
<div class="<?= $feedback_class ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <center><strong><?= $feedback;?></strong></center>
</div>
<?php endif; ?>
<?php endif; ?>
  <?= form_open('user/user_login');?>
  <div class="imgcontainer">
    <img src="<?= base_url('images/avtar.png');?>" alt="Avatar" class="avatar" style="height:200px;width:200px;">
  </div>

  <div class="container">
    <label><b>Email</b></label>
     <?php
    $input1=array('type'=>'text','placeholder'=>'Enter your first email','name'=>'email','value'=>set_value('email'));
    echo form_input($input1);
    echo form_error('email');
    ?>

    <label><b>Password</b></label>
     <?php
    $input2=array('type'=>'password','placeholder'=>'Enter your password','name'=>'password');
    echo form_input($input2);
    echo form_error('password');
    ?>       
    <button type="submit">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <?= anchor('user','Cancel',['class'=>'btn btn-danger']);?>
    <span class="psw">New User? <a href="<?= base_url('user/reg');?>">Register Here</a></span>
  </div>
<?= form_close();?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  </body>
</html>
