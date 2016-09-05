<script type="text/javascript">
    $(function () {
        $('#project_form').validate({
            ignore: '',
            rules: {
                name: {
                    required: true
                },
                type: {
                    required: true
                },
                duration: {
                    required: true
                }
            },
            errorPlacement: function (error, element) {
                $(element).closest('.form-group').append(error)
            },
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    dataType: 'json',
                    beforeSubmit: bw.lockform(form),
                    error :function( jqXhr ) {
                        bw.unlockform(form);  
                    },
                    success: function (response) {
                        if(response.success){ 
                            location.reload();                 
                        }else{
                            bw.unlockform(form);   
                        }
                    }
                });
            }
        });
    });
</script>
<!-- Page-Title -->
<?php if (is_null($project)): ?>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title"><?php echo  Lang::get('custom.new_project');?></h4>
            <ol class="breadcrumb">
                <li>
                    <a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
                </li>
                <li>
                    <a href="/dash/projects"><?php echo  Lang::get('custom.projects');?></a>
                </li>
                <li class="active">
                    <?php echo  Lang::get('custom.new_project');?>
                </li>
            </ol>

        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title"><?php echo  Lang::get('custom.edit_project');?></h4>
            <ol class="breadcrumb">
                <li>
                    <a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
                </li>
                <li>
                    <a href="/dash/projects"><?php echo  Lang::get('custom.projects');?></a>
                </li>
                <li class="active">
                    <?php echo  Lang::get('custom.edit_project');?>
                </li>
            </ol>

        </div>
    </div>

<?php endif; ?>
<!-- Page-Title -->


<div class="row">
    <div class="col-sm-12">
        <?php if (!is_null($project)): ?>
            <form role="form" method="POST" action="/dash/project/edit" id="project_form">
         <?php else: ?>       
            <form role="form" method="POST" action="/dash/project/new" id="project_form">
        <?php endif ?>
            <?php echo csrf_field(); ?>
            <?php if (!is_null($project)): ?>
                <input type="hidden" name="pid" value="<?php echo $project->id; ?>">        
            <?php endif ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b><?php echo  Lang::get('custom.project_details');?></b></h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group m-b-20">
                                    <label><?php echo  Lang::get('custom.project_name');?>  <span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" placeholder="e.g : CRM Project" value="<?php echo (!is_null($project) ? $project->name : ''); ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-20">
                                    <label><?php echo  Lang::get('custom.type');?> <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="type">
                                        <option value=""><?php echo  Lang::get('custom.select');?></option>
                                        <?php foreach ($projectTypes as  $projectType): ?>
                                            <option <?php echo (!is_null($project) && $project->type == strtolower($projectType->name)  ? ' selected' : ''); ?> value="<?php echo $projectType->name; ?>"><?php echo $projectType->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-b-20">
                                    <label><?php echo  Lang::get('custom.project_duration');?> <span class="text-danger">*</span></label>
                                    <?php $date =  date('m/d/Y').' - '.date('m/d/Y', strtotime('+1 month'));?>
                                    <input class="form-control input-daterange-datepicker" type="text" name="duration" value="<?php echo (!is_null($project) ? $project->wo_received_date.' - '.$project->estimated_end_date : $date);?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group m-b-20">
                                    <label><?php echo  Lang::get('custom.description');?> </label>
                                    <textarea class="form-control" name="description" rows="5" placeholder="<?php echo  Lang::get('custom.please_enter_description');?>"><?php echo (!is_null($project) ? $project->description : ''); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="reset" class="btn w-sm btn-white waves-effect"><?php echo  Lang::get('custom.cancel');?></button>
                        <button type="submit" class="btn w-sm btn-default waves-effect waves-light">
                            <?php echo  Lang::get('custom.save');?>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>