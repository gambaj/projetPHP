<?php 
class Vue {

	private $fichier;

	public function __construct($action) {
    	$this->fichier = "vue/" . $action . ".php";
  	}

	public function generer($donnees) {
		$vue = $this->genererFichier($this->fichier, $donnees);
		echo $vue;
	}

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