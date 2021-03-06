<p class="text-muted m-b-30 font-13"><?php echo  Lang::get('custom.add_job_roles');?></p>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><?php echo  Lang::get('custom.roles');?></th>

        </tr>
    </thead>
    <tbody>
        <?php if (!empty($project)): ?>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-lg-5">
                                <select class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach($roles as  $role): ?>
                                        <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="number" min="1"/>
                            </div>
                            <div class="col-lg-1">
                                <a href="javascript:;" class="btn btn-icon waves-effect waves-light btn-info" onclick="addRole(this)"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
        <?php endif; ?>
    </tbody>

</table>
<script type="text/javascript">

// Select2
    $(".select2").select2();


    function addRole(element) {
        employee_count = $(element).parent().prev().find('input').val();
        job_role = $(element).parent().prev().prev().find('select');

        if(employee_count == ''){
            $(element).parent().prev().find('input').addClass('error');
            $(element).parent().prev().append('<label  class="error" style="display: inline-block;">This field is required.</label>');
            return false;
        }else{
            $(element).parent().prev().find('label').remove();
            $(element).parent().prev().find('input').removeClass('error');
        }

        if($(element).parent().parent().parent().find('#emp_count_'+$(job_role).val()).length == 1){
            employee_count = parseInt(employee_count)  + parseInt($(element).parent().parent().parent().find('#emp_count_'+$(job_role).val()).html());
            $(element).parent().parent().parent().find('#emp_count_'+$(job_role).val()).html(employee_count);
            $(element).parent().parent().parent().find('#emp_count_'+$(job_role).val()).next().val(employee_count);
        }else{
            $(element).parent().parent().parent().append('<div class="row role-row"><div class="col-lg-6"><p class="text-muted">'+$(job_role).find("option:selected").text()+'</p></div><div class="col-lg-2"><span class="badge badge-success" id="emp_count_'+$(job_role).val()+'">'+employee_count+'</span><input type="hidden" name="count['+$(job_role).val()+']" value="'+employee_count+'"/><input type="hidden" name="roles[]" value="'+$(job_role).val()+'" /><a href="javascript:;" class="remove" onclick="removeRole(this)"><i class="md md-close"></i></a></div></div>');
        }
    }

    function removeRole(element) {
        $(element).parent().parent().remove();
    }
</script>