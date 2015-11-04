<?php 
	include "MainFunctions.php";
	//Gets all the html files in the directory
	$directory = $_GET['dir']."/*.{html}";
	$files = glob($directory, GLOB_BRACE);

	$db = initDB();
	
	$string = $_REQUEST['search'];
	$results = searchDB($db, $string);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <title>Narcos - Documents</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #181818;">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: red;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html" style="color: black;">Home</a>
                    </li>
                    <li>
                        <a href="ShowAllFiles.php?dir=DB" style="color: black;">Documents</a>
                    </li>
                    <li>
                        <a href="AdminPanel.php?dir=DB" style="color: black;">Admin</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" style="width: 775px; ">

        <div class="row" style="margin-top: 51px;">
            <div class="col-md-9">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/narcosCarusel1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/narcosCarusel2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/narcosCarusel3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">


		<?php
		if ($results["found"] == 'no'){
		echo '<div class="col-sm-4 col-lg-4 col-md-4" style="color: white;padding-top: 26px;font-size: 25px;">';
			echo '<p>String was not found in any episode</p>';
			echo '</div>';
		}
		else{
			$words = "";
			foreach (array_keys($results["words"]) as $word) {
				$words = $words.$word.',';
			}
					
			foreach (array_keys($results["documents"]) as $doc) {	
				$meta = get_meta_tags('DB/'.$doc.'.html');
				if($meta){
				$disc =  substr (  $meta['episodedescription'] , 0 , 30  );
							echo '<div class="col-sm-4 col-lg-4 col-md-4">';
								echo '<div class="thumbnail">';
									echo '<img src="images/narcosGeneral.jpg" alt="">';
										echo '<div class="caption">';
											echo  '<h4><a href = "DB/DB.php?html='.$meta['key'].'&word='.$words.'" target="_blank">'.$meta['key'].'	'.$meta['episodename'].'</a></h4>';
										echo '<p><strong>Synopsis:</strong> '.$disc.'...</p>';
									echo '<p><strong>Air Date:</strong> '.$meta['originaldate'].'</p>';
								echo '</div>';
								echo '</div>';
							echo '</div>';
				}
				#else echo '<p><strong>No Results was found</strong></p>';
			}		
		}
	?>
	




                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
