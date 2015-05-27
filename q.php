<?php
require_once 'inc/Query.class.php';
switch ($_GET['type']) {
	case 1:
		# For load models...
		# Creating variables
		foreach ($_GET as $key => $value) {
			$$key = $value;
		}
		$modelsQuery = "SELECT inventario_models.model_name, inventario_brands.brand_name
						FROM inventario_models INNER JOIN inventario_brands
						ON inventario_models.model_brand = inventario_brands.brand_id
						WHERE inventario_brands.brand_id = $brand;";
		$Query = new Query($modelsQuery);
		$modelsQuery = $Query->query_array_assoc();
		echo json_encode($modelsQuery);
		break;
	
	default:
		# code...
	$modelsQuery = "SELECT inventario_models.model_name, inventario_brands.brand_name
						FROM inventario_models INNER JOIN inventario_brands
						ON inventario_models.model_brand = inventario_brands.brand_id
						WHERE inventario_brands.brand_id = 1;";
		$Query = new Query($modelsQuery);
		$modelsQuery = $Query->query_array_assoc();
		var_dump($modelsQuery);
		break;
}
?>