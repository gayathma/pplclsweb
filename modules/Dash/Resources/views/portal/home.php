<style>

.node {
  cursor: pointer;
}

.node:hover {
  stroke: #000;
  stroke-width: 1.5px;
}

.node--leaf {
  fill: white;
}

.label {
  font: 11px "Helvetica Neue", Helvetica, Arial, sans-serif;
  text-anchor: middle;
  text-shadow: 0 1px 0 #fff, 1px 0 0 #fff, -1px 0 0 #fff, 0 -1px 0 #fff;
}

.label,
.node--root,
.node--leaf {
  pointer-events: none;
}


svg:not(:root) {
    overflow-x: hidden !important;
}
</style>

<script src="<?php echo asset('plugins/d3/d3.v3.min.js') ?>"></script>
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-bg-color-icon card-box fadeInDown animated">
        <div class="bg-icon bg-icon-info pull-left">
            <i class="md md-people text-info"></i>
        </div>
        <div class="text-right">
            <h3 class="text-dark"><b class="counter"><?php echo count($employees);?></b></h3>
            <p class="text-muted">Total Employees</p>
        </div>
        <div class="clearfix"></div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
      <div class="widget-bg-color-icon card-box">
          <div class="bg-icon bg-icon-pink pull-left">
              <i class="md md-layers text-pink"></i>
          </div>
          <div class="text-right">
              <h3 class="text-dark"><b class="counter"><?php echo count($projects);?></b></h3>
              <p class="text-muted">Total Projects</p>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>
</div>
<center id="center"></center>

<script>

var margin = 20,
    diameter = 960;


var color = d3.scale.linear()
    .domain([-1, 5])
    .range(["hsl(152,80%,80%)", "hsl(228,30%,40%)"])
    .interpolate(d3.interpolateHcl);

var pack = d3.layout.pack()
    .padding(2)
    .size([diameter - margin, diameter - margin])
    .value(function(d) { return d.size; })

var svg = d3.select("#center").append("svg")
    .attr("width", diameter)
    .attr("height", diameter)
    .attr("style", 'overflow-x:hidden')
  .append("g")
    .attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

d3.json("flare.json", function(error, root) {
  if (error) throw error;

  var focus = root,
      nodes = pack.nodes(root),
      view;

  var circle = svg.selectAll("circle")
      .data(nodes)
    .enter().append("circle")
      .attr("class", function(d) { return d.parent ? d.children ? "node" : "node node--leaf" : "node node--root"; })
      .style("fill", function(d) { return d.children ? color(d.depth) : null; })
      .on("click", function(d) { if (focus !== d) zoom(d), d3.event.stopPropagation(); });

  var text = svg.selectAll("text")
      .data(nodes)
    .enter().append("text")
      .attr("class", "label")
      .style("fill-opacity", function(d) { return d.parent === root ? 1 : 0; })
      .style("display", function(d) { return d.parent === root ? "inline" : "none"; })
      .text(function(d) { return d.name; });

  var node = svg.selectAll("circle,text");

  d3.select("#center")
      .on("click", function() { zoom(root); });

  zoomTo([root.x, root.y, root.r * 2 + margin]);

  function zoom(d) {
    var focus0 = focus; focus = d;

    var transition = d3.transition()
        .duration(d3.event.altKey ? 7500 : 750)
        .tween("zoom", function(d) {
          var i = d3.interpolateZoom(view, [focus.x, focus.y, focus.r * 2 + margin]);
          return function(t) { zoomTo(i(t)); };
        });

    transition.selectAll("text")
      .filter(function(d) { return d.parent === focus || this.style.display === "inline"; })
        .style("fill-opacity", function(d) { return d.parent === focus ? 1 : 0; })
        .each("start", function(d) { if (d.parent === focus) this.style.display = "inline"; })
        .each("end", function(d) { if (d.parent !== focus) this.style.display = "none"; });
  }

  function zoomTo(v) {
    var k = diameter / v[2]; view = v;
    node.attr("transform", function(d) { return "translate(" + (d.x - v[0]) * k + "," + (d.y - v[1]) * k + ")"; });
    circle.attr("r", function(d) { return d.r * k; });
  }
});

d3.select(self.frameElement).style("height", diameter + "px");
d3.select("#center").attr("align","center");
</script>





<script type="text/javascript">
//menu active
$('#dash_menu').addClass('active');



</script>
