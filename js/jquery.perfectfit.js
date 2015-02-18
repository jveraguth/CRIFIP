/**
 * PerfectFit v1.0.2
 *
 * An easy to use plugin to make any text fit a container, and is responsive!
 * 
 * official website http://betacoding.net
 *
 * Plugin released under GPL v2.0 license
 * May be used for commercial use
 *
 * Copyright 2013 Jorge Villalobos 
 */

(function( $ ){

  $.fn.perfectFit = function(def_container) {
  
    //declare object
  	$this = $(this);

    //first make $this width a full 100%
    $this.css({width:'100%'})

  	/* Get the parent container, this will be the first div element or tag with the class "container"
  	 * in case an specific container is defined the contaier will be the specified container, 
  	 * defined containers will be an jQuery object
  	 */
    var container_box;
  
  	if(typeof def_container !='undefined')
  	{container_box = $(def_container)}
  	else
  	{
  		//search div
  		parent = $this.parent();
    
  		while(true)
  		{ 		  
  			if(parent.is('div'))
  				{ container_box=  $(parent)
            break;
          }
  			else
  			{
          temp=parent;
  				parent = temp.parent();
          continue;
  			}
  			//check errors
        container_box = $this.parent();
  		}
    }

    prev_size = 5; //size starts at 1px
        act_size = 6; //next increment would be 3px

        //Get width and height of the container
        cont_w = $(container_box).width()
        cont_h = $(container_box).height()
		
		//resize to a minimum font size
		text_size = ''+prev_size+'px'
		$this.css('font-size',text_size)
	
          while(true)
          {
           
            
            w =$this.width();
            h =$this.height();
            if(h <= cont_h && w < cont_w)
            {
             text_size = ''+prev_size+'px'
             $this.css('font-size',text_size)
             
              prev_size=act_size;

              act_size+=2;
              
            }
            else 
            { 
              break;
            } 
            
          }
          

}

})( jQuery );
