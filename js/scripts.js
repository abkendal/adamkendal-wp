var app = {};

// Smooth scroll
app.smoothScroll = function() {
	 $('a[href*=#]').click(function() {
	     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
	     && location.hostname == this.hostname) {
	       var $target = $(this.hash);
	       $target = $target.length && $target
	       || $('[name=' + this.hash.slice(1) +']');
	       if ($target.length) {
	         var targetOffset = $target.offset().top;
	         $('html,body')
	         .animate({scrollTop: targetOffset}, 1000);
	        return false;
	       }
	     }
	   });
};

// Shifting gradient background
app.shiftingGradient = function() {
	 var colors = new Array(

	   [180,180,180], //Light grey
	   [170,170,170], //Mid grey
	   [160,160,160], //Dark grey
	   [255,255,255], //White
	   [255,255,255], //White
	   [255,255,255]); //White

	 var step = 0;
	 // current color left
	 // next color left
	 // current color right
	 // next color right
	 var colorIndices = [0,1,2,3];

	 // Transition speed
	 var gradientSpeed = 0.0040;

	 function updateGradient() {
	   
	   if ( $===undefined ) return;
	   
	 var c0_0 = colors[colorIndices[0]];
	 var c0_1 = colors[colorIndices[1]];
	 var c1_0 = colors[colorIndices[2]];
	 var c1_1 = colors[colorIndices[3]];

	 var istep = 1 - step;
	 var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
	 var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
	 var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
	 var color1 = "rgb("+r1+","+g1+","+b1+")";

	 var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
	 var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
	 var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
	 var color2 = "rgb("+r2+","+g2+","+b2+")";

	  $('body').css({
	    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
	     background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
	   
	   step += gradientSpeed;
	   if ( step >= 1 )
	   {
	     step %= 1;
	     colorIndices[0] = colorIndices[1];
	     colorIndices[2] = colorIndices[3];
	     

	     colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
	     colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
	     
	   }
	 }

	 setInterval(updateGradient,10);

	 //Inspiration from Marlo Hwang
	 //Original gradient script by Mario Klingemann 
}


// Show top left h2 only when scrolled past the h1
app.h2Display = function() {
	$('.header-h2 a').hide();
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 220) { 
	        $('.header-h2 a').show();
    	}
	});
	$(window).scroll(function() {
	    if ($(this).scrollTop() < 220) { 
	        $('.header-h2 a').hide();
    	}
	});

};

// Stabilize the menu position during scrolling
app.menuStabilize = function() {
	$(window).scroll(function() {
	    if ($(this).scrollTop() < 220) { 
	        $('.header-nav-container').css('top', '63px');
    	}
	});
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 220) { 
	        $('.header-nav-container').css('top', '14px');
    	}
	});
};


// Golden rectangle svg animation 
app.goldenRec = function() {
	$('#layer1').animate({opacity:1}, 600, function() {
		$('#layer1').animate({opacity:'0'}, 600);
		$('#layer2').animate({opacity:1}, 600, function(){
			$('#layer2').animate({opacity:'0'}, 600);
			$('#layer3').animate({opacity:1}, 600, function() {
				$('#layer1').css('opacity', ''); // So that the hover effect still works after animation
				$('#layer3').animate({opacity:'0'}, 600);
				$('#layer4').animate({opacity:1}, 600, function() {
					$('#layer2').css('opacity', '');
					$('#layer4').animate({opacity:'0'}, 600);
					$('#layer5').animate({opacity:1}, 600, function() {
						$('#layer3').css('opacity', '');
						$('#layer5').animate({opacity:'0'}, 600);
						$('#layer6').animate({opacity:1}, 600, function() {
							$('#layer4').css('opacity', '');
							$('#layer6').animate({opacity:'0'}, 600);
							$('#layer7').animate({opacity:1}, 600, function() {
								$('#layer5').css('opacity', '');
								$('#layer7').animate({opacity:'0'}, 600);
								$('#layer8').animate({opacity:1}, 600, function() {
									$('#layer6').css('opacity', '');
									$('#layer8').animate({opacity:'0'}, 600);
									$('#layer9').animate({opacity:1}, 600, function() {
										$('#layer7').css('opacity', '');
										$('#layer9').animate({opacity:'0'}, 600);
										$('#layer10').animate({opacity:1}, 600, function() {
											$('#layer8').css('opacity', '');
											$('#layer10').animate({opacity:'0'}, 600, function(){
												$('#layer9').css('opacity', '');
												$('#layer10').css('opacity', '');
												
											});
										});
									});
								});
							});
						});
					});
				});
			});
		});
	}); // End golden rec animation
};

// Golden rec on click animation 
app.goldenRecClick = function() {
	$('.jumbo-img').on('click', function() {
		app.goldenRec();
	}); 
};

// Golden rec animation on a timer
app.goldenRecInterval = function () {
	setInterval(app.goldenRec, 11000);
};


// Initialize functions
app.init = function (){
	app.smoothScroll();
	app.shiftingGradient();
	app.h2Display();
	app.menuStabilize();
	app.goldenRecClick();
	app.goldenRecInterval();
};

$(function(){
	app.init();
});
