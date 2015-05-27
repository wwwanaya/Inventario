<?php
require_once 'inc/Query.class.php';
switch ($_GET['type']) {
	case 1:
		# For load models...
		# Creating variables
		foreach ($_GET as $key => $value) {
			$$key = $value;
		}
		$modelsQuery = "SELECT invt_models.model_name, invt_brands.brand_name
						FROM invt_models INNER JOIN invt_brands
						ON invt_models.model_brand = invt_brands.brand_id
						WHERE invt_brands.brand_id = $brand;";
		$Query = new Query($modelsQuery);
		$modelsQuery = $Query->query_array_assoc();
		var_dump($modelsQuery);
		echo json_encode($modelsQuery);
		break;
	
	default:
		# code...
	$modelsQuery = "SELECT invt_models.model_name, invt_brands.brand_name
						FROM invt_models INNER JOIN invt_brands
						ON invt_models.model_brand = invt_brands.brand_id
						WHERE invt_brands.brand_id = 1;";
		$Query = new Query($modelsQuery);
		$modelsQuery = $Query->query_array_assoc();
		var_dump($modelsQuery);
		break;
}
?>