 <?php 
 $lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
 \App::setLocale($lang);
 ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
    	<div class="btn-group pull-right m-t-15 open">
             <select class="form-control" id="project_id">
             	<option value="" selected="true"><?php echo  Lang::get('custom.all_projects');?></option>
             	<?php foreach ($projects as $project): ?>
             		<option value="<?php echo $project->id;?>"><?php echo $project->name;?></option>
             	<?php endforeach; ?>
             </select>
        </div>
        <h4 class="page-title"><?php echo  Lang::get('custom.analytics');?></h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
            </li>
            <li>
                <a href="#"><?php echo  Lang::get('custom.analytics');?></a>
            </li>
            <li class="active">
                <?php echo  Lang::get('custom.analytical_designer');?>
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<div class="row">
	<div class="col-lg-12">
		<div class="portlet"><!-- /primary heading -->
			<div class="portlet-heading">
				<h3 class="portlet-title text-dark">
					<?php echo  Lang::get('custom.technology_distribution');?>
				</h3>
				<div class="clearfix"></div>
			</div>
			<div>
				<div class="portlet-body">
					<div id="technology_chart_container" style="height: 320px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		<div class="portlet"><!-- /primary heading -->
			<div class="portlet-heading">
				<h3 class="portlet-title text-dark">
					<?php echo  Lang::get('custom.employee_vs_gender');?>
				</h3>
				<div class="clearfix"></div>
			</div>
			<div>
				<div class="portlet-body">
					<div id="gender_chart_container" style="height: 320px;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="portlet"><!-- /primary heading -->
			<div class="portlet-heading">
				<h3 class="portlet-title text-dark">
					<?php echo  Lang::get('custom.Employee_vs_role');?>
				</h3>
				<div class="clearfix"></div>
			</div>
			<div>
				<div class="portlet-body">
					<div id="role_chart_container" style="height: 320px;"></div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
//menu active
$('#analytics_menu').addClass('active');
$('#analytical_designer_menu').addClass('active');


$(document).ready(function () {

        // Gender chart
        $('#gender_chart_container').highcharts({
        	colors: ['#fb6d9d', '#34d3eb', '#5fbeaa'] ,
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            credits: { 
            	enabled: false 
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: '<?php echo  Lang::get('custom.employees');?>',
                colorByPoint: true,
                data: <?php echo $gender_chart_data;?>
            }]
        });

        // Role chart
        $('#role_chart_container').highcharts({
        	colors: ['#5fbeaa', '#fb6d9d', '#7266ba', '#81c868', '#ffbd4a', '#5d9cec', '#f05050', '#36404a'] ,
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            credits: { 
            	enabled: false 
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: '<?php echo  Lang::get('custom.employees');?>',
                colorByPoint: true,
                data: <?php echo $role_chart_data;?>
            }]
        });

        //Technology Chart
	    $('#technology_chart_container').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: ''
	        },
	        xAxis: {
	            categories: <?php echo json_encode($technologies);?>,
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: '<?php echo  Lang::get('custom.total_employees');?>'
	            }
	        },
            credits: { 
            	enabled: false 
            },
	        tooltip: {
	            headerFormat: '<span style="font-size:10px">{point.x}</span><table>',
	            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                '<td style="padding:0"><b>{point.y} </b></td></tr>',
	            footerFormat: '</table>',
	            shared: true,
	            useHTML: true
	        },
	        plotOptions: {
	            column: {
	                pointPadding: 0.2,
	                borderWidth: 0
	            }
	        },
	        series: <?php echo $technology_chart_data;?>
	    });

		$("#project_id").change(function() {
			var project = this.value;
			//update gender chart
			$.ajax({
				url: '/dash/analytics/project-gender',
				type: 'get',
				dataType: 'json',
				data: {
					project_id : project
				},
				success: function (response) {
					var gender_chart_container = $('#gender_chart_container').highcharts();
					gender_chart_container.series[0].setData(response);                  
				}
			});

			//update designation chart
			$.ajax({
				url: '/dash/analytics/project-role',
				type: 'get',
				dataType: 'json',
				data: {
					project_id : project
				},
				success: function (response) {
					var role_chart_container = $('#role_chart_container').highcharts();
					role_chart_container.series[0].setData(response);                  
				}
			});

			//update technology chart
			$.ajax({
				url: '/dash/analytics/project-technology',
				type: 'get',
				dataType: 'json',
				data: {
					project_id : project
				},
				success: function (response) {
				    $('#technology_chart_container').highcharts({
				        chart: {
				            type: 'column'
				        },
				        title: {
				            text: ''
				        },
				        xAxis: {
				            categories: <?php echo json_encode($technologies);?>,
				            crosshair: true
				        },
				        yAxis: {
				            min: 0,
				            title: {
				                text: '<?php echo  Lang::get('custom.total_employees');?>'
				            }
				        },
			            credits: { 
			            	enabled: false 
			            },
				        tooltip: {
				            headerFormat: '<span style="font-size:10px">{point.x}</span><table>',
				            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				                '<td style="padding:0"><b>{point.y} </b></td></tr>',
				            footerFormat: '</table>',
				            shared: true,
				            useHTML: true
				        },
				        plotOptions: {
				            column: {
				                pointPadding: 0.2,
				                borderWidth: 0
				            }
				        },
				        series: response
				    }); 
				}
			});
		});
    });



</script>