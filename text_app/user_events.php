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
                            <li><a href="/schedule.php">Create New Event</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/navbar-->
            <!--row-->
            <div class="row">
              <div class="col-lg-12 text-center v-center">

                <h1> My Events </h1>

                <div class ="col-md-6">
                    <h1>Past Events</h1>
                    <div class ="past-events">  
                        
                    </div>
                </div>

                <div class ="col-md-6">
                    <h1>Upcomming Events</h1>
                    <div class ="future-events">  
                        
                    </div>
                </div>
      		    </div>
            </div> 
      		<!-- /row -->
         </div>           
    </body>
</html>