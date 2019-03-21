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
      include '../Control/LogIn_controller.php';
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
            <li class="nav-item active"> <!-- empty link -->
              <a class="nav-link" href="LogIn.php">
                Log In
                <span class="sr-only">(current)</span>
              </a>
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
            	<h4 class="card-title text-center mb-4 mt-1">Welcome back</h4>
            	<hr>
              <!-- edit it with javascript -->
            	<p id="error-message" style="display: none;" class="text-danger text-center"></p>

            	<form method="POST" action='LogIn.php' onsubmit="return validateForm()">
            	   <div class="form-group">
            	      <div class="input-group">
            		        <input id="inputEmail" name="email" class="form-control form-in" placeholder="Email" type="email" required autofocus>
            	      </div> <!-- input-group.// -->
            	  </div> <!-- form-group// -->
            	   <div class="form-group">
            	      <div class="input-group">
            	         <input type="password"  id="inputPassword" class="form-control form-in" placeholder="Password" name="password" required>
            	        </div> <!-- input-group.// -->
            	   </div> <!-- form-group// -->
            	   <div class="form-group">
            	      <button id="log" type="submit"class="btn btn-primary">Login</button>
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

    <!-- Modal 2 -->
    <div class="modal fade" id="simpleQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">A simple question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <b>Who is best?</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Computer Engineer</button>
            <button type="button" class="btn btn-primary" id="wrondDecision" data-dismiss="modal">Electrical Engineer</button>
          </div>
        </div>
      </div>
    </div>
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

    <script>
    $(window).on('load',function(){
      $('#simpleQuestion').modal('show');
    });

    $( "#wrondDecision" ).click(function() {
      //alert( "Handler for .click() called." );
      $("#log").prop("disabled",true);
    });
    </script>
  </body>


</html>
