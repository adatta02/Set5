<?php  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){ //check if form was submitted
    $input_to_check = $_POST;
    $errors = User::validate_input($input_to_check);

    if(empty($errors)){
      User::login_user_existence($input_to_check);
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
                            <li><a href="/">Home</a></li>

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
        		  <div class="col-lg-12 text-center v-center">
          			 <h1>
          				  Login
          			 </h1>
              </div>
            </div>
            <!-- /row -->


            <!--row-->
            <div class="row">
              <div class="col-md-4"></div><!--SPACING-->
                <div class="col-md-4 text-center">
          			   <div class="panel-body">

                    <!--Creating Div for message output-->
                    <div id ="message-output">

                      

                    </div>
                  <!--End of message output div-->
                  
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
                          <input class="form-control input-lg" title="text input box for password" placeholder="Password" type="password" name ="password"
                          <?php if ($_SERVER["REQUEST_METHOD"] == "POST"){echo 'value ="' . $input_to_check['password'] . '"'; }?>>

                          <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                              if(array_key_exists('password', $errors)){
                                echo'<span class="help-inline">3' . $errors['password'] . '</span>';
                              }
                            }
                          ?>

                        </div>
                          <input class="btn btn-lg btn-primary btn-success" type="submit" name ="submit" id="login" value="Login »">
                    </fieldset>
                  </form>
                
                </div> 
        		</div> 
            <div class="col-md-4"></div>
          </div>
      		<!-- /row -->
          </div>         
    </body>
</html>