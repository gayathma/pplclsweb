<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Team Builder</h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash">Dashboard</a>
            </li>
            <li >
                <a href="/dash/team-builder/">Team Builder</a>
            </li>
            <li class="active">
                Predicted Team
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center m-b-15">
		<h3 class="h4"><b>Team Members For Project "<?php echo $project->name;?>"</b></h3>
	</div>
</div>


<div class="row">
    <?php
    if(count($employees)): 
        foreach ($employees as $employee):
            if(!is_null($settingRepository->get('system_type')) && ($settingRepository->get('system_type') == 'apparel')){
                $employee = $employee->employeeapparel;
                
            }else{
                $employee = $employee->employeeit;
            }

            ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="/dash/profile/<?php echo $employee->id;?>">
                            <?php if($employee->gender->gender == 'F'):?>
                                <img class="img-circle" src="/images/employees/girl.png" alt="">
                            <?php else:?>
                                <img class="img-circle" src="/images/employees/boy.png" alt="">
                            <?php endif;?>
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b><?php echo $employee->first_name.' '.$employee->last_name;?></b></h4>
                            <p class="text-muted"><?php echo $employee->role->name;?></p>
                            <p class="text-dark">
                                <i class="icon-badge" style="font-size: 18px;"></i><span class="badge badge-xs badge-warning" style="position: absolute;top: 45px;left: 106px;"><?php echo $employee->grade?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        <?php endforeach;?>
    <?php else:?>
        <div class="card-box m-b-10">
            <div class="table-box opport-box">
                <div class="table-detail">
                    No Employees Found.
                </div>
            </div>
        </div>
    <?php endif;?>
</div>


