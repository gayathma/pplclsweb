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
                Technologies
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
                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add New Technology</a>
                    </div>
               </div>
           </div>

           <div class="table-responsive">
            <table class="table table-hover mails m-0 table table-actions-bar">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th style="min-width: 90px;">Action</th>
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
                                    <a href="/dash/technology/edit?tech_id=<?php echo $technology->id;?>" class="table-action-btn bw-modal" title="Edit" data-animation="fadein" 
                                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-edit"></i></a>
                                    <a href="javascript:;" onclick="deleteTechnology(<?php echo $technology->id;?>)"  class="table-action-btn bw-ajaxlink" title="Delete" ><i class="md md-close"></i></a>
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