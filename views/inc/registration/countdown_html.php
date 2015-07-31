<form method='post'>
	<div class="wrap">
	<h2 class="countdown-setup">COUNTDOWN</h2>
		 <table class="form-table">			
			
			<div class='col-md-6'>
	            <div class="form-group">
	            <label for="countdownTimeFrom">COUNTDOWN</label>
	                <div class='input-group date' id='countdownTimeFrom'>
	                    <input type='text' value="<?php echo $msd_countdown_event_start; ?>" name="msd-countdown-date" class="form-control" />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
	            <div class="form-group">
	            <label for="countdownImage">COUNTDOWN IMAGE</label>
	                          
	                <input type="text" name="msd-countdown-image" type="text" id="msd-new-media-image" value="<?php echo $msd_countdown_bg_image; ?>" /> 
	                <div class="msd-new-countdown-button">	                 
	               	 <a href="#" class="msd-open-media btn btn-danger" >Image</a>  
               		</div>
	            </div>	            

	        </div>		 
		
		 </table>
		<button type ="submit" name="msd_countdown_submit" class="btn btn-success" role="button">Submit</button>	
	</div>
</form>
