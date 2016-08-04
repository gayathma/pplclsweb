<?php 
 $lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
 \App::setLocale($lang);
 ?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title"><?php echo  Lang::get('custom.team_builder');?></h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
            </li>
            <li class="active">
                <?php echo  Lang::get('custom.team_builder');?>
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<!-- Wizard with Validation -->
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b><?php echo  Lang::get('custom.start_composing_your_team');?></b></h4>
            <p class="text-muted m-b-30 font-13">
                Team composer lets you to create your team more efficient and accurate manner. 

                <form  method="POST" action="/dash/team-builder/predict-team" id="team_builder_form">
                    <?php echo csrf_field(); ?>
                    <div >
                        <h3><?php echo  Lang::get('custom.choose_your_project');?></h3>
                        <section>
                            <div class="row">
                                <div class="form-group clearfix">
                                    <label class="col-lg-2 control-label " for="project"><?php echo  Lang::get('custom.select_project');?></label>
                                    <div class="col-lg-4">
                                        <select class="form-control  required" id="project" name="project">
                                            <option value=""><?php echo  Lang::get('custom.select');?></option>
                                            <?php foreach ($projects as  $project): ?>
                                            <option value="<?php echo $project->id; ?>"><?php echo $project->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-lg-1 control-label "> <?php echo  Lang::get('custom.or');?> </label>&nbsp;&nbsp;
                                    <a class="btn btn-default waves-effect waves-light" href="/dash/project/new"> <?php echo  Lang::get('custom.add_new_project');?></a>
                                </div>
                            </div>
                            <div id="project_details" class="row">
                            </div>
                        </div>
                    </section>
                    <h3><?php echo  Lang::get('custom.job_roles_and_technologies');?></h3>
                    <section class="step_two">

                    </section>

                    <h3><?php echo  Lang::get('custom.team_selection_criteria');?></h3>
                    <section>
                        <?php echo View::make('dash::team.wizard_partials.step_three', ['settingRepository' => $settingRepository])->render(); ?>                  
                    </section>

                    <h3><?php echo  Lang::get('custom.select_algorithm');?></h3>
                    <section class="step_four">
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End row -->
<div class="row loader-custom" id="loader" style="display:none">
    <p class="loading-text"><?php echo  Lang::get('custom.please_wait');?></p>
    <div class="sk-cube-grid">
      <div class="sk-cube sk-cube1"></div>
      <div class="sk-cube sk-cube2"></div>
      <div class="sk-cube sk-cube3"></div>
      <div class="sk-cube sk-cube4"></div>
      <div class="sk-cube sk-cube5"></div>
      <div class="sk-cube sk-cube6"></div>
      <div class="sk-cube sk-cube7"></div>
      <div class="sk-cube sk-cube8"></div>
      <div class="sk-cube sk-cube9"></div>
    </div>
</div>


<script type="text/javascript">
//menu active
$('#team_builder_menu').addClass('active');

$(document).ready(function () {
    $("#project").change(function() {
        $.ajax({
            url: '/dash/project/get-project',
            type: 'get',
            data: {
                project_id : this.value
            },
            success: function (response) {
                $('#project_details').html('');
                $('#project_details').html(response);
            }
        });
    });
});

</script>