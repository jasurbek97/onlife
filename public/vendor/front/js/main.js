document.body.onload = function() {

	setTimeout(function() {
		var preloader = document.getElementById('page-preloader');
		if( !preloader.classList.contains('done') ) {
			preloader.classList.add('done');
		};
	}, 750);

}


$( () => {
	
	//On Scroll Functionality
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 20 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
		windowTop > 100 ? $('ul').css('top','100px') : $('ul').css('top','160px');
	});

	

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.top-div').addClass('top-div-sec') : $('.top-div').removeClass('top-div-sec');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.tss-label_pic').addClass('blue') : $('.tss-label_pic').removeClass('blue');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.tss-label').addClass('mt-any') : $('.tss-label').removeClass('mt-any');
	});

	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 30 ? $('.tss--close').addClass('white') : $('.tss--close').removeClass('white');
	});

	
	//Click Logo To Scroll To Top
	$('#logo').on('click', () => {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Smooth Scrolling Using Navigation Menu
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 95
		},500);
		e.preventDefault();
	});
	
	
});

var swiper = new Swiper('.myslider1', {
	slidesPerView: 3,
	spaceBetween: 30,
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	navigation: {
        nextEl: '.my-button-next',
        prevEl: '.my-button-prev',
      },

	breakpoints: {
		1024: {
			slidesPerView: 3,
			spaceBetween: 40,
		},
		768: {
			slidesPerView: 3,
			spaceBetween: 30,
		},
		640: {
			slidesPerView: 2,
			spaceBetween: 20,
		},
		320: {
			slidesPerView: 1,
			spaceBetween: 10,
		}
	},
	loop: true,

});

var swiper = new Swiper('.myslider2', {
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	navigation: {
        nextEl: '.my-button-next2',
        prevEl: '.my-button-prev2',
      },
      loop: true,


});

var config = {
	elementID: 'touchSideSwipe',
            elementWidth: 300, //px
            elementMaxWidth: 0.8, // *100%
            sideHookWidth: 44, //px
            moveSpeed: 0.5, //sec
            opacityBackground: 0.5,
            shiftForStart: 50, // px
            windowMaxWidth: 1024, // px
        }
        var touchSideSwipe = new TouchSideSwipe(config);

