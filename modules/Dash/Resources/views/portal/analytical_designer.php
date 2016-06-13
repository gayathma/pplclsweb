<div class="row">
 <div class="col-md-3">
    <aside id="sidebar" class="nano">
        <div class="nano-content">
            <div class="menu-segment">
                <ul class="labels list-unstyled">
                    <li class="title">Charts </li>
                    <li><a href="#"><img  src="\images\charts\stats.png" width="75%"/></a></li>
                    <li><a href="#"><img  src="\images\charts\pie-chart.png" width="75%"/></a></li>
                    <li><a href="#"><img  src="\images\charts\pyramid-chart.png" width="75%"/></a></li>
                </ul>
            </div>
            <div class="bottom-padding"></div>
        </div>
    </aside>
</div> <!-- end col -->
<div class="col-md-9">

    <div class="row">
        <div class="col-lg-12">
            <div class="project-sort">
                <div class="project-sort-item">
                    <form class="form-inline">
                        <div class="form-group">
                            <label>Y :</label>
                            <select class="form-control">
                                <option>All Projects</option>
                                <option>All Employees</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>X :</label>
                            <select class="form-control">
                                <option>Year</option>
                                <option>Name</option>
                                <option>End date</option>
                                <option>Start Date</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <a class="icon circle-icon glyphicon glyphicon-refresh" title="Refresh"></a>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div><!-- end col-->
    </div><!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">Analysis</h4>
                <div id="morris-bar-stacked" style="height: 450px;"></div>

            </div>
        </div><!-- end col-->
    </div><!-- end row -->
</div>
</div>

<script type="text/javascript">
//menu active
$('#dynamics_main_menu').addClass('active');
$('#analytic_sub_menu').addClass('active');

!function($) {
    "use strict";

    var MorrisCharts = function() {};

    //creates Stacked chart
    MorrisCharts.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },

    MorrisCharts.prototype.init = function() {

        //creating Stacked chart
        var $stckedData  = [
        { y: '2005', a: 10},
        { y: '2006', a: 15},
        { y: '2007', a: 12},
        { y: '2008', a: 24 },
        { y: '2009', a: 20},
        { y: '2010', a: 32},
        { y: '2011', a: 28},
        { y: '2012', a: 15},
        { y: '2013', a: 22},
        { y: '2014', a: 24},
        { y: '2015', a: 30},
        { y: '2016', a: 36}
        ];

        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a'], ['Projects Count'], ['#35b8e0']);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);



</script>