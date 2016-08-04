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
<?php 
 $lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
 \App::setLocale($lang);
?>
<!-- Modal -->
<button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
</button>
<?php if(!is_null($technology)): ?>
    <h4 class="custom-modal-title"><?php echo  Lang::get('custom.edit_technology');?></h4>
<?php else:?>
    <h4 class="custom-modal-title"><?php echo  Lang::get('custom.add_new_technology_2');?></h4>
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
            <label for="name"><?php echo  Lang::get('custom.name');?></label>
            <input type="text" class="form-control" id="name" placeholder="<?php echo  Lang::get('custom.enter_name');?>" name="name" value="<?php echo (!is_null($technology) ? $technology->name : ''); ?>">
        </div>

        <button type="reset" class="btn w-sm btn-white waves-effect"><?php echo  Lang::get('custom.cancel');?></button>
        <button type="submit" class="btn w-sm btn-default waves-effect waves-light"><?php echo  Lang::get('custom.save');?></button>
    </form>
</div>