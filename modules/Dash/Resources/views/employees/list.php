 <?php 
 $lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
 \App::setLocale($lang);
 ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title"><?php echo  Lang::get('custom.hr');?></h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
            </li>
            <li class="active">
                <?php echo  Lang::get('custom.hr');?>
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <form role="form">
            <div class="form-group contact-search m-b-30">
                <input type="text" id="search" class="form-control" placeholder="<?php echo  Lang::get('custom.search');?>...">
                <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
            </div> <!-- form-group -->
        </form>
    </div>
</div>

<div class="row">
    <?php
    if(count($employees)): 
        foreach ($employees as $employee):?>
            <div class="col-sm-6 col-lg-4">
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
                            <h4 class="m-t-0 m-b-5 header-title"><b><?php echo ($employee->salutation)? $employee->salutation->title.'. ': ' ';?><?php echo $employee->getNameAttribute();?></b></h4>
                            <p class="text-muted"><?php echo ($employee->role)? $employee->role->name: $employee->role_name;?></p>
                            <p class="text-dark">
                                <span class="label label-default">Free to assign</span>
                                <i class="icon-badge" style="font-size: 18px;"></i><span class="badge badge-xs badge-warning" style="position: absolute;top: 45px;left: 203px;"><?php echo $employee->grade?></span>
                            </p>
                            <div class="contact-action">
                                <a href="/dash/profile/<?php echo $employee->id;?>" class="btn btn-success btn-sm"><i class="md md-visibility"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        <?php endforeach;?>
        <?php echo $employees->render(); ?>
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
<script type="text/javascript">
//menu active
$('#human_resources_menu').addClass('active');

</script>
