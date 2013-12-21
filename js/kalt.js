
$( document ).ready(function() {

	$(".hidden").hide();


	$("#clearForm").click(function() {

		$("#userEdit [id^='input']:visible").val("");

	}); 


	$(".thanks").click(function(e) {

        $(this).effect( "bounce", {times:2}, 300 );

	}); 



	if($("#upcomingTitle").is(":visible")){

		$("#tripsIndex").animate({
				height: "toggle"
			}, 500);	
	}


	if($("#historyTitle").is(":visible")){

		$("#tripsHistory").animate({
				height: "toggle"
			}, 500);	
	}



	$("[name^='row']").click(function() {

	    return confirm("Are you sure you want to delete this record?");
	});




	//use of AJAX for an autocompleter for the airport list using an external file in JSON
	$('.airport').autocomplete({

		source: function(request, response) {

			$.ajax({
				dataType: "JSON",
				url: "/data/airports.json",
				minLength: 3,
				success: function(results){
					var items = [];
					$.each(results, function (index, value) {
						if(value.type == "Airports"
							&& (value.name).toLowerCase().indexOf(request.term.toLowerCase()) >= 0){
							items.push(value.name);
					}    
				    });//end each
					
					response(items);

				}//end of success

			});//end of ajax call

		},


	});//end of autocomplete

}); //end of file
