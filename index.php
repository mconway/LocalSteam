<?php
	require_once 'config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo ucfirst($_SERVER['SERVER_NAME']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
	  .input-append span { font-size: 14px; margin-left: 0;}
	  #addrow { float: right; }
	  /* a.brand { background: url("img/logo36.png") no-repeat scroll 5px 7px transparent; padding: 15px 20px 12px 50px !important; } */
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><?php echo ucfirst($_SERVER['SERVER_NAME']); ?></a>
		  <div class="nav-collapse collapse">
            <p class="navbar-text pull-right"><span class="date"></span></p>
            <ul class="nav">
                
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
	  <h3><? echo $serverAppsPath ?></h3>
      <table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<td>App Name</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$files = glob($serverAppsPath . "/*", GLOB_ONLYDIR);
				foreach($files as $file){
					echo "<tr><td>" . substr($file, strrpos($file,"/")+1) ."</td><td><a href='steamdist.php?app=$file' target='_blank'>Download</a></td></tr>";
				}
			?>
		</tbody>
	  </table>
    </div> <!-- /container -->
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var date = new Date();
			$(".date").text(date.toDateString());
		});
	</script>
  </body>
</html>
