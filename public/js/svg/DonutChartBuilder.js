/*
 * DonutChartBuilder.js v.1
 * Copyright (c) 2014 Nick Velloff, http://theexperiment.io
 * requires SVGHelper.js
 */
(function(window, document, undefined) {
	
	var defaults = {
		trg: 'body',
		thickness: 100,
		gap: 0,
		values: [1],
		colors: ['#ccc'],
		labels: [''],
		transitionType: false
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
	
	var DonutChartBuilder = function(trg, thickness, gap, values, colors, labels, transitionType) {
		
		this._trg = trg || defaults.trg;
	    this._thickness = thickness || defaults.thickness;
	    this._gap = gap || defaults.gap;
	    this._values = values || defaults.values;
	    this._colors = colors || defaults.colors;
	    SVGHelper.setAllRgb(this._colors); // inline converts to RGB objects
	    this._labels = labels || defaults.labels;
	    this._transitionType = transitionType || defaults.transitionType;
	    this._width = $(this._trg).width();
	    this._height = $(this._trg).height();
	    this._radius = Math.min(this._width, this._height) / 2;
	    this._accountForGap(values);
	    
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
	
	DonutChartBuilder.prototype._accountForGap = function(data)  {
		if (this._gap > 0) {
			var numSegments = data.length;
			var sumOfSegments = data.reduce(function(a, b) { return a + b; }, 0);
			var aValueDegree = sumOfSegments/360 * this._gap;
			data.forEach(function(entry) {
				entry -= aValueDegree;
			});
			for (var i=0; i<numSegments; i++) {
				data.splice(i*2, 0, aValueDegree);
			}
		}
	}
	
	/*
     * @public
     * 
     * @param values - Array - values to be mapped to the chart
 
     * Transition to values
     */

	DonutChartBuilder.prototype.transitionToValues = function(dur, thickness, values, colors)  {
		
		if (thickness) TweenLite.to(this, dur, {_thickness:thickness});
		if (values) {
			this._accountForGap(values);
			TweenLite.to(this._values, dur, values);
		}
		if (colors) {
			SVGHelper.setAllRgb(colors);
			for (var i=0; i<this._colors.length; i++) {
				var trg = this._colors[i];
				var rep = colors[i];
				TweenMax.to(trg, dur, {r:rep.r, g:rep.g, b:rep.b, roundProps:"r,g,b"});
			}
		}
		TweenLite.to(this, dur, {onUpdate:this._process.bind(this)});
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
        this._g = this._svg.selectAll(".arc")
        			.data(this._pie(this._data))
        			.enter().append("g")
        			.attr("class", "arc");

        this._g.append("path")
        .attr("d", this._arc).style("fill",
			function(d, i) {
        		return SVGHelper.rgbObjToRgbString(d.data.color);
//				return this._colorRange(d.data.value);
			}.bind(this))
		.attr('fill-opacity', 
			function(d, i) {
				if (this._gap > 0) {
					return i%2;
				} else {
					return 1;
				}
			}.bind(this))
		.attr('stroke-opacity', 0);
        
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