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
                <?php echo  Lang::get('custom.roles');?>
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<div class="row">
    <div class="table-responsive">
        <?php if(count($roles)):
            foreach ($roles as $role): ?>
            <div class="col-md-4">
                <div class="widget-panel widget-style-2 bg-white">
                            <h2 class="m-0 text-dark  role-text"><?php echo $role->name;?></h2>
                    <?php if(!is_null($settingRepository->get('system_type')) && ($settingRepository->get('system_type') == 'apparel')){ ?>
                        <i class="md role-count text-primary"><?php echo count($role->employeeapparel)?></i>
                    <?php }else{ ?>
                        <i class="md role-count text-primary"><?php echo count($role->employeeits)?></i>
                    <?php } ?>

                        </div>
            </div>
        <?php endforeach;?>
        <?php else:?>
            <div class="col-md-12">
                <div class="card-box">
                    <div class="text-center">No Roles Found.</div>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>


<script type="text/javascript">
//menu active
$('#settings_menu').addClass('active');
$('#roles_menu').addClass('active');

</script>