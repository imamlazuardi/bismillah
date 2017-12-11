<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Configuration Landing Distance</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="assets/js/plugins/visualization/echarts/echarts.js"></script>
<!-- /core JS files -->
</head>

<body>


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					
					<!-- <div class="row">
						<div class="col-lg-6">
							Form horizontal
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Basic form inputs</h5>
								</div>
					
								<div class="panel-body">
									<form class="form-horizontal" action="#">
										<fieldset class="content-group">
											<legend class="text-bold">Basic inputs</legend>
					
											<div class="form-group">
					                        	<label class="control-label col-lg-2">Weather</label>
												<div class="col-lg-10">
						                            <select name="select" class="form-control">
						                                <option value="normal">Normal</option>
						                                <option value="rain">Rain</option>
						                            </select>
					                            </div>
					                        </div>
					
					                        <div class="form-group">
					                        	<label class="control-label col-lg-2">Braking Action</label>
					                        	<div class="col-lg-10">
						                            <select name="braking_action" id="braking_action" class="form-control">
						                                <option value="1">Dry Runway</option>
						                                <option value="2">Good</option>
						                                <option value="3">Medium</option>
						                                <option value="4">Poor</option>
						                            </select>
					                            </div>
					                        </div>
					
											<div class="form-group">
					                        	<label class="control-label col-lg-2">Landing Weight</label>
					                        	<div class="col-lg-10">
						                            <select name="weight" id="weight" class="form-control">
						                                <option value="40687">40687 Kg</option>
						                                <option value="46720">46720 Kg</option>
						                                <option value="51710">51710 Kg</option>
						                                <option value="54885">54885 Kg</option>
						                            </select>
					                            </div>
					                        </div>
										</fieldset>
					
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>
								</div>
							</div>
							/form horizontal
						</div>
					
						<div class="col-lg-6">
							Form horizontal
							<div class="panel panel-flat">
								
							</div>
							/form horizontal
						</div>
					</div> -->

					<div class="row">
						<div class="col-lg-6">
							<!-- Form horizontal -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Basic form inputs</h5>
								</div>

								<div class="panel-body">
									<form class="form-horizontal form-validate-jquery" id="calDistance">
										<fieldset class="content-group">		                        
											<div class="form-group">
					                        	<label class="control-label col-lg-2">Weather</label>
												<div class="col-lg-10">
						                            <select name="weather" id="weather" class="form-control">
						                                <option value="normal">Normal</option>
						                                <option value="rain">Rain</option>
						                            </select>
					                            </div>
					                        </div>

					                        <div class="form-group">
					                        	<label class="control-label col-lg-2">Landing Weight</label>
					                        	<div class="col-lg-10">
						                            <select name="weight" id="weight" class="form-control">
						                                <option value="40687">40687 Kg</option>
						                                <option value="46720">46720 Kg</option>
						                                <option value="51710">51710 Kg</option>
						                                <option value="54885">54885 Kg</option>
						                            </select>
					                            </div>
					                        </div>

											<table cellpadding='0' cellspacing='0' border='0' id="tbl" class='table table-striped table-bordered'>
												<thead class="helpHed">
													<tr>
														<th>Distance to Touch Point (Km)</th>
														<th>Aircraft Altitude (Km)</th>
														<th>Weather</th>
														<th>&nbsp;</th>
													  </tr>
						                        </thead>

						                        <tbody>
						                        	<tr class="gradeA">
						                        		<td><input type="number" name="distance[]" placeholder="Distance" id="distance-0" class="form-control distance" required="required"></td>
						                        		<td><input type="text" name="altitude[]" placeholder="Altitude" id="altitude-0" class="form-control altitude" readonly></td>
						                        		<td><input type="text" name="weather[]" placeholder="Weather" id="weather-0" class="form-control weather" readonly></td>
						                        	</tr>
						                        </tbody>
											</table>
										</fieldset>

										<div class="text-right">
											<button type="submit" class="btn btn-primary btn-distance">Submit <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</form>
								</div>
							</div>
							<!-- /form horizontal -->
						</div>

						<div class="col-lg-6">
							<!-- Form horizontal -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Chart</h5>
								</div>

								<div class="panel-body">
									<div class="chart-container">
										<div class="chart has-fixed-height" id="basic_area"></div>
									</div>
								</div>
							</div>
							<!-- /form horizontal -->
						</div>
					</div>
					
					<!-- Footer -->
					<!-- <div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> -->
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>


