
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

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?= base_url('user');?>"><b>Library-On</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('user');?>">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <?= anchor('/user/login','Login/Register',['class'=>'nav-link']);?>
          </li>
        </ul>
      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="<?= base_url('images/1.jpg');?>">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>Welcome to the Library-On.</h1>
              <p>Online Platform to get new books.And it helps and manages the Library more efficiently.</p>
              <p><a class="btn btn-lg btn-primary" href="<?= base_url('user/reg');?>" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="<?= base_url('images/9.jpg');?>">
          <div class="container">
            <div class="carousel-caption d-none d-md-block">
              <h1>Online Admin Portal</h1>
              <p>Online Platform to get new books.And it helps and manages the Library more efficiently.</p>
              <p><a class="btn btn-lg btn-primary" href="<?= base_url('user/reg');?>" role="button">Signup Today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="<?= base_url('images/3.jpg');?>">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-right">
              <h1>Online Library Management.</h1>
              <p>Online Platform to get new books.And it helps and manages the Library more efficiently.</p>
              <p><a class="btn btn-lg btn-primary" href="<?= base_url('user/reg');?>" role="button">Signup today</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="rounded-circle" src="<?= base_url('images/avtar.png');?>" alt="Generic placeholder image" width="140" height="140">
          <h2>Admin Portal</h2>
          <p>Admin Portal that manages the whole thing.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="rounded-circle" src="<?= base_url('images/5.jpg');?>" alt="Generic placeholder image" width="140" height="140">
          <h2>User Portal</h2>
          <p>User can request for any books.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="rounded-circle" src="<?= base_url('images/6.jpg');?>" alt="Generic placeholder image" width="140" height="140">
          <h2>Fine Management</h2>
          <p>If you are forgot to return the book,Fine will automatically charged.</p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Admin Portal with bunch of fecilities. <span class="text-muted">You can Manage everything.</span></h2>
          <p class="lead">The newly designed admin portal,that is for mainly manages the books and the user.Admin can go to /admin and can login and manages the whole thing.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" src="<?= base_url('images/5.jpg');?>" alt="Generic placeholder image" style="width:500px;height:500px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">User can view his status <span class="text-muted">User friendly</span></h2>
          <p class="lead">user can request for a new book and the book will issue only if the Admin wants.Default is 10 days,you can keep that book.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="featurette-image img-fluid mx-auto" src="<?= base_url('images/6.jpg');?>" alt="Generic placeholder image" style="width:500px;height:500px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Fine Management. <span class="text-muted">automatic fine management system.</span></h2>
          <p class="lead">After 10 days you will automatically charged rs 100.and you can see in the fine section if you have any pending fines.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" src="<?= base_url('images/7.png');?>" alt="Generic placeholder image" style="width:500px;height:500px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    	<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
  </body>
</html>
