


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

    tl.from(wheel, 1, {opacity:0, scale:.2}, "+=.1");
    if($(window).width() < 768){
        minS = .6;
    }else{
        minS = .8;
    }
    var wheelScale = Math.max(minS,1 * ($(window).width()/1024));
    // if($(window).width() <= 1024){
      
    // }
    // if($(window).width() <= 768){
    //   wheelScale = Math.min(1,($(window).width()/320) * .6);
    // }
    tl.to(wheel, 2, {scale:wheelScale, ease:Expo.easeOut})
    tl.to(logo, .5, {opacity:1}, "+=0");
    tl.from(second, 0.5, {opacity:0}, "-=.2");

    //add a label 0.5 seconds later to mark the placement of the next tween
    tl.add("stagger", "+=0.2")
    //to jump to this label use: tl.play("stagger");

    tl.play();

  };
