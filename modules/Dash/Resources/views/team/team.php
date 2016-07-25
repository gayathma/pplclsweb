
<link href="<?php echo asset('css/netjsongraph.css')?>" rel="stylesheet">
<link href="<?php echo asset('css/netjsongraph-theme.css')?>" rel="stylesheet">
<style type="text/css">

#network-graph{
	width: 1000px;
	height: 800px;
	margin: 0 auto;
	border: 1px solid #ccc;
}
</style>
<div class="row">
	<div id="network-graph"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script src="<?php echo asset('js/netjsongraph.js') ?>"></script>
<script>
d3.netJsonGraph({
	"type": "NetworkGraph",
	"label": "Ninux Roma",
	"protocol": "OLSR",
	"version": "0.6.6.2",
	"metric": "ETX",
	"nodes": [
	{
		"id": "172.16.146.6"
	},
	{
		"id": "10.177.0.10"
	},
	{
		"id": "172.16.139.4"
	},
	],
	"links": [
	{
		"source": "172.16.146.6",
		"target": "172.16.139.4",
	},
	{
		"source": "172.16.139.4",
		"target": "10.177.0.10",
	}
	]
}, {
	el: "#network-graph",
	circleRadius: 30,
	linkDistance: 200,
});
</script>