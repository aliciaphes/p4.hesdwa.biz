//<?php header("Content-Type: application/javascript"); ?>
//<?php header("Content-Type: text/javascript"); ?>
$( document ).ready(function() {

	// PHP directives only work in .php files (or other files that the server has been configured to run through the PHP engine). If you want to generate JavaScript from PHP, then rename the file to have a .php extension (instead of a .js extension) and add (to the top of the script): <?php header("Content-Type: application/javascript"); ?>

	//var airports = "<?php if(defined('APP_PATH')) echo APP_PATH;?>";
	//console.log(airports);

	/*Cant you send the variable via a hidden input field and then grab that using Jquery??
	<input type="hidden" name="grab_var" value="<?php echo $var; ?/>" */

	//console.log($("#appPath").val());

	//use of AJAX for an autocompleter for the airport list using an external file in JSON
	$('.airport').autocomplete({



		source: function(request, response) {

			$.ajax({
				dataType: "JSON",
				url: "../data/airports.json",
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
//<?php echo '</script>'; ?>