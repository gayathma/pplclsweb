<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<h4 class="page-title"><?php echo  Lang::get('custom.hr');?></h4>
		<ol class="breadcrumb">
			<li>
				<a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
			</li>
			<li>
				<a href="/dash/human-resources"><?php echo  Lang::get('custom.hr');?></a>
			</li>
			<li class="active">
				<?php echo  Lang::get('custom.profile');?>
			</li>
		</ol>
	</div>
</div>
<!-- Page-Title -->

<div class="row">
	<div class="col-sm-5 col-md-4 col-lg-3">
		<div class="profile-detail card-box">
			<div>
				<?php if($employee->gender->gender == 'F'):?>
					<img class="img-circle" src="/images/employees/girl.png" alt="profile-image">
				<?php else:?>
					<img class="img-circle" src="/images/employees/boy.png" alt="profile-image">
				<?php endif;?>

				<ul class="list-inline status-list m-t-20">
					<li>
						<h3 class="text-success m-b-10"><?php echo ($employee->salutation)? $employee->salutation->title.'. ': ' ';?><?php echo $employee->getNameAttribute();?></h3>
						<p class="text-muted"><?php echo $employee->role->name;?></p>
					</li>
				</ul>
				<div class=" m-b-12"><i class="icon-badge" style="font-size: 20px;"></i><span class="badge badge-xs badge-warning" style="position: absolute;top: 255px;left: 162px;"><?php echo $employee->grade?></span></div>

				<hr>

				<div class="text-left">

					<p class="text-muted font-13"><strong><?php echo  Lang::get('custom.email');?> :</strong> <span class="m-l-15"><?php echo $employee->email;?></span></p>

					<p class="text-muted font-13"><strong><?php echo  Lang::get('custom.age');?> :</strong> <span class="m-l-15"><?php echo $employee->age;?></span></p>

					<p class="text-muted font-13"><strong><?php echo  Lang::get('custom.education');?> :</strong> <span class="m-l-15"><?php echo ($employee->qualification)? $employee->qualification->qualification: '-';?></span></p>
				</div>
			</div>

		</div>

		<div class="card-box">
			<h4 class="m-t-0 m-b-20 header-title"><b>Curent Team Members <span class="text-muted">(<?php echo ($employee->team)? count($employee->team->emplyeeits): '0' ;?>)</span></b></h4>

			<div class="friend-list">
				<?php if(!is_null($employee->team)): ?>
					<?php if(count($employee->team->emplyeeits) > 0):?>
						<?php foreach ($employee->team->emplyeeits as $member):?>
							<a href="/dash/profile/<?php echo $member->id;?>">
								<?php if($member->gender->gender == 'F'):?>
									<img class="img-circle thumb-md" src="/images/employees/girl.png" alt="team-member" title="<?php echo ($member->salutation)? $member->salutation->title.'. ': ' ';?><?php echo $member->getNameAttribute();?>">
								<?php else:?>
									<img class="img-circle thumb-md" src="/images/employees/boy.png" alt="team-member" title="<?php echo ($member->salutation)? $member->salutation->title.'. ': ' ';?><?php echo $member->getNameAttribute();?>">
								<?php endif;?>
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="col-md-5">
        <div class="card-box">
            <h4 class="m-t-0 header-title m-b-30"><b>Skill Set</b></h4>
            <?php foreach ($employee->employeeittechnologies as $technology):?>
	            <div class="row m-b-10">
		            <div class="col-md-3">
		            	<strong> <?php echo $technology->technology->name;?></strong>
		            </div>
		            <div class="col-md-6">
			            <div class="progress progress-md">
			            	<?php  $grade = $technology->grade * 10; ?>
			            	<div class="progress-bar progress-bar-custom progress-bar-striped progress-animated wow animated" role="progressbar" aria-valuenow="<?php echo $grade;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $grade;?>%;">
			            		<span class="sr-only"><?php echo $grade;?>% Complete</span>
			            		<?php echo $grade;?>% 
			            	</div>
			            </div>
			        </div>
			    </div>
			 <?php endforeach; ?>
        </div>
	</div>
	<div class="col-lg-4">
	    <div class="card-box">
	      <h4 class="m-t-0 m-b-20 header-title"><b><?php echo  Lang::get('custom.project_success_rates');?></b></h4>

	      <div class="inbox-widget nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
	        <?php foreach ($projects as $project) :?>
	          <a href="#">
	            <div class="inbox-item">
	              <div class="inbox-item-img">
	                 <img class="img-circle" src="/images/projects/mystery.png" class="img-circle">
	              </div>
	              <p class="inbox-item-author"><?php echo ($project->project)? $project->project->name : ' - ';?></p>
	              <p class="inbox-item-text">
	              	<h5 class="text-muted"><?php echo  Lang::get('custom.success_rate');?><span class="pull-right"><?php echo $project->workload_actual;?>%</span></h5>
	              	<div class="progress progress-sm m-0">
	              		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $project->workload_actual;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $project->workload_actual;?>%">
	              			<span class="sr-only"><?php echo $project->workload_actual;?>% Complete</span>
	              		</div>
	              	</div>
	              </p>
	            </div>
	          </a>
	        <?php endforeach;?>
	      </div>
	    </div>
  	</div>
</div>
<script type="text/javascript">
//menu active
$('#human_resources_menu').addClass('active');

</script>
