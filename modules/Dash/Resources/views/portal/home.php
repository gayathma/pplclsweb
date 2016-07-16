<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-bg-color-icon card-box fadeInDown animated">
        <div class="bg-icon bg-icon-info pull-left">
            <i class="md md-people text-info"></i>
        </div>
        <div class="text-right">
            <h3 class="text-dark"><b class="counter"><?php echo count($employees);?></b></h3>
            <p class="text-muted">Total Employees</p>
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
              <p class="text-muted">Total Projects</p>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <div class="card-box">
      <h4 class="m-t-0 m-b-20 header-title"><b>Vacant Employees</b></h4>

      <div class="inbox-widget nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
        <?php foreach ($vacantEmployees as $employee) :?>
          <a href="#">
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
              <p class="inbox-item-date">Grade <?php echo $employee->grade;?></p>
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
          Project Status
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
      <h4 class="m-t-0 m-b-20 header-title"><b>New Projects</b></h4>

      <div class="inbox-widget nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
        <?php 
        foreach ($projects as $project) :
          if(count($project->knowledgebases) == 0):
        ?>
            <a href="#">
              <div class="inbox-item">
                <div class="inbox-item-img">
                     <img class="img-circle" src="/images/projects/mystery.png" class="img-circle">
                </div>
                <p class="inbox-item-author"><?php echo $project->name;?></p>
                <p class="inbox-item-text">Start Date  -  <?php echo $project->wo_received_date;?></p>
              </div>
            </a>
          <?php endif;?>
        <?php endforeach;?>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">
//menu active
$('#dash_menu').addClass('active');


$(document).ready(function () {

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
        name: 'Projects',
        colorByPoint: true,
        data: [
        {name:'On Going',y:<?php echo $ongoingProjectsCount;?>},
        {name:'Completed',y:<?php echo $closedProjectsCount;?>}
        ]
      }]
    });
});


</script>
