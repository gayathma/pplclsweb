<script type="text/javascript">
    $(function () {
        $('#setting_form').validate({
            ignore: '',
            rules: {
                system_type: {
                    required: true
                },
                min_team_size: {
                    required: true,
                    digits:true
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
<?php 
 $lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
 \App::setLocale($lang);
?>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title"><?php echo  Lang::get('custom.settings');?></h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash"><?php echo  Lang::get('custom.dashboard');?></a>
            </li>
            <li>
                <a href="#"><?php echo  Lang::get('custom.settings');?></a>
            </li>
            <li class="active">
                <?php echo  Lang::get('custom.general_settings');?>
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->


<div class="row">
    <div class="col-md-12">

        <div class="card-box">
            <h4 class="m-t-0 header-title"><b><?php echo  Lang::get('custom.system_config');?></b></h4>

            <div class="text-center">
                <span id="animationSandbox" style="display: block;">
                    <h1>&nbsp;</h1>
                </span>
            </div>

            <form class="form-horizontal m-t-20"  method="post" action="/dash/general-setting/edit" id="setting_form">

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo  Lang::get('custom.industry');?></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="system_type" readonly>
                                <option value=""><?php echo  Lang::get('custom.select_industry');?></option>
                                <option value="it" <?php echo ($setting->get('system_type') == 'it')? 'selected': '' ; ?>>IT Industry</option>
                                <option value="apparel" <?php echo ($setting->get('system_type') == 'apparel')? 'selected': '' ; ?>>Apparel Industry</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo  Lang::get('custom.min_team_size');?></label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="min_team_size" value="<?php echo $setting->get('min_team_size');?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo  Lang::get('custom.algo_selection');?></label>
                        <div class="col-sm-4">
                            <div class="radio radio-info">
                                <input type="radio" name="model_select_method" id="automatic" value="automatic" <?php if($setting->get('model_select_method') == "automatic"):?> checked="" <?php endif; ?> />
                                <label for="automatic">
                                    Automatically Select The Best Algorithm 
                                </label>

                            </div>

                            <div class="radio radio-info">
                                <input type="radio" name="model_select_method" id="manual" value="manual" <?php if($setting->get('model_select_method') == "manual"):?> checked="" <?php endif; ?>>
                                <label for="manual">
                                    Manually Select Algorithm 
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            <button class="btn btn-default"
                            type="submit"><?php echo  Lang::get('custom.save');?>
                            </button>
                        </div>
                        <!-- /input-group -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript">
//menu active
$('#settings_menu').addClass('active');
$('#general_setting_menu').addClass('active');

</script>