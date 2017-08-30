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
            <div class="container">
              <br>
  <?= form_open('admin_dashboard/new_book_save');?>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Name Of the Book</label>
      <div class="col-sm-10">
        <?php
          $input1=array('type'=>'text','class'=>'form-control','name'=>'name_book','value'=>set_value('name_book'));
          echo form_input($input1);
          echo form_error('name_book');
        ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Author Name</label>
      <div class="col-sm-10">
        <?php
          $input2=array('type'=>'text','class'=>'form-control','name'=>'auther_book','value'=>set_value('auther_book'));
          echo form_input($input2);
          echo form_error('auther_book');
        ?>
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-legend col-sm-2">Availablity of the book</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="avs_book" id="gridRadios1" value="y" checked>
              Yes
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="avs_book" id="gridRadios2" value="n">
              No
            </label>
          </div>
        </div>
      </div>
    </fieldset>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">No. of books available</label>
      <div class="col-sm-10">
        <?php
          $input3=array('type'=>'text','class'=>'form-control','name'=>'av_book','value'=>set_value('av_book'));
          echo form_input($input3);
          echo form_error('av_book');
        ?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <?= form_submit('submit','Add Book',['class'=>'btn btn-primary']);?>
      </div>
    </div>
  <?= form_close();?>
</div> 
  </body>
</html>