<script type="text/javascript">
	var	landing_weight = 60000;
	var weight_kilo = 1;
	var flaps = 30;
	var wt_adj = 5000;
	var nilai_mutlak = 13.0178;


	$("#calDistance").on('submit', function(e) {
		e.preventDefault();

		// Set paths
	    // ------------------------------

	    require.config({
	        paths: {
	            echarts: 'assets/js/plugins/visualization/echarts'
	        }
	    });

	    // Configuration
	    // ------------------------------

	    require(
	        [
	            'echarts',
	            'echarts/theme/limitless',
	            'echarts/chart/bar',
	            'echarts/chart/line'
	        ],


	        // Charts setup
	        function (ec, limitless) {


	            // Initialize charts
	            // ------------------------------

	            var basic_area = ec.init(document.getElementById('basic_area'), limitless);
				
				var loop = $('.distance').length;
				var altitudes = [];
				var distances = [];
				var values = [];

				var result = "";
				for(i=0;i<loop;i++) {
					altitudes.push($("#altitude-"+i).val());	// mengambil nilai dari list field altitude dan diubah ke array
					distances.push($("#distance-"+i).val());	// mengambil nilai dari list field distance dan diubah ke array
				}

				altitudes.push(0);
				distances.push(0);

				for(m=0;m<=loop;m++) {
					values.push(m); // Menampilkan nilai baris x
				}
				

	            // Charts setup
	            // ------------------------------

	            //
	            // Stacked area options
	            //

	            basic_area_options = {

	                // Setup grid
	                grid: {
	                    x: 40,
	                    x2: 20,
	                    y: 35,
	                    y2: 25
	                },

	                // Add tooltip
	                tooltip: {
	                    trigger: 'axis'
	                },

	                // Add legend
	                legend: {
	                	// Menampilkan legend chart
	                    data: ['Distance (km)', 'Altitude (km)']
	                },


	                // Enable drag recalculate
	                calculable: true,

	                // Horizontal axis
	                xAxis: [{
	                    type: 'category',
	                    boundaryGap: false,
	                    data: values
	                }],

	                // Vertical axis
	                yAxis: [{
	                    type: 'value'
	                }],

	                // Add series
	                series: [
	                    {
	                    	// Menampilkan garis chart distance (y)
	                        name: 'Distance (km)',
	                        type: 'line',
	                        smooth: true,
	                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
	                        data: distances
	                    },
	                    {
	                    	// Menampilkan garis chart altitude (y)
	                        name: 'Altitude (km)',
	                        type: 'line',
	                        smooth: true,
	                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
	                        data: altitudes
	                    }
	                ]
	            };

	            // Apply options
	            // ------------------------------

	            basic_area.setOption(basic_area_options);


	            // Resize charts
	            // ------------------------------

	            window.onresize = function () {
	                setTimeout(function () {
	                    basic_area.resize();
	                }, 200);
	            }
	        }
	    );
	});

	$(document).on('input', 'input.distance', function(e) {							
		var loop = $('.distance').length;
		for(i=0;i<=loop;i++) {
			if($("#distance-"+i).val() > 13) {										/* Validasi angka distance tidak boleh lebih dari 13 */
				alert('Angka tidak boleh lebih dari 13');
				$("#distance-"+i).val('');
				$("#altitude-"+i).val('');
				return false;
			} else if ($("#distance-"+i).val() < 0) {								/* Validasi angka distance tidak boleh kurang dari 1 */
				alert('Angka tidak boleh kurang dari 1');
				$("#distance-"+i).val('');
				$("#altitude-"+i).val('');
				return false;
			} else {
				var aircraft_alt = Number($("#distance-"+i).val() / nilai_mutlak);	/* Hitung distance x nilai mutlak(13.0178) */

				if($('#weather').val() == 'normal')									/* Rumus berdasarkan Weather */
				{
					var weather_res = $("#distance-"+i).val() / (60/100);			/* Nilai Actual landing distance / 60% */
				}
				else if($('#weather').val() == 'rain')
				{
					var weather_res = $("#distance-"+i).val() * ((115/100) / (60/100));	/* Nilai Actual landing distance / (115% / 60%) */
				}

				$("#altitude-"+i).val(aircraft_alt); 									/* Menampilkan nilai field altitude */
				$("#weather-"+i).val(weather_res); 										/* Menampilkan nilai field Weather */
			}
		}		
	});

	$(document).on('keydown', 'input.distance', function(e) {
		var keyCode = e.keyCode || e.which; 
	    var loop = $('.distance').length;

	    if (keyCode == 9) {
	    	for(i=1;i<=1;i++) {
	    		$("#tbl").append(
	    			'<tbody><tr class="gradeA">'+
	    			'<td><input type="text" name="distance[]" placeholder="Distance" id="distance-'+loop+'" class="form-control distance"></td>'+
					'<td><input type="text" name="altitude[]" placeholder="Altitude" id="altitude-'+loop+'" class="form-control altitude" readonly></td>'+
					'<td><input type="text" name="weather[]" placeholder="Weather" id="weather-'+loop+'" class="form-control weather" readonly></td>'+
					'<td><a href="#">[BATAL]</a></td>'+
					'</tr><tbody>'
	    		);

	    		$("#tbl tbody tr td a").click(function(){
					$(this).parent().parent().remove();
				});
	    	}
	    }
	});

	// $(document).ready(function(){
	// 	$("#weight").change(function() {
	// 		var braking_action = $("#braking_action").val();
	// 		var postData = { 'braking_action' : braking_action }

	// 		$.ajax({
	// 			type: "POST",
	// 			url: "get_wt_adj_above.php",
	// 			data:  postData,
	// 			success: function(response) {
	// 				alert(Object.keys(response));

	// 				// if($("#weight").val() < 60000) {
	// 				// 	var man_result = 0;
	// 				// } else {
	// 				// 	var man_result = response / wt_adj * ($("#weight").val() - 60000);
	// 				// }
	// 			}
	// 		});
	// 	});
	// });
</script>