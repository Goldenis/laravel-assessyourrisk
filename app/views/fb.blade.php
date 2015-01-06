<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FB</title>
<style>
body {
	margin: 0;
}

.faces {
	width: 1000px;
	height: 1000px;
	left: 0px;
	top: 0px;
	background-color: #ccc;
	position: absolute;
}
</style>
</head>
<body>

	<div class="fb-faces">
		
	</div>
	
	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>


	<script>

	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '753349004746465',
	      xfbml      : true,
	      version    : 'v2.2'
	    });
	    
	    for (var i=0; i<parsedData.length; i++) {
			var fbid = parsedData[i].id;
			var name = parsedData[i].name;
			FB.api(
			    "/" + fbid + "/picture",
			    {
			        "redirect": false,
			        "type": "normal"
			    },
			    function (response) {
			      if (response && !response.error) {
			        $('.fb-faces').append('<div><img src="' + response.data.url  + '"><br />' + name + '</div>');
			      }
			    }
			);
		}
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

	</script>

	<script type="text/javascript">
		var theData = '{{$json}}';
		var parsedData = JSON.parse(theData);
	</script>
</body>
</html>
