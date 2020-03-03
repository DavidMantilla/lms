


	
	

$('#calendar').datepicker({
   
    multidate: true,
    daysOfWeekHighlighted: "0",
      format: "yyyy/mm/dd",
	weekStart: 0,
	
		});

$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });