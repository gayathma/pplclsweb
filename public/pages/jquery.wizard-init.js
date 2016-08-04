/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Form wizard page
*/

!function($) {
    "use strict";

    var FormWizard = function() {};

    FormWizard.prototype.createBasic = function($form_container) {
        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });
        return $form_container;
    },
    //creates form with validation
    FormWizard.prototype.createValidatorForm = function($form_container) {
        $form_container.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            }
        });
        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            labels: {
                finish: "<?php echo  Lang::get('custom.finish');?>",
                next: "<?php echo  Lang::get('custom.next');?>",
                previous: "<?php echo  Lang::get('custom.previous');?>"
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                $form_container.validate().settings.ignore = ":disabled,:hidden";

                if(currentIndex === 1){
                    if($().length){
                        return false;
                    }else{
                        return true;
                    }
                }

                return $form_container.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                if (priorIndex === 0)
                {
                    $.ajax({
                        url: '/dash/team-builder/phases',
                        type: 'get',
                        data: {
                            project_id : $('#project').val()
                        },
                        success: function (response) {
                            $('.step_two').html(response);                   
                        }
                    });
                }
            },
            onFinishing: function (event, currentIndex) {
                $form_container.validate().settings.ignore = ":disabled";
                return $form_container.valid();
            },
            onFinished: function (event, currentIndex) {
                var button = $('#team_builder_form').find('a[href="#finish"]');
                button.attr("href", '#finish-disabled');
                button.parent().addClass("disabled");

                var pre = $('#team_builder_form').find('a[href="#previous"]');
                pre.attr("href", '#previous-disabled');
                pre.parent().addClass("disabled");

                $('#loader').show();
                var form = $('#team_builder_form');
                $(form).submit();
            }
        });

        return $form_container;
    },
    //creates vertical form
    FormWizard.prototype.createVertical = function($form_container) {
        $form_container.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "fade",
            stepsOrientation: "vertical"
        });
        return $form_container;
    },
    FormWizard.prototype.init = function() {
        //initialzing various forms

        //form with validation
        this.createValidatorForm($("#team_builder_form"));

    },
    //init
    $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.FormWizard.init()
    $.ajax({
        url: '/dash/team-builder/algorithm-accuracy',
        type: 'get',
        data: {
            project_id : $('#project').val()
        },
        success: function (response) {
            $('.step_four').html(response);                   
        }
    });
}(window.jQuery);