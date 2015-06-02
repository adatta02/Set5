<?php require_once 'header.php'; ?>

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
          				<form accept-charset="UTF-8" role="form" class="col-lg-12">
          					<fieldset>
            						<input class="form-control input-lg" title="text input box for event name" placeholder="Event Name" type="text">
            						<br><br>
            						<input class="form-control input-lg" title="text input box for date" placeholder="Event Date (m/d/y)" type="text">

            						<br><br>
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