/*
 * Demo of https://github.com/isuttell/sine-waves
 */

 var waves = new SineWaves({
 	el: document.getElementById('waves'),

 	speed: 3,

 	width: 700,

 	height: 400,

 	ease: 'SineinOut',

 	wavesWidth: '100%',
  /*waves: [
   
    {
      timeModifier: 1,
      lineWidth: 4,
      amplitude: -80,
      wavelength: 40
    },
    {
      timeModifier: 0.5,
      lineWidth: 4,
      amplitude: -100,
      wavelength: 70
    }
    ],*/
    waves: [
    {
    	timeModifier: 4,
    	lineWidth: 1,
    	amplitude: -25,
    	wavelength: 25
    },
    {
    	timeModifier: 2,
    	lineWidth: 2,
    	amplitude: -50,
    	wavelength: 50
    },
    {
    	timeModifier: 1,
    	lineWidth: 1,
    	amplitude: -100,
    	wavelength: 100
    },
    {
    	timeModifier: 0.5,
    	lineWidth: 1,
    	amplitude: -200,
    	wavelength: 200
    },
    {
    	timeModifier: 0.25,
    	lineWidth: 2,
    	amplitude: -400,
    	wavelength: 400
    }
    ],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#007700");
  	gradient.addColorStop(0.2,"#7fa3d4");
  	gradient.addColorStop(0.4,"#dc6c29");
  	gradient.addColorStop(0.6,"#e4b727");
  	gradient.addColorStop(0.8,"#ff7159");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});


 var waves = new SineWaves({
 	el: document.getElementById('waves2'),

 	speed: 3,

 	width: 700,

 	height: 400,

 	ease: 'SineinOut',

 	wavesWidth: '100%',
  /*waves: [
   
    {
      timeModifier: 1,
      lineWidth: 4,
      amplitude: -80,
      wavelength: 40
    },
    {
      timeModifier: 0.5,
      lineWidth: 4,
      amplitude: -100,
      wavelength: 70
    }
    ],*/
    waves: [

    {
    	timeModifier: 2,
    	lineWidth: 2,
    	amplitude: -50,
    	wavelength: 50
    },
    {
    	timeModifier: 0.5,
    	lineWidth: 3,
    	amplitude: -150,
    	wavelength: 100
    },
    ],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#ff7159");
  	gradient.addColorStop(0.5,"#108906");
  	gradient.addColorStop(1,"#ff7159");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});


 var waves = new SineWaves({
 	el: document.getElementById('waves3'),

 	speed: 2,

 	width: 700,

 	height: 400,

 	ease: 'SineinOut',

 	wavesWidth: '150%',
  /*waves: [
   
    {
      timeModifier: 1,
      lineWidth: 4,
      amplitude: -80,
      wavelength: 40
    },
    {
      timeModifier: 0.5,
      lineWidth: 4,
      amplitude: -100,
      wavelength: 70
    }
    ],*/
    waves: [

    {
    	timeModifier: 2,
    	lineWidth: 2,
    	amplitude: -50,
    	wavelength: 50
    },
    {
    	timeModifier: 0.25,
    	lineWidth: 1,
    	amplitude: -200,
    	wavelength: 200
    }
    ],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#007700");
  	gradient.addColorStop(0.2,"#7fa3d4");
  	gradient.addColorStop(0.4,"#dc6c29");
  	gradient.addColorStop(0.6,"#e4b727");
  	gradient.addColorStop(0.8,"#ff7159");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});

 var waves = new SineWaves({
 	el: document.getElementById('waves4'),

 	speed: 2,

 	width: 1000,

 	height: 700,

 	ease: 'SineinOut',

 	wavesWidth: '100%',
  /*waves: [
   
    {
      timeModifier: 1,
      lineWidth: 4,
      amplitude: -80,
      wavelength: 40
    },
    {
      timeModifier: 0.5,
      lineWidth: 4,
      amplitude: -100,
      wavelength: 70
    }
    ],*/
    waves: [

    {
    	timeModifier: 3,
    	lineWidth: 3,
    	amplitude: -50,
    	wavelength: 50
    },
    {
 		timeModifier: 0.5,
 		lineWidth: 3,
 		amplitude: -100,
 		wavelength: 80
 	}
    ],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#007700");
  	gradient.addColorStop(0.2,"#7fa3d4");
  	gradient.addColorStop(0.4,"#dc6c29");
  	gradient.addColorStop(0.6,"#e4b727");
  	gradient.addColorStop(0.8,"#ff7159");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});





 var waves = new SineWaves({
 	el: document.getElementById('waves5'),

 	speed: 2,

 	width: 1000,

 	height: 700,

 	ease: 'SineinOut',

 	wavesWidth: '100%',
 	waves: [

 	{
 		timeModifier: 1,
 		lineWidth: 3,
 		amplitude: -200,
 		wavelength: 200
 	},
 	{
 		timeModifier: 0.5,
 		lineWidth: 3,
 		amplitude: -100,
 		wavelength: 100
 	}
 	],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#ff7159");
  	gradient.addColorStop(0.5,"#108906");
  	gradient.addColorStop(1,"#ff7159");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});


 var waves = new SineWaves({
 	el: document.getElementById('waves6'),

 	speed: 5,

 	width: 1000,

 	height: 250,

 	ease: 'SineinOut',

 	wavesWidth: '150%',
 	waves: [

 	{
 		timeModifier: 0.5,
 		lineWidth: 3,
 		amplitude: -50,
 		wavelength: 30
 	},
 	{
 		timeModifier: 0.5,
 		lineWidth: 2,
 		amplitude: -80,
 		wavelength: 50
 	}
 	],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#f4f4f4");
  	gradient.addColorStop(0.5,"#f4f4f4");
  	gradient.addColorStop(1,"#f4f4f4");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});


 var waves = new SineWaves({
 	el: document.getElementById('waves-preloader'),

 	speed: 5,

 	width: 1000,

 	height: 500,

 	ease: 'SineinOut',

 	wavesWidth: '70%',
  /*waves: [
   
    {
      timeModifier: 1,
      lineWidth: 4,
      amplitude: -80,
      wavelength: 40
    },
    {
      timeModifier: 0.5,
      lineWidth: 4,
      amplitude: -100,
      wavelength: 70
    }
    ],*/
    waves: [
    {
    	timeModifier: 4,
    	lineWidth: 1,
    	amplitude: -25,
    	wavelength: 25
    },
    {
    	timeModifier: 2,
    	lineWidth: 2,
    	amplitude: -50,
    	wavelength: 50
    },
    {
    	timeModifier: 1,
    	lineWidth: 1,
    	amplitude: -100,
    	wavelength: 100
    }
    ],

  // Called on window resize
  resizeEvent: function() {
  	var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
  	gradient.addColorStop(0,"#007700");
  	gradient.addColorStop(0.2,"#7fa3d4");
  	gradient.addColorStop(0.4,"#dc6c29");
  	gradient.addColorStop(0.6,"#e4b727");
  	gradient.addColorStop(0.8,"#ff7159");


  	var index = -1;
  	var length = this.waves.length;
  	while(++index < length){
  		this.waves[index].strokeStyle = gradient;
  	}

    // Clean Up
    index = void 0;
    length = void 0;
    gradient = void 0;
}
});

 (function($) {
	var dialog;
	$('.trigger').on('click', function() {
		dialog = $('#' + $(this).data('dialog'));
		$(dialog).addClass('dialog--open');
	});
	$('.action, .dialog__overlay').on('click', function() {
		$(dialog).removeClass('dialog--open');
		$(dialog).addClass('dialog--close');
		$(dialog).find('.dialog__content').on('webkitAnimationEnd MSAnimationEnd oAnimationEnd animationend', function() {
			$(dialog).removeClass('dialog--close');
		});
	});

	var res_menu;
	$('.hamburger').on('click', function() {
		$('.').addClass('myborder-radius');
	});






	$('.dialogEffects').on('click', function(e) {
		e.preventDefault();
		$('.dialogEffects').removeClass('selected');
		$(this).addClass('selected');
		var cssClass = $(this).data('class');
		$('#dialogEffects').removeAttr('class').addClass(cssClass);
	});
})(jQuery);