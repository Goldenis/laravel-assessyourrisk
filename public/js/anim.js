


  $(document).ready(function() {

    var wheel = $('.wheel-container'),
        second = $('.intro-message'),
        logo = $('.logo');
     
    //instantiate a TimelineLite    
    var tl = new TimelineLite();

    tl.from(wheel, 2, {opacity:0, scale:.1}, "+=2.5");
    tl.from(logo, 1, {left:250, opacity:0});
    tl.from(second, 0.5, {top:-100, opacity:0}, "-=.5");

    //add a label 0.5 seconds later to mark the placement of the next tween
    tl.add("stagger", "+=0.5")
    //to jump to this label use: tl.play("stagger");

    tl.play();

  });
