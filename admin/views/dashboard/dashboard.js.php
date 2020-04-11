<!-- page specific plugin scripts -->
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>

<script>
	function drawPieChart(placeholder, data, position) {
 	  $.plot(placeholder, data, {
		series: {
			pie: {
				show: true,
				tilt:0.8,
				highlight: {
					opacity: 0.25
				},
				stroke: {
					color: '#fff',
					width: 2
				},
				startAngle: 2
			}
		},
		legend: {
			show: true,
			position: position || "ne", 
			labelBoxBorderColor: null,
			margin:[-30,15]
		}
		,
		grid: {
			hoverable: true,
			clickable: true
		}
	 })
 }
</script>

<script type='text/javascript'>

//
var computerRevenue = 0;	
var phoneRevenue = 0;	
var accessoriesRevenue = 0;	
var cameraRevenue = 0;	
var totalRevenue  = 0;
$.getJSON( "json/revenue_statistics.json", function( data ) {
	computerRevenue = data.computer;	
	phoneRevenue = data.phone;
	accessoriesRevenue = data.accessories;
	cameraRevenue = data.camera;
	totalRevenue = computerRevenue+phoneRevenue+accessoriesRevenue+cameraRevenue;

	var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
	var data = [
		{ label: "máy tính",  data: parseInt(computerRevenue/totalRevenue*100), color: "#68BC31"},
		{ label: "điện thoại",data: parseInt(phoneRevenue/totalRevenue*100), color: "#2091CF"},
		{ label: "phụ kiện",  data: parseInt(accessoriesRevenue/totalRevenue*100), color: "#AF4E96"},
		{ label: "máy ảnh",   data: parseInt(cameraRevenue/totalRevenue*100), color: "#DA5430"},
	]
	drawPieChart(placeholder, data);
});
		
//
$('.sparkline').each(function(){
	var $box = $(this).closest('.infobox');
	var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
	$(this).sparkline('html',
					 {
						tagValuesAttribute:'data-values',
						type: 'bar',
						barColor: barColor ,
						chartRangeMin:$(this).data('min') || 0
					 });
});			
</script>
			
		