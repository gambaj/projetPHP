<?php 

/**
 * Classe permettant de générer une vue.
 */
class Vue {

	private $fichier;

	/**
	 * Constructeur d'une Vue.
	 * @param $action le nom de la vue.
	 */
	public function __construct($action) {
    	$this->fichier = "vue/" . $action . ".php";
  	}

  	/**
  	 * Méthode permettant de generer une vue.
  	 * @param  $donnees le tableau de variable a envoyer à la vue.
  	 * @return le contenu du tampon de sortie.
  	 */
	public function generer($donnees) {
		$vue = $this->genererFichier($this->fichier, $donnees);
		echo $vue;
	}

	/**
	 * Méthode permettant de générer une vue et de rendre accessible des variables dans cette vue.
	 * @param $fichier le nom de la vue.
	 * @param $donnees le tableau de variable a envoyer à la vue.
	 * @return le contenu du tampon de sortie.
	 */
	private function genererFichier($fichier, $donnees) {
		if (file_exists($fichier)) {
			extract($donnees);
			ob_start();
			require $fichier;
			return ob_get_clean();
    	}
    	else {
      		throw new Exception("Fichier '$fichier' introuvable");
    	}
  	}
}