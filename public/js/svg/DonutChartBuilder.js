/*
 * DonutChartBuilder.js v.1
 * Copyright (c) 2014 Nick Velloff, http://theexperiment.io
 * requires SVGHelper.js
 */
(function(window, document, undefined) {
	
	var defaults = {
		trg: 'body',
		thickness: 100,
		values: [1],
		colors: ['#ccc'],
		labels: [''],
		transitionType: false
//		svg_stroke_width : 0,
//		svg_stroke_opacity : 0,
//		svg_stroke_color : 0
	};
	
	/*
     * The exposed public object to create a chart:
     *
     * @param trg - String - #nodename
     * @param thickness - int
     * @param values - Array - values to be mapped to the chart
     * @param colors - Array - color values to be mapped to the chart
     * @param labels - Array - label values to be mapped to the chart
     * @param doTransitionIn - Bool - do or dont transition in arc
     */
	
	var DonutChartBuilder = function(trg, thickness, values, colors, labels, transitionType) {
		
		this._trg = trg || defaults.trg;
	    this._thickness = thickness || defaults.thickness;
	    this._values = values || defaults.values;
	    this._colors = colors || defaults.colors;
	    SVGHelper.setAllRgb(this._colors); // inline converts to RGB objects
	    this._labels = labels || defaults.labels;
	    this._transitionType = transitionType || defaults.transitionType;
	    this._width = $(this._trg).width();
	    this._height = $(this._trg).height();
	    this._radius = Math.min(this._width, this._height) / 2;
//	    this._svg_stroke_width = $(this._trg).css("svg-stroke-width") || defaults.svg_stroke_width;
//	    this._svg_stroke_opacity = $(this._trg).css("svg-stroke-opacity") || defaults.svg_stroke_opacity;
//	    this._svg_stroke_color = $(this._trg).css("svg-stroke-color") || defaults.svg_stroke_color;
	    
	    if (transitionType) {
	    	this.setupTransIn(); // working on transitions here
	    } else {
	    	this._process();
	    }
	};
	
	/*
     * @public
     * Update the dims on resize
     */

	DonutChartBuilder.prototype.setupTransIn = function()  {
		this._process();
	}
	
	/*
     * @public
     * Update the dims on resize
     */

	DonutChartBuilder.prototype.updateDims = function()  {
		this._width = $(this._trg).width();
	    this._height = $(this._trg).height();
	    this._radius = Math.min(this._width, this._height) / 2;
	    this._process();
	}
	
	/*
     * @public
     * 
     * @param values - Array - values to be mapped to the chart
 
     * Transition to values
     */

	DonutChartBuilder.prototype.transitionToValues = function(dur, thickness, values, colors)  {
		
		TweenLite.to(this, dur, {_thickness:thickness, onUpdate:this._process.bind(this)});
		TweenLite.to(this._values, dur, values);
		SVGHelper.setAllRgb(colors);
		for (var i=0; i<this._colors.length; i++) {
			var trg = this._colors[i];
			var rep = colors[i];
			TweenMax.to(trg, dur, {r:rep.r, g:rep.g, b:rep.b, roundProps:"r,g,b"});
		}
	}

	/*
     * @private
     * Processes the arc
     */

	DonutChartBuilder.prototype._process = function()  {
		$(this._trg).empty();
		
//		this._colorRange = d3.scale.ordinal().range(this._colors);
		
		this._arc = d3.svg.arc().outerRadius(this._radius).innerRadius(this._radius - this._thickness);
		this._pie = d3.layout.pie().sort(null).value(function(d) {
			return d.value;
		});
        
        this._svg = d3.select(this._trg).append("svg").attr("width",
        		this._width).attr("height", this._height).append("g").attr(
				"transform",
				"translate(" + this._width / 2 + "," + this._height / 2 + ")");
        
        this._data = this._getDataObj();
        this._g = this._svg.selectAll(".arc").data(this._pie(this._data)).enter().append("g").attr("class", "arc");

        this._g.append("path").attr("d", this._arc).style("fill",
			function(d, i) {
        		return SVGHelper.rgbObjToRgbString(d.data.color);
//        		return hexToRgbString(this._colors[i]);
//        		return this._colors[i];
//				return this._colorRange(d.data.value);
			}.bind(this));
//				.attr('stroke', this._svg_stroke_color)
//				.attr('stroke-width', this._svg_stroke_width)
//				.attr('stroke-opacity', this._svg_stroke_opacity);
        
        this._g.append("text").attr("transform", function(d) {
			return "translate(" + this._arc.centroid(d) + ")";
		}.bind(this)).attr("dy", ".35em").style("text-anchor", "middle")
				.text(function(d) {
					return d.data.label;
				});
    };
    
    DonutChartBuilder.prototype._getDataObj = function()  {
    	var d = [];
    	for (var i=0; i<this._values.length; i++) {
    		var a = {};
    		a.label = this._labels[i % this._labels.length];
    		a.value = this._values[i % this._values.length];
    		a.color = this._colors[i % this._colors.length];
    		d.push(a);
    	}
    	return d;
    }
	
	window.DonutChartBuilder = DonutChartBuilder;
	
})(window, document);