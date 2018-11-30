<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PoliTOceanDB</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!-- BOOTSTRAP -->
    <link rel="stylesheet"href="css/shop-item.css" >  <!-- TEMPLATE -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  </head>

  <body>

    <?php
      include '../Control/Components_controller.php';
      // manage the page in the controller
      //main_controller();
    ?>

    <!-- Bootstrap navbar with responsive configuration -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">PoliTOceanDB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto"> <!-- links in the navbar -->
            <li class="nav-item active">
              <a class="nav-link" href="">
                Components
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item"> <!-- move to the log in page -->
              <a class="nav-link" href="NewComponent.php">New Component</a>
            </li>
            <li class="nav-item"> <!-- move to the Sign up page -->
              <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row"> <!-- place elements in a row -->

        <div class="col-sm-12">
          <div class="card-container">
            <div class="card-body">
          <?php
          renderTable(); // fill the page with the table
          //checkParam(); // check if the are messages inside the url (GET)
          //echo "...place the content here..."
           ?>
         </div>
         </div>
          <div id="alert_placeholder"></div> <!-- dynamic alerts generated through javascript -->
           <noscript> <!-- if javascript is disabled alert the user -->
             <div class="alert alert-warning" role="alert">
                 <strong>Warning!</strong> Javascript disabled. Some componets may not work properly.
             </div>
           </noscript>

        </div><!-- END SECOND ELEMENT -->
      </div> <!-- END THE ROW -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to log out?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary" onclick="window.location.href = '../Control/LogOut_controller.php';" >Yes</button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END THE PAGE CONTAINER -->

    <!-- javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
    // automaticcaly close bottom aletrs after 6 seconds
    window.setTimeout(function() {
      $(".alert").not(".alert-primary").not(".alert-secondary").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 6000);

    // manage the animation of the exit modal
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

    </script>
  </body>
</html>
