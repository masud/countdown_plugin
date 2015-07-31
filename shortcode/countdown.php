<?php
 

function msd_countdown_functionality($attr, $content= null){
	
   $myargs = array('post_type' => MSD_COUNTDOWN);
   $myquery = new WP_Query( $myargs );     

 while($myquery->have_posts()): $myquery->the_post();  

     $msd_countdown_start  = get_post_meta(get_the_ID(), 'msd-countdown-date', true);
     $msd_countdown_bg_image  = get_post_meta(get_the_ID(), 'msd-countdown-image', true); 
    

     //$msd_countdown_start  = get_posts('msd-countdown-date');  
     $msd_countdown_start = date("Y/m/d", strtotime($msd_countdown_start));
  
  
  $default = array(
    'title'                  => 'Insert Your Title',
    'msd_countdown_start'    => $msd_countdown_start,
    'msd_countdown_bg_image' => $msd_countdown_bg_image
    
  );

  $data = shortcode_atts($default, $attr);
  $content = do_shortcode($content);

  
   
  return '<div class="row">
                <div class="col-md-12">
                    <div class="countdown-wrapper">
                        <div class="countdown-wrap">    
                          <img src="'.$msd_countdown_bg_image.'" />
                            <ul id="countdown" class="text-center">
                            <!-- days -->
                                <li>
                                    <span class="days">00</span>
                                    <p class="timeRefDays text-center">days</p>
                                </li>

                                <!-- hours -->
                                <li>
                                    <span class="hours">00</span>
                                    <p class="timeRefHours">hours</p>
                                </li>

                                <!-- minutes -->
                                <li>
                                    <span class="minutes">00</span>
                                    <p class="timeRefMinutes">minutes</p>
                                </li>

                                <!-- seconds -->
                                <li>
                                    <span class="seconds">00</span>
                                    <p class="timeRefSeconds">seconds</p>
                                </li>                                                      
                            </ul>                           
                        </div>
                    </div> <!--/#countdown-wrapper-->
                </div>
            </div>';
   endwhile;
}
add_shortcode('msd_countdown','msd_countdown_functionality');