<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Profile|Dashboard</title>
    <?= link_tag('assets/css/bootstrap.min.css')?>
  </head>
  <style>
    #ser{
      color:white;
    }
  </style>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="<?= base_url('user');?>"><b>Library-On</b></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user_dashboard');?>">Available Books<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user_dashboard/req_info');?>">Requested books</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user_dashboard/availed_books');?>">Availed books</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user_dashboard/fine_note');?>">Fine Notification</a>
      </li>
    </ul>
    <?= form_open('user_dashboard/search',['class'=>'form-inline my-2 my-lg-0']);?>
    <span id="ser"><?= form_error('search_item');?></span>&nbsp;&nbsp;
    <input class="form-control mr-sm-1" name="search_item" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-3" type="submit">Search</button>
    <?= form_close();?>
    <?= form_open('user/logout');?>
      <?= form_submit('submit','Logout',['class'=>'btn btn-outline-danger my-2 my-sm-0'])?>
    <?= form_close();?>
  </div>
</nav>








    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  </body>
</html>
