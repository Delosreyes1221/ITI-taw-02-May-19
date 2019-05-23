
<?php 
	
	class EnlacesPaginas{

		public function enlacesPaginasModel($enlacesModel){

			//
			if ($enlacesModel == "nosotros" || 
				$enlacesModel == "servicios" || 
				$enlacesModel == "contactenos") {
				# code...
				$module = "View/modules/".$enlacesModel.".php";
			}

			else if ($enlacesModel == "index") {
				# code...
				$module = "View/modules/inicio.php";
			}
			else{
				$module = "View/modules/inicio.php";
			}

			return $module;
		}
	}

	
?>