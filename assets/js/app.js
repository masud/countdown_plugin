
jQuery(document).ready(function($){
   
    $('#countdownTimeFrom').datetimepicker();  

    //start countdown
      $("#countdown").countdown({
        date: msd_countdown_event_start, //set your date and time. EX: 15 May 2014 12:00:00
        format: "on"
      });
});




