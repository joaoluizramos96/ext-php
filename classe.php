<?php
	class ExemploClasse {
		// declaração de atributo
		public $var = 'valor';

		// declaração de método
		public function displayVar(){
			echo $this->var;
		}
	}

	$instancia = new ExemploClasse();
	echo $instancia->var; // acesso direto a variável, exibe valor
	echo $instancia->displayVar(); // chamada ao método, exibe valor
?>
