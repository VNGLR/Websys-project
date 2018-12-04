


//if user wants to search for books, redirect them to the main search page
function search_for_books(){
	document.location.href = "index.php";
}
// if the user wants to lend a book, pass on possession to someone else
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


});