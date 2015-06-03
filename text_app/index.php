
<?php require_once ('create_user.php'); ?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--mobile friendly: -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--css style sheets-->
    <link href = "css/bootstrap.min.css" rel = "stylesheet">
    <link href = "css/index.css" rel = "stylesheet">

    <!--javascript and jquery-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <script src="js/bootstrap.js"></script>

    <title>Texter</title>
    
</head>
        
<body>
		<div class ="container-full">
            <!--navbar-->
            <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-menubuilder">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="/login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/navbar-->
            <!--row-->
            <div class="row">
        		<div class="col-lg-6 text-center v-center">
            
          			<h1>
          				Welcome to FIGURE OUT NAME, the simplest way to host kickass parties
          				with a broken doorbell.
          			</h1>
          			<br><br><br>
          			<div class="panel-body">

                  <!--Creating Div for message output-->
                  <div id ="message-output">

                    <?php  
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){ //check if form was submitted
                      $input_to_check = $_POST;
                      $errors = validate_data($input_to_check);

                      if(empty($errors)){
                        post_data($input_to_check);
                        $message = "You have successfully been added!";
                         echo'<h1>' . $message . '</h1>';
                      }
                      else{
                        $message = "Error adding information to database!";
                        echo'<h1>' . $message . '</h1>';
                      }
                    }    
                    ?>

                  </div>
                  <!--End of message output div-->
                  
          				<form accept-charset="UTF-8" action="" method ="post" role="form" class="form-horizontal">
          					<fieldset>
                        <div class ="form-group">
                          <input class="form-control input-lg" title="text input box for username" placeholder="Username" type="text" name ="user" 
                          <?php if($_SERVER["REQUEST_METHOD"] == "POST"){ echo 'value="' . $input_to_check['user'] . '"';} ?>>

                          <?php
                            echo'<span class="help-inline">' . $errors['user'] . '</span>';
                          ?>

                        </div>
                        <div class ="form-group">
            						  <input class="form-control input-lg" title="text input box for email" placeholder="Email" type="text" name = "email"
                          <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo 'value ="' . $input_to_check['email'] . '"'; }?>>

                          <?php
                            echo'<span class="help-inline">' . $errors['email'] . '</span>';
                          ?>

            						</div>

                        <div class ="form-group">
            						  <input class="form-control input-lg" title="text input box for password" placeholder="Password" type="password" name ="password"
                          <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo 'value ="' . $input_to_check['password'] . '"'; }?>>

                          <?php
                            echo'<span class="help-inline">' . $errors['password'] . '</span>';
                          ?>

                        </div>
              						<input class="btn btn-lg btn-success" type="submit" name ="submit" id="login" value="Create Account »">
            				</fieldset>
          				</form>
                
          			</div>
              
        		</div>
        
      		</div> 
      		<!-- /row -->
         </div>           
    </body>
</html>

     
