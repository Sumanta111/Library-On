<!DOCTYPE html>
<html>
<?= link_tag('assets/css/bootstrap.min.css')?>
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

#button1 {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

#button1:hover {
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
    <center><h2>New User Registration</h2></center>
    <?= form_open('/user/user_reg');?>
  <div class="container">
    <label><b>First Name</b></label>
    <?php
    $input1=array('type'=>'text','placeholder'=>'Enter your first name','name'=>'fname','value'=>set_value('fname'));
    echo form_input($input1);
    echo form_error('fname');
    ?>
    <label><b>Last Name</b></label>
    <?php
    $input2=array('type'=>'text','placeholder'=>'Enter your last name','name'=>'lname','value'=>set_value('lname'));
    echo form_input($input2);
    echo form_error('lname');
    ?>
    <label><b>Email</b></label>
    <?php
    $input3=array('type'=>'text','placeholder'=>'Enter your Email','name'=>'email','value'=>set_value('email'));
    echo form_input($input3);
    echo form_error('email');
    ?>

    <label><b>Password</b></label>
    <?php
    $input4=array('type'=>'password','placeholder'=>'Enter password','name'=>'password');
    echo form_input($input4);
    echo form_error('password');
    ?>
    <?= form_submit('submit',"Login",['id'=>'button1']);?>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <?= anchor('user','Cancel',['class'=>'btn btn-danger']);?>
    <span class="psw">Already Registered? <a href="<?= base_url('user/login');?>">Login Here</a></span>
  </div>
<?= form_close();?>

</body>
</html>
