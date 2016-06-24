<script type="text/javascript">
$(function () {

    $('#prphase_form').validate({
        rules: {
            name: {
                required: true
            }
        },
        errorPlacement: function (error, element) {
            $(element).closest('.form-group').append(error);

        },
        submitHandler: function (form) {
            $(form).ajaxSubmit({
                dataType: 'json',
                error :function( jqXhr ) {
                    bw.unlockform(form);   
                },
                success: function (response) {
                    if(response.success){
                        Custombox.close(); 
                        setTimeout(function(){location.reload();},1500);                 
                    }else{
                        bw.unlockform(form);   
                    }
                }
            });
        }
    });
});

</script>

<!-- Modal -->
<button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
</button>
<?php if(!is_null($prphase)): ?>
    <h4 class="custom-modal-title">Edit Phase</h4>
<?php else:?>
    <h4 class="custom-modal-title">Add New Phase</h4>
<?php endif;?>
<div class="custom-modal-text text-left">
    <?php if(!is_null($prphase)): ?>
        <form role="form" method="POST" action="/dash/project-phases/edit" id="prphase_form">
    <?php else:?>
        <form role="form" method="POST" action="/dash/project-phases/new" id="prphase_form">
    <?php endif;?>
        <?php echo csrf_field(); ?>
        <?php if (!is_null($prphase)): ?>
            <input type="hidden" name="pr_id" value="<?php echo $prphase->id; ?>">        
        <?php endif;?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo (!is_null($prphase) ? $prphase->name : ''); ?>">
        </div>

        <button type="reset" class="btn w-sm btn-white waves-effect">Cancel</button>
        <button type="submit" class="btn w-sm btn-default waves-effect waves-light">Save</button>
    </form>
</div>