<?php require_once 'header.php';?>
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
                            <li><a href="/schedule">Create New Event</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/navbar-->
            <!--row-->
            
            <div class="row">
              <div class="col-lg-12 v-center">
                <h1 class="text-center"> My Events </h1>
              </div>
            </div>

            <div class="row">
                <div class ="col-md-6">
                    <h1 class="text-center">Past Events</h1>
            
                    <ol class="list-group">

                        <?php
                            foreach ($pastEvents as $event) {
                                echo'<li class ="item"> Event Name: ' . $event['event_name']. ' Event Date: ' . $event['event_date'] . '</li>';
                            }
                        ?>

                    </ol>
                    
                </div>

                <div class ="col-md-6">
                    <h1 class="text-center">Upcomming Events</h1>
                    
                    <ol class = "text-center centered-number">

                        <?php
                            foreach ($futureEvents as $event) {
                                echo'<li class ="item"> Event Name: ' . $event['event_name']. ' Event Date: ' . $event['event_date'] . '</li>';
                            }
                        ?>
                        
                    </ol>
                    
                </div>
            </div>
    </body>
</html>