<?php	
	//Gets all the html files in the directory
	$directory = $_GET['dir']."/*.{html}";
	$files = glob($directory, GLOB_BRACE);	
	$directory = $_GET['dir']."/*.{jpg,JPG,Jpg,gif,GIF,Gif,png,PNG,Png}";
	$images = glob($directory, GLOB_BRACE);	
	include "MainFunctions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Season 1 Episode 10" />
	<meta name="keywords" content="HTML,CSS,XML,JavaScript" />
	<meta name="key" content="S08E10" />
	<meta name="EpisodeName" content="The Champagne Reflection" />
	<meta name="OriginalDate" content="November 20, 2014" />
	<meta name="EpisodeDescription" content="Leonard, Howard, and Raj look through the papers of a deceased professor and reflect on his lack of accomplishments. Sheldon retires Fun With Flags, and Bernadette finds out what her boss really thinks of her."/>
					

    <title>The Big Bang Theory</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="jquery.inputfile.css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Information Retrieval</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="ShowAllFiles.php?dir=DB">Documents</a>
                    </li>
                    <li>
                        <a href="AdminPanel.php?dir=DB">Admin</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> 
                    <small> </small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

           

            <div class="col-md-4">
			<ul>
			<?php
				foreach($files as $file) {
					$pos = strpos($file, 'DB/');
					$key = substr($file, (-$pos+3), 6);
					
					echo "<a href = '".$file."' target='iframe'> ".$key.".html</a><a href =DeleteFile.php?remove_file=".$key.".html> |  Delete </a></br>\n";
				}

			?>
			</ul>
            </div>
			 <div class="col-md-8">
                 <iframe name="iframe" id="iframe" width="950" height ="600">
				 </iframe>
            </div>
		
				<div class="col-md-8">
		<ul>
	<p>Upload New Document </p>
	<form action="UploadFile.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file" id="file" /> <input id ="button" type="submit" name="submit" value="Upload"  />
	</form>	

			
			<a href = "InitializeDataBase.php?dir=DB" id = "refresh">Refresh DataBase</a>
		</ul>
            </div>
        </div>
			

	
        <!-- /.row -->



        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Limor Golan</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
