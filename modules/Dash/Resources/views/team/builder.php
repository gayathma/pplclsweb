<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Team Builder</h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash">Dashboard</a>
            </li>
            <li class="active">
                Team Builder
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<!-- Wizard with Validation -->
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Start Composing Your Team</b></h4>
            <p class="text-muted m-b-30 font-13">
                Team composer let you to create your team more efficient and accurate manner. 

            <form id="wizard-validation-form" action="#">
                <div>
                    <h3>Choose Your Project</h3>
                    <section>
                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label " for="project">Select Project </label>
                            <div class="col-lg-4">
                                <select class="form-control  required" id="project" name="project">
                                    <option value="">Select</option>
                                    <?php foreach ($projects as  $project): ?>
                                        <option value="<?php echo $project->id; ?>"><?php echo $project->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <label class="col-lg-1 control-label "> Or </label>
                                <a class="btn btn-default waves-effect waves-light" href="/dash/project/new"> Add New Project</a>
                            </div>
                            
                        </div>
                    </section>
                    <h3>Job Roles & Technologies</h3>
                    <section class="step_two">
                        
                    </section>

                    <h3>Team Selection Criteria</h3>
                    <section>
                        <?php echo View::make('dash::team.wizard_partials.step_three', ['settingRepository' => $settingRepository])->render(); ?>                  
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End row -->

<script type="text/javascript">
//menu active
$('#team_builder_menu').addClass('active');

</script>