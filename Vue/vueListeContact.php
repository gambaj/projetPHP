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
    		<h1><a>Liste de contact</a></h1>

    		<div class="centre">
	    		<div class="description">
					<h2>Répertoire</h2>
					<p>Liste de contact.</p>
				</div>

	    		<ul>
	    		<?php
						
	    			foreach ($contacts as $contact) {
	    				echo '<li><a href="index.php?action=modification&id=' . $contact->getId() . '"> ' . $contact->getPrenom() . ' ' .  $contact->getNom() . '</a></li>';  
	    			}
	    		?>
	    		</ul>

		    </div>
		    <div id="footer"><p>Systeme de pagination</p></div>
		</div>
		<img id="bottom" src="vue/image/bottom.png" alt="">
    </body>
</html>