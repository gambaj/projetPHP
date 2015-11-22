<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon projet</title>
        <link rel="stylesheet" type="text/css" href="vue/css/style.css" media="all">
        <script type="text/javascript" src="vue/js/script.js"></script>
    </head>

    <body id="main_body">
    	<img id="top" src="vue/image/top.png" alt="">
    	<div id="container">
    		<h1><a>Erreur</a></h1>

    		<div class="centre">
	    		<div class="description">
					<h2>Erreur</h2>
					<p><?php echo $message; ?></p>
				</div>

		    </div>
		    <div id="footer"><p>Systeme de pagination</p></div>
		</div>
		<img id="bottom" src="vue/image/bottom.png" alt="">
    </body>
</html>