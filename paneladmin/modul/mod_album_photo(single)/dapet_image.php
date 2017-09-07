<?php 
include "../../config/connect.php";

			$id = $_GET["id"];
		
				
				$query = mysql_query("SELECT * from gallery_photo  where id_gallery_photo = '" . $id. "'");
				$data = mysql_fetch_array($query);
				echo json_encode($data);
?>