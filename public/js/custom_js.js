//Stacked bar chart

new Chartist.Bar('#stacked-bar-chart', {
  labels: ['Sizzle', 'NMK ERP', 'Naturi', 'Clayton'],
  series: [
  [800000, 1200000, 1400000, 1300000],
  [200000, 400000, 500000, 300000],
  [160000, 290000, 410000, 600000]
  ]
}, {
  stackBars: true,
  axisY: {
    labelInterpolationFnc: function(value) {
      return (value / 1000) + 'k';
  }
},
plugins: [
Chartist.plugins.tooltip()
]
}).on('draw', function(data) {
  if(data.type === 'bar') {
    data.element.attr({
      style: 'stroke-width: 30px'
  });
}
});


//Animating a Donut with Svg.animate

var chart = new Chartist.Pie('#animating-donut', {
  series: [10, 20, 50, 20, 5, 50, 15],
  labels: ['Design', 'User Experience', 'User Experience', 'User Experience', 'User Experience', 'User Experience', 'User Experience']
}, {
  donut: true,
  showLabel: false,
  plugins: [
  Chartist.plugins.tooltip()
  ]
});

chart.on('draw', function(data) {
  if(data.type === 'slice') {
    // Get the total path length in order to use for dash array animation
    var pathLength = data.element._node.getTotalLength();

    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
    data.element.attr({
      'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
  });

    // Create animation definition while also assigning an ID to the animation for later sync usage
    var animationDefinition = {
      'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 1000,
        from: -pathLength + 'px',
        to:  '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
        fill: 'freeze'
    }
};

    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
    if(data.index !== 0) {
      animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
  }

    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
    data.element.attr({
      'stroke-dashoffset': -pathLength + 'px'
  });

    // We can't use guided mode as the animations need to rely on setting begin manually
    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
    data.element.animate(animationDefinition, false);
}
});

!function($) {
    "use strict";

    var MorrisCharts = function() {};
     //creates Donut chart
     MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true, //defaulted to true
            colors: colors
        });
    },

      //creates area chart with dotted
    MorrisCharts.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 3,
            lineWidth: 1,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors,
            xLabelFormat: function (xkey) { 
                console.log(xkey);
                var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                return months[xkey.getMonth()]; 
            }
        });
    },

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
        //creating donut chart
        var $donutData = [
            {label: "Not Engaged", value: 6},
            {label: "Actively Disengaged", value: 10},
            {label: "Engaged", value: 110}
        ];
        this.createDonutChart('morris-donut-example', $donutData, ['#ff8acc', '#5b69bc', "#10c469"]);

        //creating area chart with dotted
        var $areaDotData = [
            { y: '2016-01', a: 2, b: 1 },
            { y: '2016-02', a: 5,  b: 3 },
            { y: '2016-03', a: 3,  b: 1 },
            { y: '2016-04', a: 3,  b: 2 },
            { y: '2016-05', a: 6,  b: 4 },
            { y: '2016-06', a: 1,  b: 1 },
            { y: '2016-07', a: 2, b: 1 },
            { y: '2016-08', a: 2,  b: 1 },
            { y: '2016-09', a: 4,  b: 2 },
            { y: '2016-10', a: 3,  b: 1 },
            { y: '2016-11', a: 2,  b: 2 },
            { y: '2016-12', a: 5,  b: 3 }

        ];
        this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b'], ['Viran Fernando', 'Heshani Herath'],['#ffffff'],['#999999'], ['#5b69bc', "#35b8e0"]);

              //creating Stacked chart
        var $stckedData  = [
            { y: '2005', a: 45, b: 180 },
            { y: '2006', a: 75,  b: 65 },
            { y: '2007', a: 100, b: 90 },
            { y: '2008', a: 75,  b: 65 },
            { y: '2009', a: 100, b: 90 },
            { y: '2010', a: 75,  b: 65 },
            { y: '2011', a: 50,  b: 40 },
            { y: '2012', a: 75,  b: 65 },
            { y: '2013', a: 50,  b: 40 },
            { y: '2014', a: 75,  b: 65 },
            { y: '2015', a: 100, b: 90 }
        ];

        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#71b6f9', '#ebeff2']);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);


