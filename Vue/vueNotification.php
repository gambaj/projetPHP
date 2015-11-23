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
	    	<h1><a>Contact ajoute</a></h1>

	    	<div class="centre">
		    	<div class="description">
					<h2>Contact ajoute</h2>
					<p>Ajout d'un nouveau contact dans son repertoire personnel.</p>
				</div>

		    	<div class="form_success">
			        <?php
						echo '<p>Le contact ' . $prenom . ' ' . $nom . ' a bien ete ajoute !</p>';
					?>
				</div>
			</div>
		</div>
		<img id="bottom" src="vue/image/bottom.png" alt="">
    </body>
</html>