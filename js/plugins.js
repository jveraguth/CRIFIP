$(document).ready(function(){
	var $masonry = jQuery('.filter');
	
	// initialize masonry
	$masonry.imagesLoaded(function(){
	  $masonry.masonry({
	    itemSelector: '.ff-items,.cat-post',
	    isResizable: false,
		isAnimated: true
	  });
	});
	
	var $masonry2 = jQuery('#mediaHomePost');

	// initialize masonry
	$masonry2.imagesLoaded(function(){
	  $masonry2.masonry({
	    itemSelector: 'article',
	    isResizable: true,
		isAnimated: true
	  });
	});

	var $masonry3 = jQuery('#articleFrame');

	// initialize masonry
	$masonry3.imagesLoaded(function(){
	  $masonry3.masonry({
	    itemSelector: '.card',
	    isResizable: true,
		isAnimated: true
	  });
	});
	

	// bind to resize
	$(window).resize(function(){
	  $masonry.masonry({});
	  $masonry2.masonry({});
	  $masonry3.masonry({});
	});		

	$(".dateForm li").lettering();

	$( '#cd-dropdown' ).dropdown( {
		gutter : 5
	});
});


			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}

			
var pieData = [
{
	value : 76,
	color : "#69D2E7"
},
{
	value : 14,
	color : "#CCC"
},
{
	value : 10,
	color : "#E0E4CC"
}			
];
var pieData2 = [
{
	value : 90,
	color : "#69D2E7"
},
{
	value : 10,
	color : "#E0E4CC"
}

];
var pieData3 = [
{
	value : 10,
	color : "#000000"
},
{
	value : 10,
	color : "#80B3FF"
},
{
	value : 20,
	color : "#FD6E8A"
},
{
	value : 20,
	color : "#A2122F"
},
{
	value : 25,
	color : "#693726"
}
			
];


	
var barChartData = {
			labels : ["PTSD","Dépression","Troubles","Alcool","Phobies","Total"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					data : [55,60,60,60,45,100],
					scaleStartValue : 0
				}				
			]
			
		};
		
var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					data : [65,59,90,81,56,55,40]
				},
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [28,48,40,19,96,27,100]
				}
			]
			
		}

	/*Modificaciones Jorge:
	* Aqui incluimos el inview para activar los elementos
	*
	*/

	//Prostitution
	var myPie = null;
	
	$('#canvas').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    if (visiblePartY == 'top') {
	    } else if (visiblePartY == 'bottom') {
	    } else {
	      if(myPie==null) 
	      {
	      	myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(pieData,{animationEasing: "easeInOutQuad",segmentStrokeColor: "#ffffff",segmentStrokeWidth: 1});
	      }
	    }
	  } else {
	  }
	});
	
	
	//Depression et autres
	var myPie3 = null;
	
	$('#canvas2').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    if (visiblePartY == 'top') {
	    	
	    } else if (visiblePartY == 'bottom') {
	      
	    } else {
	      
	      if(myPie3==null) 
	      {
	      	myPie3 = new Chart(document.getElementById("canvas2").getContext("2d")).Pie(pieData3,{animationEasing: "easeInOutQuad",segmentStrokeColor: "#ffffff",segmentStrokeWidth: 1});
	      }
	      
	    }
	  } else {
	  }
	});
	
	
	
	
	var myBar = null;
	
	$('#canvas5').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    // element is now visible in the viewport
	    if (visiblePartY == 'top') {
	      // top part of element is visible
	    	
	    } else if (visiblePartY == 'bottom') {
	      // bottom part of element is visible
	      
	    } else {
	      // whole part of element is visible
	      //Para apreciar de mejor forma la animación debe de crearse aqui, puesto que la animación
	      //se ve bien cuando todo el elemento es "visible"
	      
	      if(myBar==null) //en caso de que no haya animación, la creamos
	      {
	      	//no utilizar la palabra "var" para no reescribir de cero el objeto, si no usar el ya creado previamente.
	      	myBar = new Chart(document.getElementById("canvas5").getContext("2d")).Bar(barChartData,{animationEasing: "easeInOutQuad",barStrokeWidth: 1});
	      }
	      
	    }
	  } else {
	    // element has gone out of viewport
	  }
	});
	
	//Fybriomalgie
	var myPie2 = null;
	
	$('#canvas3').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    if (visiblePartY == 'top') {
	    } else if (visiblePartY == 'bottom') {
	    } else {
	      if(myPie2==null) 
	      {
	      	myPie2 = new Chart(document.getElementById("canvas3").getContext("2d")).Pie(pieData2,{animationEasing: "easeInOutQuad",segmentStrokeColor: "#ffffff",segmentStrokeWidth: 1});
	      }
	    }
	  } else {
	  }
	});
	
	var myLine=null;
	$('#canvas4').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
	  if (isInView) {
	    // element is now visible in the viewport
	    if (visiblePartY == 'top') {
	      // top part of element is visible
	      
	    } else if (visiblePartY == 'bottom') {
	    	
	    	
	      // bottom part of element is visible
	    } else {
	    
	    	//Repetir exactamente lo mismo que con el "Pie"
	    	if(myLine==null)
	    	{
	    	myLine = new Chart(document.getElementById("canvas3").getContext("2d")).Line(lineChartData);
	    	}
	      // whole part of element is visible
	    }
	  } else {
	    // element has gone out of viewport
	  }
	});
	/*Terminan modificaciones Jorge*/
			