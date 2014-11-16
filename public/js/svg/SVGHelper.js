function SVGHelper() {
	
}
SVGHelper.rgbToHex = function(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

SVGHelper.setAllRgb = function(a) {
    var i, n = a.length;
    for (i = 0; i < n; ++i) {
        a[i] = SVGHelper.hexToRgb(a[i]);
    }
}

SVGHelper.hexToRgbString = function(hex) {
	var obj = SVGHelper.hexToRgb(hex);
	return 'rgb(' + obj.r.toString() + ', ' + obj.g.toString() + ', ' + obj.b.toString() + ')' || null;
}

SVGHelper.rgbObjToRgbString = function(rgbObj) {
	return 'rgb(' + rgbObj.r.toString() + ', ' + rgbObj.g.toString() + ', ' + rgbObj.b.toString() + ')' || null;
}

SVGHelper.hexToRgb = function(hex) {
    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
        return r + r + g + g + b + b;
    });

    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}