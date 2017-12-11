<?php 
	include "koneksi.php";

	if($_POST) {
		$max_manual = mysqli_query($koneksi, "SELECT configuration, wt_adj_above from (
													SELECT 'max_manual' configuration, wt_adj_above
													FROM landing_distance_adjustment
													WHERE id_braking_action = 1
													AND id_braking_configuration = 1
												) max_manual
												UNION ALL
												SELECT configuration, wt_adj_above from (
													SELECT 'max_auto' configuration, wt_adj_above
													FROM landing_distance_adjustment
													WHERE id_braking_action = 1
													AND id_braking_configuration = 2
												) max_auto
												UNION ALL
												SELECT configuration, wt_adj_above from (
													SELECT 'autobrakes_3' configuration, wt_adj_above
													FROM landing_distance_adjustment
													WHERE id_braking_action = 1
													AND id_braking_configuration = 3
												) autobrakes_3
												UNION ALL
												SELECT configuration, wt_adj_above from (
													SELECT 'autobrakes_2' configuration, wt_adj_above
													FROM landing_distance_adjustment
													WHERE id_braking_action = 1
													AND id_braking_configuration = 4
												) autobrakes_2
												UNION ALL
												SELECT configuration, wt_adj_above from (
													SELECT 'autobrakes_1' configuration, wt_adj_above
													FROM landing_distance_adjustment
													WHERE id_braking_action = 1
													AND id_braking_configuration = 5
												) autobrakes_1");
		// $result_max_manual = mysqli_fetch_object($max_manual);
		// $results = array();
		while ($result = mysqli_fetch_object($max_manual)) {
			// var_dump($result);
			// echo json_encode($result);
			$res[] = $result; 
		}

		echo json_encode($res);
		// var_dump($result_max_manual);
		// $rst_max_manual = $result_max_manual['configuration'];
		// die();
		
	}
	
?>