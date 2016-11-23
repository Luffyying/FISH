var width=500,height=
250,
margin ={left:50,top:30,right:20,bottom:20},
g_width = width-margin.left-margin.right,
g_height = height-margin.top-margin.bottom;
var data = [1,3,8,3,4,9,5,6];
//svg
var svg = d3.select('#container').append('svg:svg')
//add width and height
.attr('width',500)
.attr('height',250)
var g = d3.select('svg')
.append('g')
.attr('transform','translate('+margin.left+','+margin.top+ ')')
var scale_x = d3.scale.linear()
.domain([0,data.length-1])
.range([0,g_width]);
var scale_y = d3.scale.linear()
.domain([0,d3.max(data)])
.range([g_height,0]);
var area_generator = d3.svg.area()
.x(function(d,i){  
	return scale_x(i);
})//0,1,2,3,4,5
.y0(g_height)
.y1(function(d){
	return scale_y(d);

})//data
.interpolate('cardinal');
g.append('path')
.attr('d',area_generator(data))
.style('fill','steelblue')
var x_axis = d3.svg.axis().scale(scale_x),
y_axis = d3.svg.axis().scale(scale_y).orient('left');
g.append('g').call(x_axis)
.attr('transform','translate(0,'+g_height+')')
g.append('g')
.call(y_axis)
.append('text')
.text('price($)')
.attr('transform','rotate(-90)')
.attr('text-anchor','end')
.attr('dy','1em')
