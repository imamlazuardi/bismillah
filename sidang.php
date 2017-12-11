<?php require_once('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Landing Distance Calculation</title>

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

						<div class="row">
							<div class="col-lg-6">
								<!-- Form horizontal -->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Landing Distance Calculation</h5>
									</div>

												<div class="form-group">
						                        	<label class="control-label col-lg-2">Ketinggian</label>
													<div class="col-lg-8">
							                            <input type="number" name="ketinggian" id="ketinggian" class="form-control minimumrunway">

						                            </div>
						                            <span class="help-inline"> ft </span>
						                        </div>

						                    <div class="form-group">
						                        	<label class="control-label col-lg-2">Waktu</label>
													<div class="col-lg-8">
							                            <input type="number" name="waktu" id="waktu" class="form-control minimumrunway">

						                            </div>
						                            <span class="help-inline"> sec </span>
						                        </div>
						                        
						                        <div class="form-group">
						                        	<label class="control-label col-lg-2">Sudut</label>
													<div class="col-lg-8">
							                            <input type="number" name="sudut" id="sudut" class="form-control minimumrunway">

						                            </div>
						                            <span class="help-inline"> ˚ </span>
						                        </div>

						                       <div class="form-group">
						                        	<label class="control-label col-lg-2">Kecepatan</label>
													<div class="col-lg-8">
							                            <input type="number" name="result" id="result" class="form-control result" readonly>
						                            </div>
						                            <span class="help-inline"> ft/sec </span>
						                        </div>
						                        

						                        <div class="text-right">
													<button type="submit" class="btn btn-primary btn-distance">Submit <i class="icon-arrow-right12 position-right"></i></button>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
								<!-- /form horizontal -->
							</div>

							<div class="col-lg-6">
								<!-- Form horizontal -->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Landing Weight</h5>
									</div>

									<div class="panel-body">
										<form class="form-horizontal form-validate-jquery" id="calWeight">	
											<fieldset class="content-group">		                        
												<div class="form-group">
						                        	<label class="control-label col-lg-2">Weight</label>
													<div class="col-lg-8">
							                            <select name="weight" id="weight" class="form-control">
							                                <option value="">Pilih</option>
							                                <?php
																$get_weight = mysqli_query($koneksi, "SELECT weight FROM landing_weight order by id asc"); 
																while($result = mysqli_fetch_array($get_weight)) {
															?>
							                                	<option value="<?php echo $result['weight']; ?>"><?php echo $result['weight']; ?></option>
							                                <?php } ?>
							                            </select>
						                            </div>
						                        </div>
						                        
						                        <div class="text-right">
													<button type="submit" class="btn btn-primary btn-weight">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</fieldset>
										</form>
									</div>
								</div>

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
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">

	$("#kecepatan").on('submit', function(e) {
		e.preventDefault();

         var kecepatan_res = $("ketinggian").val() / ("waktu").val() * (0.0523);

	$("#result").val('kecepatan_res');
	});


        if($('#weather').val() == 'normal')									/* Rumus berdasarkan Weather */
		{
			var weather_res = $("#minimumrunway").val() / (60/100);			/* Nilai Actual landing distance / 60% */
		}
		else if($('#weather').val() == 'rain')
		{
			var weather_res = $("#minimumrunway").val() * ((115/100) / (60/100));	/* Nilai Actual landing distance / (115% / 60%) */
		}

		$("#result").val(weather_res);

	$("#calWeight").on('submit', function(e) {
		e.preventDefault();

		var weight = $("#weight").val();
		var postData = { 'weight' : weight }

		$.ajax({
			type: "POST",
			url: "get_calculate.php",
			data:  postData,
			success: function(response) {
				var json = JSON.parse(response);
				var altitude = json.altitude;
				var distance = json.distance;

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
						

			            // Charts setup
			            // ------------------------------

			            //
			            // Stacked area options
			            //

			            basic_area_options = {

			                // Setup grid
			                // grid: {
			                //     x: 40,
			                //     x2: 20,
			                //     y: 35,
			                //     y2: 25
			                // },

			                // Add tooltip
			                tooltip: {
			                    trigger: 'axis'
			                },

			                // Add legend
			                legend: {
			                	// Menampilkan legend chart
			                    data: ['Distance (m) and Altitude (m)']
			                },


			                // Enable drag recalculate
			                calculable: true,

			                // tooltip: {
			                //     trigger: 'axis',
			                //     formatter: 'Distance: <br/>{}km: {c}km'
			                // },

			                // Horizontal axis (distance)
			               xAxis: [{
			                    type: 'value',
			                    axisLabel: {
			                        formatter: '{value} m'
			                    }
			                }],

			                // Vertical axis (altitude)
			                yAxis: [{
			                    type: 'category',
			                    axisLine: {
			                        onZero: false
			                    },
			                    axisLabel: {
			                        formatter: '{value} m'
			                    },
			                    boundaryGap: false,
			                    data: [
			                        0, altitude
			                    ]
			                }],

			                // Add series
			                series: [
		                    {
		                        name: 'Altitude(m) and Distance(m)',
		                        type: 'line',
		                        smooth: true,
		                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
		                        // itemStyle: {
		                        //     normal: {
		                        //         lineStyle: {
		                        //             shadowColor: 'rgba(0,0,0,0.4)'
		                        //         }
		                        //     }
		                        // },
		                        data: [
		                            distance, 0
		                        ]
		                    }]
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
			}
		});
	});
</script>