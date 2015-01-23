  
$(function() {

      var modules = ['lifestyle','knowing','family']
      var userLoggedIn = false;

        getUserCount();
      
      // $( ".facebook.lifestyle" ).click(function() {
      //   alert('hello')
      //   var type = 'lifestyle';
      //   getLoginStatus(type);
      //   // getUserCount(type);
      // });
      // $( ".facebook.knowing" ).click(function() {
      //   var type = 'knowing';
      //   getLoginStatus(type);
      //   // getUserCount(type);
      // });
      // $( ".facebook.family" ).click(function() {
      //   var type = 'family';
      //   getLoginStatus(type);    
      //   // getUserCount(type);   
      // });



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
//            var uid = response.authResponse.userID;
//              var accessToken = response.authResponse.accessToken;
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
          refreshAllAvatars(type);
        }).fail(function(error) {
          console.log(error);
        });
      }

      
      function appendUser(uid, name, trg) {

        for (i=0; i<20; i++) {      
        var imgURL = "https://graph.facebook.com/" + uid + "/picture?type=large";
        //trg.append(name + '<br>');
          trg.append('<img src="' + imgURL + '">');
        }
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
      function refreshAllAvatars(type) {
        refreshAvatars('lifestyle');
        refreshAvatars('knowing');
        refreshAvatars('family');
        $('.fb-faces').addClass('in');
        $('.' + type).addClass('in');
      }

      function getUserCount() {
        
        resp = $.ajax({
          type : "GET",
          cache: false,
          //url : '/pledge/'+ type + '/count/',
          url : '/pledge/totals/count/',
          dataType: 'json'
        }).done(function(data) {improve their lifestyles.

        for (i=0; i<modules.length; i++) {
          console.log('pledges ' +data[modules[i]])
          if(i===0){
            pledgeMessage = "improve their lifestyles."
          }else if(i===1){
            pledgeMessage = "know their normal."
          }else if(i===2){
            pledgeMessage = "learn their family history."
          }
          $('.' +modules[i]+ '-pledge-number').html(data[modules[i]]+ "women have pledged to"+ pledgeMessage);
          }

        }).fail(function(error) {
          console.log(error);
        });
      }
      //refreshAllAvatars();
      
      //refreshAvatars('all'); ALL IS AVAILABLE IF NEEDED
      
      // TEST FB USERS (password 123)
      //ulbtsug_bharambesen_1420532521@tfbnw.net
      //bxskewo_alisonstein_1420532522@tfbnw.net
      //yfxnqxs_zuckerson_1420532521@tfbnw.net
      //fjbowfr_putnamberg_1420532522@tfbnw.net
    });