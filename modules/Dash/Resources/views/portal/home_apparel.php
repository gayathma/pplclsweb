<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-bg-color-icon card-box fadeInDown animated">
        <div class="bg-icon bg-icon-info pull-left">
            <i class="md md-people text-info"></i>
        </div>
        <div class="text-right">
            <h3 class="text-dark"><b class="counter"><?php echo count($employees);?></b></h3>
            <p class="text-muted"><?php echo Lang::get('custom.total_employees');?></p>
        </div>
        <div class="clearfix"></div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
      <div class="widget-bg-color-icon card-box">
          <div class="bg-icon bg-icon-pink pull-left">
              <i class="md md-layers text-pink"></i>
          </div>
          <div class="text-right">
              <h3 class="text-dark"><b class="counter"><?php echo count($projects);?></b></h3>
              <p class="text-muted"><?php echo Lang::get('custom.total_projects');?></p>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>

  <div class="col-md-6 col-lg-3">
      <div class="widget-bg-color-icon card-box">
          <div class="bg-icon bg-icon-success pull-left">
              <i class="md md-language text-success"></i>
          </div>
          <div class="text-right">
              <h3 class="text-dark"><b class="counter"><?php echo count($teams);?></b></h3>
              <p class="text-muted"><?php echo Lang::get('custom.predicted_teams');?></p>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>

  <div class="col-md-6 col-lg-3">
      <div class="widget-bg-color-icon card-box">
          <div class="bg-icon bg-icon-warning pull-left">
              <i class="md  md-accessibility text-warning"></i>
          </div>
          <div class="text-right">
              <h3 class="text-dark"><b class="counter"><?php echo count($thisMonthTeams);?></b></h3>
              <p class="text-muted"><?php echo date('M');?> <?php echo Lang::get('custom.predicted_teams');?></p>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4">
    <div class="card-box">
      <h4 class="m-t-0 m-b-20 header-title"><b><?php echo Lang::get('custom.vacant_employees');?></b></h4>

      <div class="inbox-widget nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
        <?php foreach ($vacantEmployees as $employee) :?>
          <a href="/dash/profile/<?php echo $employee->id;?>">
            <div class="inbox-item">
              <div class="inbox-item-img">
                <?php if($employee->gender->gender == 'F'):?>
                  <img class="img-circle" src="/images/employees/girl.png" class="img-circle">
                <?php else:?>
                  <img class="img-circle" src="/images/employees/boy.png" class="img-circle">
                <?php endif;?>
              </div>
              <p class="inbox-item-author"><?php echo ($employee->salutation)? $employee->salutation->title.'. ': ' ';?><?php echo $employee->getNameAttribute();?></p>
              <p class="inbox-item-text"><?php echo ($employee->role)? $employee->role->name: $employee->role_name;?></p>
              <p class="inbox-item-date"><?php echo Lang::get('custom.grade');?> <?php echo $employee->grade;?></p>
            </div>
          </a>
        <?php endforeach;?>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="portlet"><!-- /primary heading -->
      <div class="portlet-heading">
        <h3 class="portlet-title text-dark">
            <?php echo Lang::get('custom.project_status');?>
        </h3>
        <div class="clearfix"></div>
      </div>
      <div>
        <div class="portlet-body">
          <div id="project_status_chart_container" style="height: 372px;"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card-box">
      <h4 class="m-t-0 m-b-20 header-title"><b><?php echo Lang::get('custom.new_projects');?></b></h4>

      <div class="inbox-widget nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
        <?php 
          if(count($newProjects) > 0):
            foreach ($newProjects as $project) :
          ?>
              <a href="/dash/projects">
                <div class="inbox-item">
                  <div class="inbox-item-img">
                       <img class="img-circle" src="/images/projects/mystery.png" class="img-circle">
                  </div>
                  <p class="inbox-item-author"><?php echo $project->name;?></p>
                  <p class="inbox-item-text"><?php echo Lang::get('custom.start_date');?>  -  <?php echo $project->wo_received_date;?></p>
                </div>
              </a>
          <?php endforeach;?>
        <?php else:?>
            <a href="#">
                <div class="inbox-item">
                    <?php echo Lang::get('custom.no_new_projects_found');?>
                </div>
            </a>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="portlet"><!-- /primary heading -->
      <div class="portlet-heading">
        <h3 class="portlet-title text-dark">
            <?php echo Lang::get('custom.avg_success_rate');?>
        </h3>
        <div class="clearfix"></div>
      </div>
      <div>
        <div class="portlet-body">
          <div id="avg_workload_chart_container" style="height: 320px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
//menu active
$('#dash_menu').addClass('active');


$(document).ready(function () {

    //Average Workload Chart
    $('#avg_workload_chart_container').highcharts({
      colors: ['#34d3eb'],
      chart: {
        type: 'column'
      },
      title: {
        text: ''
      },
      xAxis: {
        categories: <?php echo json_encode($projectNames);?>,
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: '<?php echo Lang::get('custom.avg_success_rate_2');?>'
        }
      },
      credits: { 
        enabled: false 
      },
      exporting: {
        enabled: false 
      },
      legend: {
        enabled: false 
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.x}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}%</b></td></tr>',
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
      series: [<?php echo $projectWorkloadData;?>]
    });

    // Project Status chart
    $('#project_status_chart_container').highcharts({
      colors: ['#34d3eb', '#fb6d9d', '#5fbeaa'] ,
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
      exporting: {
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
        name: '<?php echo Lang::get('custom.projects');?>',
        colorByPoint: true,
        data: [
          {name:'<?php echo Lang::get('custom.on_going');?>',y:<?php echo $ongoingProjectsCount;?>},
          {name:'<?php echo Lang::get('custom.completed');?>',y:<?php echo $closedProjectsCount;?>},
          {name:'<?php echo Lang::get('custom.new');?>',y:<?php echo $newProjectsCount;?>}
        ]
      }]
    });
});


</script>
