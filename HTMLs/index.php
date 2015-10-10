<?php
  /* Proyecto I Bases de Datos - Prof. Adriana Álvarez
   * match.me - Oracle
   * Alexis Arguedas, Gabriela Garro, Yanil Gómez
   * -------------------------------------------------
   * index.php - Created: 06/09/2015
   * Acts as the website's homepage, where the user can get to know more about the page, register and log in.
   */

  // Start the session so that it can be destroyed. Added in case a user leaves the website without first logging out.
  session_start();
  session_destroy();
?>

<!DOCTYPE html>
<html>

  <head>
    <link rel="shortcut icon" href= "imgs/logo (1).png">
    <title>Match Me</title>

    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="utils/bootstrap.css">
    <link rel="stylesheet" href="utils/bootstrap.min.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link rel="stylesheet" href="utils/bootstrap-theme.min.css">
    <script src="utils/jquery-1.11.1.min.js"></script>
    <script src="utils/bootstrap.min.js"></script>
    <link rel="stylesheet" type="css" href="utils/main.css"/>

  </head>

  <body>
    <!-- SIGN UP MODAL -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Sign up</h4>
            </div>
            <div class="modal-body">
               <form role="form" action="register.php" method="POST" class="registration-form">
                  <div class="form-group">
                     <span>
                     <?php //in case there's a register error redirected from register.php
                        if (isset($_SESSION['registererror'])) echo $_SESSION['registererror'] . "<br>";;
                     ?>
                  </span>
                     <label for="form-email">Email</label>
                     <input type="text" name="form-email" placeholder="example@example.com" class="form-email form-control" id="form-email"
                        >
                  </div>
                  <div class = "form-group">
                     <label for="exampleInputPassword1">Password</label>
                     <input type="password" name = "password1" class="form-control" id="exampleInputPassword1" placeholder="Password..."
                        >
                  </div>
                  <div class = "form-group">
                     <label for="exampleInputPassword1">Confirm password</label>
                      <input type="password" name = "password2" class="form-control" id="exampleInputPassword1" placeholder="Confirm password..."
                        >
                  </div>
                  <div class="modal-footer">
                     <div class = "container">
                        <div class ="row">
                           <div class = "col-md-2">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                           <div class = "col-md-2">
                              <input type = "submit" value = "Register">
                           </div>
                        </div>
                     </div>                   
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!--LOG IN MODAL-->
   <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Log in</h4>
            </div>
            <div class="modal-body">
               <form role="form" action="login.php" method="POST" class="registration-form">
                  <div class="form-group">
                  <span>
                     <?php //in case there's an error redirected from login.php
                        if (isset($_SESSION['loginerror'])) echo $_SESSION['loginerror']  . "<br>";
                     ?>
                  </span>
                    <label for="form-email">Email</label>
                    <input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
                  </div>
                  <div class = "form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name = "password1" class="form-control" id="exampleInputPassword1" placeholder="Password...">
                  </div>
               	<div class="modal-footer">
			          	<div class = "container">
                        <div class ="row">
                           <div class = "col-md-2">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                           <div class = "col-md-2">
                              <input name = "submit" type = "submit" value = "Log in">
                           </div>
                        </div>
                     </div>
   			      </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- about us modal-->
    <div class="modal fade" id="aboutUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">About us</h4>
            </div>
            <div class="modal-body">
            <div class="about-us">
              <p><b>Project: Match.me - a dating application</b></p>
              <p>Developers: Alexis Arguedas, Gabriela Garro, Yanil Navarro.</p>
              <p>Useful links:</p>
              <ul>
                <li><a href="https://github.com/gabygarro/MatchMe">GitHub</a></li>
                <li><a href="../Documentation/UserManual.pdf">User manual</a></li>
                <li><a href="../Documentation/Data Dictionary.xlsx">Data dictionary</a></li>
                <li><a href="../Documentation/Tasks division.xlsx">Tasks division</a></li>
                <li><a href="../Documentation/Use cases.xlsx">Use cases</a></li>
                <li><a href="../Documentation/Logic Model.jpg">Logic model</a></li>
                <li><a href="../Documentation/References.pdf">References</a></li>
              </ul>
              </div>
                <div class="modal-footer">
                    <div class = "container">
                        <div class ="row">
                           <div class = "col-md-3">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>                   
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Upper navigation bar -->
    <div class="nav">
      <div class="container">
        <ul class = "pull-left">
            <img src = "imgs/logopeq.png">
            <li><a href="index.php" >match.me</a></li>
            <li><a href="#" class="btn-link" data-toggle="modal" data-target="#aboutUs">about us</a></li>
        </ul>
        <ul class = "pull-right">
          <a href="#" class="btn-link" data-toggle="modal" data-target="#myModal">Sign Up</a>
          <a href="#" class="btn-link" data-toggle="modal" data-target="#myModal2">Log In</a>
          <li><a href="#">SOS</a></li>
        </ul>
      </div>
    </div>

    <!-- Publicity container -->
    <div class="jumbotron">
      <div class="container">
        <h1>Find your perfect match today.</h1>
        <p>Up to 3 million people use match.me to search for a partner</p>
        <a href="#">Learn More</a>
      </div>
    </div> 
  
    <!-- picture boxes container -->  
    <div class = "neighborhood-guides">
        <div class = "container">
            <h2>Sign up for match.me now!</h2>
            <p>It's very simple. Just fill out your profile and we'll set you on the way of finding your soul mate.</p>
            
            <div class = "row">
                <div class = "col-md-4">
                    <div class = "thumbnail">
                        <img src = "http://i.imgur.com/jbX7S6oh.png">
                    </div>
                </div>
                
                <div class = "col-md-4">
                    <div class = "thumbnail">
                        <img src = "http://i.imgur.com/jQLobUlh.png">
                    </div>
                </div>
                
                <div class = "col-md-4">
                    <div class = "thumbnail">
                        <img src = "http://i.imgur.com/EV1j8p9.png">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- learn more section -->
    <div class="learn-more">
        <div class="container">
    		<div class = "row">
                <div class = "col-md-4">
        			<h3>Wink</h3>
        			<p>Show your interest in a subtle way by just winking at somebody</p>
                    <p><a href = "#">Learn more about winks</a><p>
                </div>
        	      
        		<div class = "col-md-4">
        			<h3>Message</h3>
        			<p>Start a knowing someone you're interested in by messaging them</p>
        			<p><a href="#">Learn more about messaging</a></p>
        		</div>
        		  
        		<div class = "col-md-4">
        			<h3>Date</h3>
        			<p>Set up a date and meet the potential love of your life</p>
        			<p><a href="#">Learn more about dating</a></p>
        		</div>
	       </div>
	    </div>
	</div>

    <!--DISCLAIMER MODAL-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Legal Disclaimer</h4>
          </div>
          <div class="modal-body">
            <p>We are not responsible for psychopaths contacting you because of your profile</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- footer project description -->
    <div class = "footer">
        <a href = "#" class="btn-link" data-toggle="modal" data-target="#myModal3">Legal Disclaimer</a>
        <p>Bases de Datos 1, Proyecto 1 - Match.Me, Profesora: Adriana Alvarez</p>
        <p>Estudiantes: Alexis Arguedas, Gabriela Garro, Yanil Gomez</p>
        <p>2015, II Semestre</p>
    </div>
  </body>
</html>