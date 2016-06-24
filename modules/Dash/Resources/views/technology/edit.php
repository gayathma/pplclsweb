<script type="text/javascript">
$(function () {

    $('#technology_form').validate({
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
<?php if(!is_null($technology)): ?>
    <h4 class="custom-modal-title">Edit Technology</h4>
<?php else:?>
    <h4 class="custom-modal-title">Add New Technology</h4>
<?php endif;?>
<div class="custom-modal-text text-left">
    <?php if(!is_null($technology)): ?>
        <form role="form" method="POST" action="/dash/technology/edit" id="technology_form">
    <?php else:?>
        <form role="form" method="POST" action="/dash/technology/new" id="technology_form">
    <?php endif;?>
        <?php echo csrf_field(); ?>
        <?php if (!is_null($technology)): ?>
            <input type="hidden" name="tech_id" value="<?php echo $technology->id; ?>">        
        <?php endif;?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo (!is_null($technology) ? $technology->name : ''); ?>">
        </div>

        <button type="reset" class="btn w-sm btn-white waves-effect">Cancel</button>
        <button type="submit" class="btn w-sm btn-default waves-effect waves-light">Save</button>
    </form>
</div>