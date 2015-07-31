<?php
	var_dump(TX_SESSION_POST_TYPE);
	$myargs = array('post_type' => TX_SESSION_POST_TYPE);
	$myquery = new WP_Query( $myargs ); ?>		       
	<?php while($myquery->have_posts()): $myquery->the_post(); ?>         	

		<?php $session_time_form  = get_post_meta(get_the_ID(), 'session-time-from', true); ?>
		<?php the_title(); ?>
		

	 <?php endwhile;?>
