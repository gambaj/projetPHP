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
        	<h1><a>Nouveau contact</a></h1>

        	<form id="form_1074181" class="appnitro"  method="post" action="index.php?action=notification">
                <div class="description">
					<h2>Ajouter nouveau contact</h2>
					<p><a href="index.php?action=deconnexion">Se deconnecter</a></p>
					<p><a href="index.php?action=liste&page=0">Liste de contact</a><br />
				</div>	

				<ul>
					<li id="li_1" >
						<label class="description" for="prenom">Contact*</label>
						<span>
							<input id="prenom" name= "prenom" class="element text" maxlength="255" size="8" value="" pattern="[a-zA-Z ]*"/>
							<label>Prenom</label>
						</span>
						<span>
							<input id="nom" name= "nom" class="element text" maxlength="255" size="14" value="" pattern="[a-zA-Z ]*" required/>
							<label>Nom*</label>
						</span> 
					</li>
					<li id="li_2" >
						<label class="description" for="societe">Societe </label>
						<div>
							<input id="societe" name="societe" class="element text medium" type="text" maxlength="255" value=""/> 
						</div> 
					</li>		
					<li id="li_3" >
						<label class="description" for="adresse">Adresse </label>
						<div>
							<input id="adresse" name="adresse" class="element text medium" type="text" maxlength="255" value=""/> 
						</div> 
					</li>
					<li id="li_4" >
						<label class="description" for="numero">Numéro de téléphone </label>
						<div>
							<input id="numero" name="numero" class="element text medium" type="text" maxlength="255" value="" pattern="[0-9]*"/> 
						</div> 
					</li>		
					<li id="li_5" >
						<label class="description" for="email">Email </label>
						<div>
							<input id="email" name="email" class="element text medium" type="email" maxlength="255" value=""/> 
						</div> 
					</li>		
					<li id="li_6" >
						<label class="description" for="site">Site Web </label>
						<div>
							<input id="site" name="site" class="element text medium" type="text" maxlength="255" value="http://"/> 
						</div> 
					</li>		
					<li id="li_7" >
						<label class="description" for="type">Type de contact </label>
						<span>
							<input id="particulier" name="type" class="element radio" type="radio" value="particulier" checked="checked"/>
							<label class="choice" for="particulier">Particulier</label>
							<input id="professionnel" name="type" class="element radio" type="radio" value="professionnel" />
							<label class="choice" for="professionnel">Professionnel</label>
						</span> 
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