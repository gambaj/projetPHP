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

            <form id="form_1074181" class="appnitro"  method="post" action="index.php?action=miseAJour&id=<?php echo $id;?>">
                <div class="description">
                    <h2>Modification de <?php echo $contact->getPrenom().' '.$contact->getNom().' ('.$id.')'; ?></h2>
                    <p><a href="index.php?action=deconnexion">Se deconnecter</a></p>
                </div>

                <ul>
                    <li id="li_1" >
                        <label class="description" for="prenom">Contact*</label>
                        <span>
                            <input id="prenom" name= "prenom" class="element text" maxlength="255" size="8" pattern="[a-zA-Z ]*" value="<?php echo $contact->getPrenom();?>"/>
                            <label>Prenom</label>
                        </span>
                        <span>
                            <input id="nom" name= "nom" class="element text" maxlength="255" size="14" pattern="[a-zA-Z ]*" value="<?php echo $contact->getNom();?>" required/>
                            <label>Nom*</label>
                        </span> 
                    </li>
                    <li id="li_2" >
                        <label class="description" for="societe">Societe </label>
                        <div>
                            <input id="societe" name="societe" class="element text medium" type="text" maxlength="255" value="<?php echo $contact->getSociete();?>"/> 
                        </div> 
                    </li>       
                    <li id="li_3" >
                        <label class="description" for="adresse">Adresse </label>
                        <div>
                            <input id="adresse" name="adresse" class="element text medium" type="text" maxlength="255" value="<?php echo $contact->getAdresse();?>"/> 
                        </div> 
                    </li>
                    <li id="li_4" >
                        <label class="description" for="numero">Numéro de téléphone </label>
                        <div>
                            <input id="numero" name="numero" class="element text medium" type="text" maxlength="255" pattern="[0-9]*" value="<?php echo $contact->getNumero();?>"/> 
                        </div> 
                    </li>       
                    <li id="li_5" >
                        <label class="description" for="email">Email </label>
                        <div>
                            <input id="email" name="email" class="element text medium" type="email" maxlength="255" value="<?php echo $contact->getEmail();?>"/> 
                        </div> 
                    </li>       
                    <li id="li_6" >
                        <label class="description" for="site">Site Web </label>
                        <div>
                            <input id="site" name="site" class="element text medium" type="text" maxlength="255" value="<?php echo $contact->getSite();?>"/> 
                        </div> 
                    </li>       
                    <li id="li_7" >
                        <label class="description" for="type">Type de contact </label>
                        <span>
                            <input id="particulier" name="type" class="element radio" type="radio" value="particulier"  <?php if ($contact->getType() == 'particulier') {
    echo 'checked';
}?>/>
                            <label class="choice" for="particulier">Particulier</label>
                            <input id="professionnel" name="type" class="element radio" type="radio" value="professionnel"  <?php if ($contact->getType() == 'professionnel') {
    echo 'checked';
}?>/>
                            <label class="choice" for="professionnel">Professionnel</label>
                        </span> 
                    </li>           
                    <li class="buttons">
                        <input id="saveForm" class="button_text" type="submit" name="submit" value="Enregistrer" />
                    </li>
                </ul>
            </form>
            <form method="post" class="appnitro" action="index.php?action=suppression&id=<?php echo $id;?>">
                <ul>
                    <li class="buttons">
                        <input type="submit" class="button_text" value="Supprimer" />
                    </li>
                </ul>
            </form>
        </div>
        <img id="bottom" src="vue/image/bottom.png" alt="">
    </body>
</html>