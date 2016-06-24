<?php if(!is_null($settingRepository->get('system_type')) && ($settingRepository->get('system_type') == 'apparel')): ?>
    <!--Parameters for Apparel Industry -->

<?php else: ?>
    <!--Parameters for IT Industry -->
    <div class="form-group clearfix">
        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="experience" type="checkbox" checked>
                <label for="experience">
                    Experience
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="edu_qualification" type="checkbox" checked>
                <label for="edu_qualification">
                    Educational Qualification
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="kpi" type="checkbox" >
                <label for="kpi">
                    Key Performance Index(KPI)
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="checkbox checkbox-custom">
                <input id="exp_current_ocu" type="checkbox" checked>
                <label for="exp_current_ocu">
                    Experience In Current Occupation
                </label>
            </div>
            <div class="checkbox checkbox-custom">
                <input id="skill" type="checkbox" checked>
                <label for="skill">
                    Skills
                </label>
            </div>>
        </div>
    </div> 
<?php endif;?>