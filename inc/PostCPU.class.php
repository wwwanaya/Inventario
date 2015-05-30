<?php 
/**
 * Registrar anuncios class
 *
 * @package default
 * @author Kevin Anaya
 **/

class PostCPU {


	private $inputs;
	private $inputs_val;
	
	function __construct($inputs, $inputs_val) {

		$this->inputs = $inputs;
		$this->inputs_val = $inputs_val;

	}

	public function nuevo_registro() {

		#Creo las variables que son = al nombre del input...
		for ($i=0; $i < count($this->inputs_val); $i++) { 
			# code...
			$var_nom = substr($this->inputs[$i], 1, strlen($this->inputs[$i]));
			$var_val = $this->inputs_val[$i];
			$$var_nom = $var_val;
		}

		require_once 'inc/Query.class.php';
		$sql = "INSERT INTO  inventario.inventario_cpu ( 
				cpu_lic ,
				cpu_sn ,
				cpu_ram ,
				cpu_hd ,
				cpu_brand ,
				cpu_model ,
				cpu_addedBy ,
				cpu_addedDate
				)
				VALUES ( 
					'$wlicence',  '$sn',  '$ram',  '$hd',  '$brand',  '$model',  1, 
				CURRENT_TIMESTAMP
				);";
		$cons = new Query($sql);
		$cons->insert_single_query();
		print 1;

	}
}
?>