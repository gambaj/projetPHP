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
					<p>Liste de contact (<?php echo $nombreContact . ' contacts)'?>.</p>
				</div>

	    		<ul>
	    		<?php
						
	    			foreach ($contacts as $contact) {
	    				echo '<li><a href="index.php?action=modification&id=' . $contact->getId() . '"> ' . $contact->getPrenom() . ' ' .  $contact->getNom() . '</a></li>';  
	    			}
	    		?>
	    		</ul>

		    </div>
		    <div id="footer">
		    	<p>
		    		<?php 
		    			for ($i=1; $i<=$nombrePage; $i++) {
		    				if ($i == $pageCourante) {
		    					echo $i . ' ';
		    				} else {
		    					echo '<a href="index.php?action=liste&page=' . $i . '">' . $i . ' </a>';
		    				}
	    				}
		    		?>
		    	</p>
		    </div>
		</div>
		<img id="bottom" src="vue/image/bottom.png" alt="">
    </body>
</html>