<?php 
	include "koneksi.php";

	if($_POST) {
		$get_weight = mysqli_query($koneksi, "SELECT * FROM landing_weight WHERE weight = '".$_POST['weight']."'");
		$result = mysqli_fetch_object($get_weight);

		echo json_encode($result);
		// var_dump($result_max_manual);
		// $rst_max_manual = $result_max_manual['configuration'];
		// die();
		
	}
	
?>