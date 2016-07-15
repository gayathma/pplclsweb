<div class="row">
    <?php 
    $i=0;
    foreach ($data as $value):?>
    <?php $value  = explode(',', preg_replace("/[^a-zA-Z0-9,.\s\-]/", "", $value));?>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class=" card-box" style="background-color: #f3f3f3 !important;">
                <div class="pull-left">
                    <div class="radio radio-info">
                        <input type="radio" name="algo" id="radio<?php echo ++$i;?>" value="<?php echo $i;?>" <?php if($i == 1):?> checked="true" <?php endif;?>>
                        <label for="radio<?php echo $i;?>"></label>
                    </div>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter"><?php echo ($value[1]*100).'%';?></b></h3>
                    <p class="text-muted"><?php echo $value[0]?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>