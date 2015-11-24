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
	    	<h1><a>Authentification</a></h1>

	    	<form id="form_1074181" class="appnitro"  method="post" action="index.php?action=validationAuthentification">
		    	<div class="description">
					<h2>Authentification</h2>
					<p>Connexion au projet a l'aide de votre pseudo et mot de passe.</p>
					<p><a href="index.php?action=creationUtilisateur">Creer un compte</a><br />
				</div>

				<ul>
					<li id="li_1" >
						<label class="description" for="pseudo">Pseudo </label>
						<div>
							<input id="pseudo" name="pseudo" class="element text medium" type="text" maxlength="255" value="" required/> 
						</div> 
					</li>		
					<li id="li_2" >
						<label class="description" for="password">Mot de passe </label>
						<div>
							<input id="password" name="password" class="element text medium" type="password" maxlength="255" value="" required/> 
						</div> 
					</li>		
					<li class="buttons">
						<input id="saveForm" class="button_text" type="submit" name="submit" value="Ajouter" />
					</li>
				</ul>
			</form>
		</div>
		<img id="bottom" src="vue/image/bottom.png" alt="">
    </body>
</html>