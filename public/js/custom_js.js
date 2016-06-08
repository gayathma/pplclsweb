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


