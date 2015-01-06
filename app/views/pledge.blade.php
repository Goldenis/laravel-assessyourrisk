<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FB</title>
<style>
body {
	margin: 0;
}

.pledge-btn {
	width: 200px;
	height: 100px;
	background-color: #aaa;
	position: relative;
	display: inline-block;
	text-align: center;
	font-size: medium;
}

.faces {
	margin-top: 5px;
	width: 200px;
	background-color: #ddd;
	display: inline-block;
	position: relative;
	vertical-align: top;
}


</style>
</head>
<body>
	
	<div class="holder">
		<button class="pledge-btn lifestyle">Pledge lifestyle</button>
		<button class="pledge-btn knowing">Pledge knowing</button>
		<button class="pledge-btn family">Pledge family</button>
		<br>
		<div class="faces lifestyle"></div>
		<div class="faces knowing"></div>
		<div class="faces family"></div>
	</div>
	
	<script type="text/javascript"
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	
	<!-- CLIENT SIDE FACEBOOK SDK INCLUSION -->
	<script type="text/javascript">
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '757106917704007',
	      xfbml      : true,
	      version    : 'v2.2',
	      cookie 	 : true,
	      status     : true
	    });
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

	</script>
	
	<!-- PLEDGE FUNCTIONALITY -->
	<script type="text/javascript">
		$(function() {

			var userLoggedIn = false;
			
			$( ".pledge-btn.lifestyle" ).click(function() {
				var type = 'lifestyle';
				getLoginStatus(type);
			});
			$( ".pledge-btn.knowing" ).click(function() {
				var type = 'knowing';
				getLoginStatus(type);
			});
			$( ".pledge-btn.family" ).click(function() {
				var type = 'family';
				getLoginStatus(type);
			});

			function getLoginStatus(type) {
				FB.getLoginStatus(function(response) {
					  if (response.status === 'connected') {
					    // the user is logged in and has authenticated the
					    // app, so we can skip login
					    // this flow can happen if user already pledged
					    console.log('status connected');
					    var uid = response.authResponse.userID;
					    var accessToken = response.authResponse.accessToken;
					    userLoggedIn = true;
					    saveRecord(type);
					    
					  } else if (response.status === 'not_authorized') {
					    // the user is logged in to Facebook, 
					    // but has not authenticated your app
					    console.log('status not_authorized');
					    userLoggedIn = true;
						logInUser(type);
					  } else {
					    // the user isn't logged in to Facebook.
					    console.log('status not logged in');
						logInUser(type);
					  }
				}, userLoggedIn); // this TRUE is to force a roundtrip to FB servers. 
			}

			function logInUser(type) {
				console.log('attempt logInUser', type);
				FB.login(function(response) {
					console.log('FB.login response', response);
					if (response.status == 'connected') {
						userLoggedIn = true;
// 						var uid = response.authResponse.userID;
// 					    var accessToken = response.authResponse.accessToken;
					    console.log('user connected, proceed');
					    saveRecord(type);
					} else {
						console.log('user declined, halt');
					}
				});
				return false;
			}
			
			var resp;
			function saveRecord(type) {
				resp = $.ajax({
					type : "POST",
					cache: false,
					url : "/pledge",
					dataType: 'json',
					data : {
						type : type
					}
				}).done(function(data) {
					console.log(data);
					refreshAllAvatars();
				}).fail(function(error) {
					console.log(error);
				});
			}

			
			function appendUser(uid, name, trg) {
				var imgURL = "https://graph.facebook.com/" + uid + "/picture?type=large";
				trg.append(name + '<br>');
			    trg.append('<img src="' + imgURL + '"><br>');
			}

			function refreshAvatars(type) {
				resp = $.ajax({
					type : "GET",
					cache: false,
					url : "/pledge/" + type,
					dataType: 'json'
				}).done(function(data) {
					var cls = '.faces.' + type;
					var trg = $(cls);
					trg.empty();
					for (id in data) {
						var user = data[id];
						appendUser(user.id, user.name, trg);
					}
				}).fail(function(error) {
					console.log(error);
				});
			}

			// Populates add 3 buckets
			function refreshAllAvatars() {
				refreshAvatars('lifestyle');
				refreshAvatars('knowing');
				refreshAvatars('family');
			}
			refreshAllAvatars();
			
			//refreshAvatars('all'); ALL IS AVAILABLE IF NEEDED
			
			// TEST FB USERS (password 123)
			//ulbtsug_bharambesen_1420532521@tfbnw.net
			//bxskewo_alisonstein_1420532522@tfbnw.net
			//yfxnqxs_zuckerson_1420532521@tfbnw.net
			//fjbowfr_putnamberg_1420532522@tfbnw.net
		});
	</script>
</body>
</html>
