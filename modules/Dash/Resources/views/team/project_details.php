<?php if(!is_null($project)):?>
<div class="col-lg-12">
	<div class="todoapp">
		<div class="row">
			<div class="col-sm-6">
				<h4 id="todo-message"><strong><?php echo $project->name;?></strong></h4>
			</div>
		</div>
	</div>

	<?php if(!is_null($settingRepository->get('system_type')) && ($settingRepository->get('system_type') == 'apparel')){ ?>

	<?php } else { ?>
		<div class="form-group clearfix">
			<div class="col-sm-4">
				<label ><?php echo  Lang::get('custom.type');?> : </label>
			</div>
			<div class="col-sm-2">
				<label><?php echo (!is_null($project->type))? ucfirst($project->type) : ' - '; ?></label>
			</div>
		</div>
		</div>
	<?php } ?>
		<div class="row">
			<div class="form-group clearfix">
				<div class="col-sm-4"> 
					<label ><?php echo  Lang::get('custom.start_date');?> : </label>
				</div>
				<div class="col-sm-2"> 
					<label><?php echo ($project->wo_received_date != '')? $project->wo_received_date : '-';?></label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group clearfix">
				<div class="col-sm-4"> 
					<label ><?php echo  Lang::get('custom.estimated_end_date');?> : </label>
				</div>
				<div class="col-sm-2"> 
					<label><?php echo ($project->estimated_end_date != '')? $project->estimated_end_date : '-';?></label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group clearfix">
				<div class="col-sm-4"> 
					<label ><?php echo  Lang::get('custom.description');?> : </label>
				</div>
				<div class="col-sm-2"> 
					<label><?php echo ($project->description != '')? $project->description : ' - '; ?></label>
				</div>
			</div>
		</div>
<?php endif;?>