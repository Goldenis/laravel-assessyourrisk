


 function startIntro () {
    var wheel = $('.wheel-container'),
        second = $('.intro-message'),
        logo = $('.logo');

    $('.intro').removeClass('out-up');
    $('.intro').css({opacity: 1});
    $('.right-column').removeClass('in');     
    $('.assessment').removeClass('in');

    //instantiate a TimelineLite    
    var tl = new TimelineLite();

    tl.from(wheel, 1, {opacity:0, scale:.5}, "+=.1");
    var wheelScale = 1.5;
    if($(window).width() < 768){
      wheelScale = .85;
    }
    tl.to(wheel, 2.5, {scale:wheelScale, ease:Expo.easeOut})
    tl.to(logo, .5, {opacity:1}, "+=0");
    tl.from(second, 0.5, {opacity:0}, "-=.2");

    //add a label 0.5 seconds later to mark the placement of the next tween
    tl.add("stagger", "+=0.2")
    //to jump to this label use: tl.play("stagger");

    tl.play();

  };
