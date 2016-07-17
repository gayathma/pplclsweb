<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Projects</h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash">Dashboard</a>
            </li>
            <li class="active">
                Projects
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-8">
        <form role="form">
            <div class="form-group contact-search m-b-30">
                <input type="text" id="search" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
            </div> <!-- form-group -->
        </form>
    </div>
    <div class="col-sm-4">
       <a href="/dash/project/new" class="btn btn-default btn-md waves-effect waves-light m-b-30"  ><i class="md md-add"></i> Add New Project</a>
   </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <?php
        if(count($projects)): 
            foreach ($projects as $project):?>
                <div class="card-box m-b-10">
                    <div class="table-box opport-box">
                        <div class="table-detail table-detail-custom">
                            <img src="/images/projects/mystery.png" alt="img" class="img-circle thumb-lg m-r-15" />
                        </div>

                        <div class="table-detail table-detail-text">
                            <div class="member-info">
                                <h4 class="m-t-0"><b><?php echo $project->name;?> </b></h4>
                                <p class="text-dark m-b-5"><b>Type: </b> <span class="text-muted"><?php echo (!is_null($project->type))? ucfirst($project->type) : ' - '; ?></span></p>
                            </div>
                        </div>

                        <div class="table-detail lable-detail">
                            <?php if(strtotime($project->estimated_end_date) >= strtotime(date('Y-m-d')) && ($project->is_team_assigned == 1)):?>
                                <span class="label label-info">On Going</span>
                            <?php elseif($project->is_team_assigned == 0):?>
                                <span class="label label-success">New</span>
                            <?php else:?>
                                <span class="label label-danger">Completed</span>
                            <?php endif;?>
                        </div>

                        
                        <div class="table-detail lable-detail">
                            <?php if($project->is_team_assigned != 0):?>
                            <a class="btn btn-success waves-effect waves-light" href="/dash/team-builder/team/<?php echo $project->id;?>"> <i class="fa fa-group m-r-5"></i> <span>View Team</span> </a>
                            <?php endif;?>
                        </div>
                        

                        <div class="table-detail table-actions-bar">
                            <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                            <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <?php echo $projects->render(); ?>
            <?php else:?>
                <div class="card-box m-b-10">
                    <div class="table-box opport-box">
                        <div class="table-detail">
                            No Projects Found.
                        </div>
                    </div>
                </div>
            <?php endif;?>
    </div> <!-- end col -->

    <div class="col-lg-3">
        <div class="card-box m-b-0">
            <h4 class=" header-title m-t-0 m-b-20 text-dark">Leads Statics</h4>
            <div id="morris-bar-stacked" style="height: 260px;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
//menu active
$('#projects_menu').addClass('active');

</script>