<?php 
require_once'bootstrap.php';
require_once 'header.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST"){ //check if form was submitted
    $input_to_check = $_POST;
    $errors = validate_event($input_to_check);

    if(empty($errors)){
        post_event($input_to_check);
        $message = "You have successfully been added!";
        echo'<h1>' . $message . '</h1>';
    }
    else{
      $message = "Error adding information to database!";
      echo'<h1>' . $message . '</h1>';
    }
}                      
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

                            <li><a href="user_events.php">My Events</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/navbar-->
            <!--row-->
            <div class="row">
        		<div class="col-lg-12 text-center v-center">
          			<h1>
          				Schedule Event
          			</h1>
          			<br><br><br>

          			<div class="panel-body">
                     <!--Creating Div for message output-->
                  <div id ="message-output">
                    <?php
                      if ($_SERVER["REQUEST_METHOD"] == "POST"){ //check if form was submitted
                        $input_to_check = $_POST;
                        $errors = validate_event($input_to_check);

                        if(empty($errors)){
                          post_event($input_to_check);
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
          				<form accept-charset="UTF-8" role="form" class="col-lg-12">
          					<fieldset>
                      <div class = "form-group">
            						<input class="form-control input-lg" title="text input box for event name" placeholder="Event Name" type="text" name ="event_name">
            					</div>
                      <div class ="form-group">
            						<input class="form-control input-lg" title="text input box for date" placeholder="Event Date YYYY-MM-DD" type="text" name ="date">
                      </div>
              						<input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Create New Event»">
            				</fieldset>
          				</form>
          			</div>
        		</div>
        
      		</div> 
      		<!-- /row -->
         </div>           
    </body>
</html>