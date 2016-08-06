<p class="text-muted m-b-30 font-13"><?php echo  Lang::get('custom.select_the_attributes_that_needs_to_be_accounted_by_the_algorithm');?></p>
<?php if(!is_null($settingRepository->get('system_type')) && ($settingRepository->get('system_type') == 'apparel')): ?>
    <!--Parameters for Apparel Industry -->
	    <div class="form-group clearfix">
        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="pre_experience" type="checkbox" checked disabled>
                <label for="pre_experience">
                    <?php echo  Lang::get('custom.previous_experience');?>
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="edu_qualification" type="checkbox" checked>
                <label for="edu_qualification">
                    <?php echo  Lang::get('custom.educational_qualifications');?>
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="exp_current_ocu" type="checkbox" checked disabled>
                <label for="exp_current_ocu">
                    <?php echo  Lang::get('custom.experience_in_current_occupation');?>
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="soft_skills" type="checkbox" checked>
                <label for="soft_skills">
                    <?php echo  Lang::get('custom.amount_of_estimated_work');?>
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="pre_prj_success_rates" type="checkbox" checked disabled>
                <label for="pre_prj_success_rates">
                    <?php echo  Lang::get('custom.previous_project_success_rates');?>
                </label>
            </div>

        </div>
    </div> 

<?php else: ?>
    <!--Parameters for IT Industry -->
    <div class="form-group clearfix">
        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="pre_experience" type="checkbox" checked disabled>
                <label for="pre_experience">
                    Previouse Experience
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="edu_qualification" type="checkbox" checked>
                <label for="edu_qualification">
                    Educational Qualification
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="exp_current_ocu" type="checkbox" checked disabled>
                <label for="exp_current_ocu">
                    Experience In Current Occupation
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="techs" type="checkbox" checked>
                <label for="techs">
                    Technology Distribution
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="pre_prj_success_rates" type="checkbox" checked disabled>
                <label for="pre_prj_success_rates">
                    Previous Project Success Rates
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="soft_skills" type="checkbox" checked>
                <label for="soft_skills">
                    Soft Skills
                </label>
            </div>
        </div>
    </div> 
<?php endif;?>