<?php

#Import Clase para consultar
require_once 'inc/Query.class.php';

# Si existe y se recibe type, continuamos.
if (isset($_GET['type']))
{
	
	switch ($_GET['type'])
	{
	case 1:
	# For load models...

		# Si existe y se recibe brand, continuo
		if (isset($_GET['brand']))
		{
			
			# Si el ID de la marca es mayor a 0, opero.
			if ($_GET['brand'] > 0) {
					
					# Creating variables
					foreach ($_GET as $key => $value)
					{
						$$key = $value;
					}

					# Consulta para mach ID de la marca
					$modelsQuery = "SELECT inventario_models.model_id, inventario_models.model_name
									FROM inventario_models INNER JOIN inventario_brands
									ON inventario_models.model_brand = inventario_brands.brand_id
									WHERE inventario_brands.brand_id = $brand;";

					# Cargo consultas
					$Query = new Query($modelsQuery);

					# Guardo los datos que devuelve la consulta
					$modelsQuery = $Query->query_array_assoc();

					//var_dump($modelsQuery);
					# Paso los datos a JS
					echo json_encode($modelsQuery);

				}

				# Si no es mayor a 0 envio error a JS.
				else
				{
					$e = array(0 => array(
						'model_id' => 0,
						'model_name' => 'Error'
						));
					//var_dump($e);
					echo json_encode($e);
				}

		}

		break;
	
	default:
		# Si no se cumplen los casos, envio un error a JS
		print 'Error';
	}

}
# Si no ser recibe la variable type, se muestra un error
else
{
	print 'Error.';
}
?>