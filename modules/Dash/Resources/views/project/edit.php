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
            <h4 class="page-title">New Project</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="/dash">Dashboard</a>
                </li>
                <li>
                    <a href="/dash/projects">Projects</a>
                </li>
                <li class="active">
                    New Project
                </li>
            </ol>

        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Edit Project</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="/dash">Dashboard</a>
                </li>
                <li>
                    <a href="/dash/projects">Projects</a>
                </li>
                <li class="active">
                    Edit Project
                </li>
            </ol>

        </div>
    </div>

<?php endif; ?>
<!-- Page-Title -->


<div class="row">
    <div class="col-sm-12">
        <form role="form" method="POST" action="/dash/project/new" id="project_form">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Project Details</b></h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group m-b-20">
                                    <label>Project Name <span class="text-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" placeholder="e.g : CRM Project">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-20">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="type">
                                        <option value="">Select</option>
                                        <?php foreach ($projectTypes as  $projectType): ?>
                                            <option <?php echo (!is_null($project) && $project->type == $projectType->name ? ' selected' : ''); ?> value="<?php echo $projectType->name; ?>"><?php echo $projectType->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-b-20">
                                    <label>Project Duration <span class="text-danger">*</span></label>
                                    <?php $date =  date('m/d/Y').' - '.date('m/d/Y', strtotime('+1 month'));?>
                                    <input class="form-control input-daterange-datepicker" type="text" name="duration" value="<?php echo $date;?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group m-b-20">
                                    <label>Description </label>
                                    <textarea class="form-control" name="description" rows="5" placeholder="Please enter description"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="reset" class="btn w-sm btn-white waves-effect">Cancel</button>
                        <button type="submit" class="btn w-sm btn-default waves-effect waves-light">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>