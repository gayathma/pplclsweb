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
                Roles
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
                <div class="card-box">
                    <div class="text-center">
                        <h3 class="text-dark"><b><?php echo $role->name;?></b></h3>
                    </div>
                    <div class="text-right">
                        <span class="badge badge-info"><?php echo count($role->employeeits)?></span>
                    </div>

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