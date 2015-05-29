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
                            <li><a href="../index.html">Home</a>
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
          				Login
          			</h1>
          			<br><br><br>
          			<div class="panel-body">
          				<form accept-charset="UTF-8" role="form" class="col-lg-12">
          					<fieldset>
                          <!--Place Login result here-->
                          <label class="panel-login">
                                <div class="login_result"></div>
                          </label>

            						<input class="form-control input-lg" title="text input box for email" placeholder="Email" type="text">
            						<br><br>
            						<input class="form-control input-lg" title="text input box for email" placeholder="Password" type="password">

            						<br><br>
              						<input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login»">
            				</fieldset>
          				</form>
          			</div>
        		</div>
        
      		</div> 
      		<!-- /row -->
         </div>           
    </body>
</html>