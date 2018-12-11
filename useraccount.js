



function search_for_books(){
	document.location.href = "index.php";
}

function transfer_ownership(id){
	var total_id = 'myModal' + id;
	var modal = document.getElementById(total_id);
	console.log("MODAL: " + modal);
	modal.style.display = "block";

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close");

	for(var i = 0; i < span.length; ++i){
		span[i].onclick = function() {
	    	modal.style.display = "none";
		}
	}
	// When the user clicks on <span> (x), close the modal
	// span.


	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

  
}



window.onload = function(){




}










$("#booksbtn").onclick = function(){
	document.location.href = "http://localhost/BookShare/index.php";
}

$(document).ready(function(){


	// $.ajax({
 //            type: "Post",
 //            url: "query_user_books.php",
 //            dataType: "json",
 //            success: function(responseData, status){ //dynamically add buttons and information for each room to DOM
 //              console.log("Complete request");
 //              console.log("responseDate: " + responseData);
 //               var output = "";


 //               var curr_param_number = 1;

 //               var url = "http://localhost/BookShare/search.php";

 //              for(var i = 0; i < responseData["Results"].length; ++i){
 //              	 output += "<tr>";
 //              	for(var j = 0; j < responseData["Results"][i].length; ++j){
 //              		output += "<th>" + responseData["Results"][i] + "</th>";
 //              	}
 //              	output+= "</tr>";
 //              }


             
             


	// 		    // $.ajax({
	// 		    //     type: "Post",
	// 		    //     url: "search.php",
	// 		    //     data: {"Results": responseData["Results"]},
	// 		    //     success: function(data){
			           
	// 		    //     }


	// 		    // });

			  



 //             console.log("Output: " + output);
              

 //              //Received data is placed within existing <p> tags.
             

 //              $(output).appendTo(document.getElementById("mybooks"));

                

 //            }
 //    });



});