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
                <?php echo  Lang::get('custom.technologies');?>
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <a href="/dash/technology/new" class="btn btn-default btn-md waves-effect waves-light m-b-30 bw-modal" data-animation="fadein" 
                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> <?php echo  Lang::get('custom.add_new_technology');?></a>
                    </div>
               </div>
           </div>

           <div class="table-responsive">
            <table class="table table-hover mails m-0 table table-actions-bar">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo  Lang::get('custom.name');?></th>
                        <th><?php echo  Lang::get('custom.created_date');?></th>
                        <th style="min-width: 90px;"><?php echo  Lang::get('custom.action');?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    $i = 0;
                    if(count($technologies)):
                        foreach ($technologies as $technology): 
                            ?>
                            <tr id="tech_<?php echo $technology->id;?>">
                                <td>
                                    <?php echo ++$i;?>
                                </td>
                                <td>
                                    <?php echo $technology->name;?>
                                </td>
                                <td>
                                    <?php echo date('Y-m-d', strtotime($technology->created_at));?>
                                </td>
                                <td>
                                    <a href="/dash/technology/edit?tech_id=<?php echo $technology->id;?>" class="table-action-btn bw-modal" title="<?php echo  Lang::get('custom.edit');?>" data-animation="fadein" 
                                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-edit"></i></a>
                                    <a href="javascript:;" onclick="deleteTechnology(<?php echo $technology->id;?>)"  class="table-action-btn bw-ajaxlink" title="<?php echo  Lang::get('custom.delete');?>" ><i class="md md-close"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php else:?>
                        <tr>
                            <td colspan="4" class="text-center">No Technologies Found.</td>
                        </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>

</div> <!-- end col -->


</div>


<script type="text/javascript">
//menu active
$('#settings_menu').addClass('active');
$('#technology_menu').addClass('active');

function deleteTechnology(tech_id){
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this technology!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
    }, function(){
        $.ajax({
            url: '/dash/technology/delete',
            type: 'get',
            data: {
                tech_id : tech_id
            },
            success: function (response) {
                swal("Deleted!", "Your technology has been deleted.", "success"); 
                $('#tech_'+tech_id).hide();                   
            }
        }); 
    });
}

</script>