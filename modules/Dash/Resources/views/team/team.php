<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Team Builder</h4>
        <ol class="breadcrumb">
            <li>
                <a href="/dash">Dashboard</a>
            </li>
            <li >
                <a href="/dash/team-builder/">Team Builder</a>
            </li>
            <li class="active">
                Predicted Team
            </li>
        </ol>
    </div>
</div>
<!-- Page-Title -->

<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center m-b-15">
		<h3 class="h4"><b>Team Members For Project "<?php echo $project->name;?>"</b></h3>
	</div>
</div>


<div class="row">
    <?php
    if(count($employees)): 
        foreach ($employees as $employee):?>
            <div class="col-sm-6 col-lg-3">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="/dash/profile/<?php echo $employee->id;?>">
                            <?php if($employee->gender->gender == 'F'):?>
                                <img class="img-circle" src="/images/employees/girl.png" alt="">
                            <?php else:?>
                                <img class="img-circle" src="/images/employees/boy.png" alt="">
                            <?php endif;?>
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b><?php echo ($employee->salutation)? $employee->salutation->title.'. ': ' ';?><?php echo $employee->getNameAttribute();?></b></h4>
                            <p class="text-muted"><?php echo ($employee->role)? $employee->role->name: $employee->role_name;?></p>
                            <p class="text-dark">
                                <i class="icon-badge" style="font-size: 18px;"></i><span class="badge badge-xs badge-warning" style="position: absolute;top: 45px;left: 106px;"><?php echo $employee->grade?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        <?php endforeach;?>
    <?php else:?>
        <div class="card-box m-b-10">
            <div class="table-box opport-box">
                <div class="table-detail">
                    No Employees Found.
                </div>
            </div>
        </div>
    <?php endif;?>
</div>
 <link rel="stylesheet" href="<?php echo asset('js/plumb/jsPlumbToolkit-defaults.css') ?>">
        <link rel="stylesheet" href="<?php echo asset('js/plumb/main.css') ?>">
        <link rel="stylesheet" href="<?php echo asset('js/plumb/jsPlumbToolkit-demo.css') ?>">
        <link rel="stylesheet" href="<?php echo asset('js/plumb/demo.css') ?>">
        <!-- support lib for bezier stuff -->
        <script src="<?php echo asset('js/plumb/jsBezier-0.8.js') ?>"></script>
        <!-- event adapter -->
        <script src="<?php echo asset('js/plumb/mottle-0.7.2.js') ?>"></script>
        <!-- geometry functions -->
        <script src="<?php echo asset('js/plumb/biltong-0.3.js') ?>"></script>
        <!-- drag -->
        <script src="<?php echo asset('js/plumb/katavorio-0.17.0.js') ?>"></script>
         <!-- jsplumb util -->
        <script src="<?php echo asset('js/plumb/util.js') ?>"></script>
        <script src="<?php echo asset('js/plumb/browser-util.js') ?>"></script>
        <!-- main jsplumb engine -->
        <script src="<?php echo asset('js/plumb/jsPlumb.js') ?>"></script>
        <!-- base DOM adapter -->
        <script src="<?php echo asset('js/plumb/dom-adapter.js') ?>"></script>
        <script src="<?php echo asset('js/plumb/overlay-component.js') ?>"></script>
        <!-- endpoint -->
        <script src="<?php echo asset('js/plumb/endpoint.js') ?>"></script>
        <!-- connection -->
        <script src="<?php echo asset('js/plumb/connection.js') ?>"></script>
        <!-- anchors -->
        <script src="<?php echo asset('js/plumb/anchors.js') ?>"></script>
        <!-- connectors, endpoint and overlays  -->
        <script src="<?php echo asset('js/plumb/defaults.js') ?>"></script>
        <!-- bezier connectors -->
        <script src="<?php echo asset('js/plumb/connectors-bezier.js') ?>"></script>
        <!-- state machine connectors -->
        <script src="<?php echo asset('js/plumb/connectors-statemachine.js') ?>"></script>
        <!-- flowchart connectors -->
        <script src="<?php echo asset('js/plumb/connectors-flowchart.js') ?>"></script>
        <!-- SVG renderer -->
        <script src="<?php echo asset('js/plumb/renderers-svg.js') ?>"></script>

        <!-- common adapter -->
        <script src="<?php echo asset('js/plumb/base-library-adapter.js') ?>"></script>
         <!-- no library jsPlumb adapter -->
        <script src="<?php echo asset('js/plumb/dom.jsPlumb.js') ?>"></script>
<script>

jsPlumb.ready(function () {

    var color = "gray";

    var instance = jsPlumb.getInstance({
        // notice the 'curviness' argument to this Bezier curve.  the curves on this page are far smoother
        // than the curves on the first demo, which use the default curviness value.
        Connector: [ "Bezier", { curviness: 50 } ],
        DragOptions: { cursor: "pointer", zIndex: 2000 },
        PaintStyle: { strokeStyle: color, lineWidth: 2 },
        EndpointStyle: { radius: 9, fillStyle: color },
        HoverPaintStyle: {strokeStyle: "#ec9f2e" },
        EndpointHoverStyle: {fillStyle: "#ec9f2e" },
        Container: "canvas"
    });

    // suspend drawing and initialise.
    instance.batch(function () {
        // declare some common values:
        var arrowCommon = { foldback: 0.7, fillStyle: color, width: 14 },
        // use three-arg spec to create two different arrows with the common values:
            overlays = [
                [ "Arrow", { location: 0.7 }, arrowCommon ],
                [ "Arrow", { location: 0.3, direction: -1 }, arrowCommon ]
            ];

        // add endpoints, giving them a UUID.
        // you DO NOT NEED to use this method. You can use your library's selector method.
        // the jsPlumb demos use it so that the code can be shared between all three libraries.
        var windows = jsPlumb.getSelector(".chart-demo .window");
        for (var i = 0; i < windows.length; i++) {
            instance.addEndpoint(windows[i], {
                uuid: windows[i].getAttribute("id") + "-bottom",
                anchor: "Bottom",
                maxConnections: -1
            });
            instance.addEndpoint(windows[i], {
                uuid: windows[i].getAttribute("id") + "-top",
                anchor: "Top",
                maxConnections: -1
            });
        }

        
        instance.connect({uuids: ["chartWindow3-bottom", "chartWindow6-top" ], overlays: overlays, detachable: true, reattach: true});
        instance.connect({uuids: ["chartWindow1-bottom", "chartWindow2-top" ], overlays: overlays});
        instance.connect({uuids: ["chartWindow1-bottom", "chartWindow3-top" ], overlays: overlays});
        instance.connect({uuids: ["chartWindow2-bottom", "chartWindow4-top" ], overlays: overlays});
        instance.connect({uuids: ["chartWindow2-bottom", "chartWindow5-top" ], overlays: overlays});

        instance.draggable(windows);

    });

    jsPlumb.fire("jsPlumbDemoLoaded", instance);
});
</script>

<div class="jtk-demo-canvas canvas-wide chart-demo jtk-surface jtk-surface-nopan" id="canvas">
    <?php foreach ($employees as $employee):?>
                <div class="window" id="employee<?php echo $employee->id;?>">
                    <?php echo $employee->getNameAttribute();?>
                </div>
                <?php endforeach;?>
            </div>