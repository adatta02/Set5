
<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){ //check if form was submitted
    $input_to_check = $_POST;
    $errors = User::validate_user($input_to_check);

    if(empty($errors)){
      if(User::user_existence($input_to_check) == false){
          User::post_user($input_to_check);
          $message = "You have successfully been added!";
          echo'<h1>' . $message . '</h1>';
      }
      else{
        echo'Username in use';
      }
    }
      else{
        $message = "Error adding information to database!";
        echo'<h1>' . $message . '</h1>';
        }
  }  
  include('header.php');  
?>      
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
                            <li><a href="/login">Login</a></li>

                            <?php
                              if(isset($_SESSION['current_user'])){
                                echo '<li><a href="/user_events">My Events</a></li>';
                                echo'<li> <a href="/logout">Log out</a></li>';
                              }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <!--/navbar-->
            <!--row-->
            <div class="row">
        		  <div class="col-md-12 text-center v-center">
            
          			<h2>
          				Welcome to FIGURE OUT NAME.
          			</h2>
          	 </div>
            </div>


            <div class ="row">
                <div class ="col-md-4"></div> <!--SPACING-->


                <div class ="col-md-4 text-center center-form">
                  <h4>Create an account if you are a new user.</h4>
          			<div class="panel-body"> 
          				<form accept-charset="UTF-8" action="" method ="post" role="form" class="form-horizontal">
          					<fieldset>
                        <div class ="form-group">
                          <input class="form-control input-lg" title="text input box for username" placeholder="Username" type="text" name ="user" 
                          <?php if($_SERVER["REQUEST_METHOD"] == "POST"){ echo 'value="' . $input_to_check['user'] . '"';} ?>>

                          <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            if(array_key_exists('user', $errors)){
                              echo'<span class="help-inline">' . $errors['user'] . '</span>';
                            }
                          }
                          ?>

                        </div>
                        <div class ="form-group">
            						  <input class="form-control input-lg" title="text input box for email" placeholder="Email" type="text" name = "email"
                          <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo 'value ="' . $input_to_check['email'] . '"'; }?>>

                          <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                              if(array_key_exists('email', $errors)){
                                echo'<span class="help-inline">' . $errors['email'] . '</span>';
                              }
                            }
                          ?>

            						</div>

                        <div class ="form-group">
            						  <input class="form-control input-lg" title="text input box for password" placeholder="Password" type="password" name ="password"
                          <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo 'value ="' . $input_to_check['password'] . '"'; }?>>

                          <?php
                             if($_SERVER["REQUEST_METHOD"] == "POST"){
                             if(array_key_exists('password', $errors)){
                              echo'<span class="help-inline">' . $errors['password'] . '</span>';
                            }
                          }
                          ?>

                        </div>
              						<input class="btn btn-default btn-lg btn-success" type="submit" name ="submit" id="login" value="Create Account »">
            				</fieldset>
          				</form>
                
          			</div>
              </div>

              <div class ="col-md-4"></div> <!--SPACING-->

              </div>
      		<!-- /row -->
         </div>           
    </body>
</html>

     
