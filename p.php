<?php
	if (!empty($_POST)) {
		# code...
		$inputs = $_POST['inputs'];
		$inputs_val = $_POST['inputs_val'];

		require_once 'inc/PostCPU.class.php';
		$reg = new PostCPU($inputs, $inputs_val);
		$reg->nuevo_registro();
	} else {
    	print 'Error... No se enviaron datos. Intente de nuevo';
    }
?>