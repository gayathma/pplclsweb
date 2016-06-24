<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Settings</h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash">Dashboard</a>
            </li>
            <li>
                <a href="#">Settings</a>
            </li>
            <li class="active">
                General Settings
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->


<div class="row">
    <div class="col-md-12">

        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>System Configuration</b></h4>

            <div class="text-center">
                <span id="animationSandbox" style="display: block;">
                    <h1>&nbsp;</h1>
                </span>
            </div>

            <form class="m-b-30"  method="post" action="/dash/general-setting/edit" id="setting_form">

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Industry</label>
                        <div class="col-sm-4">
                            <select class="form-control js--animations" name="system_type">
                                <option value="">Select Industry</option>
                                <option value="it" <?php echo ($setting->get('system_type') == 'it')? 'selected': '' ; ?>>IT Industry</option>
                                <option value="apparel" <?php echo ($setting->get('system_type') == 'apparel')? 'selected': '' ; ?>>Apparel Industry</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            <button class="btn btn-default"
                            type="submit">Save
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