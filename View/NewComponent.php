<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PoliTOceaDB</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css" href="css/Form.css"> <!-- TABLE -->
    <link rel="stylesheet"href="css/shop-item.css" > <!-- TEMPLATE -->
  </head>

  <body>
    <?php
      include '../Control/NewComponent_controller.php';
      // manage the page in the controller
      main_controller();
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
              <a class="nav-link" href="">Components</a>
            </li>
            <li class="nav-item"> <!-- move to the log in page -->
              <a class="nav-link" href="#">New Component</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item"> <!-- move to the Sign up page -->
              <a class="nav-link" href="LogOut.php">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
          <div class="col-sm-3"></div>
        <div class="col-sm-6"> <!-- SECOND ELEMENT, table and custom alerts -->
          <div class="card-container"> <!-- LOG IN FORM -->
          <div class="card">
            <article class="card-body">
            	<h4 class="card-title text-center mb-4 mt-1">Insert a new component</h4>
            	<hr>
              <!-- edit it with javascript -->
            	<p id="error-message" style="display: none;" class="text-danger text-center"></p>

              <?php // TODO: perform validation also client side via javascript simply calling a function in the onsubmit="" field ?>
            	<form method="POST" action='NewComponent.php' onsubmit="return true">
            	  <div class="form-group">
            	      <div class="input-group">
            		        <input id="inputNme" name="name" class="form-control form-in" placeholder="Name" type="text" required autofocus>
            	      </div> <!-- input-group.// -->
            	  </div> <!-- form-group// -->
                <div class="form-group">
            	      <div class="input-group">
            		        <input id="inputPackage" name="package" class="form-control form-in" placeholder="Package" type="text" required autofocus>
            	      </div> <!-- input-group.// -->
            	  </div> <!-- form-group// -->
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <input id="inputBox" type="number" name="box" class="form-control" placeholder="Box" required>
                    </div>
                    <div class="col">
                       <input id="inputCell" type="number" name="cell" class="form-control" placeholder="Cell" required>
                    </div>
                    <div class="col">
                       <input id="inputQuantity" type="number" name="quantity" class="form-control" placeholder="Quantity" required>
                    </div>
                  </div>
                </div><!-- form-group// -->
                <div class="form-group">
                  <textarea id="inputNote" name="note" class="form-control" rows="2" placeholder="Note"></textarea>
                </div>
                <div class="form-group">
                  <textarea id="inputLink" name="link" class="form-control" rows="2"   placeholder="Link"></textarea>
                </div>
            	   <div class="form-group">
            	      <button type="submit" class="btn btn-primary">New component</button>
            	   </div> <!-- form-group// -->
            	</form>
            </article>
            </div> <!-- card.// -->

            <?php
            checkParam(); // check if the are messages inside the url (GET)
             ?>
             <div id="alert_placeholder" class="col-sm-12"></div> <!-- dynamic alerts generated through javascript -->
             <noscript>
               <div class="alert alert-warning" role="alert">
                   <strong>Warning!</strong> Javascript disabled. Some componets may not work properly.
               </div>
             </noscript>

        </div> <!-- END LOG IN FORM -->
      </div> <!-- END SECOND ELEMENT -->
    </div> <!-- END THE ROW -->
    </div><!-- END THE PAGE CONTAINER -->


    <!-- javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Form.js"></script>
    <script type="text/javascript" src="js/CustomAlert.js"></script>
    <script>
    // automaticcaly close  bottom aletrs after 6 seconds
    window.setTimeout(function() {
      $(".alert").not(".alert-primary").not(".alert-secondary").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 6000);
    </script>

  </body>

</html>
