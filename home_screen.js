
//redirects to login php
function redirect_login(){

	document.location.href = "login.php";
}

//redirects to logout
function redirect_logout(){
	document.location.href = "logout.php";
}


//brings user to useraccount page
function redirect_my_books(){
	document.location.href = "useraccount.php";
}

//displays outbook of books query
function retrieve_params(){

	console.log("Here..");
	//what is being searched
	var query_type = $('input[name=radio]:checked').val();
	var query_param = $('#search_input').val();
  if(query_param === ""){
    alert("Invalid input.");
    return;
  }
	//A POST request is sent to the
	//install.php file.
	$.ajax({
            type: "Post",
            url: "query_books.php",
            data: {"param_type": query_type, "query_string": query_param},
            dataType: "json",
            success: function(responseData, status){ //dynamically add buttons and information for each room to DOM
              console.log("Complete request");
              console.log("responseDate: " + responseData);
               var output = "";

               var curr_param_number = 1;

               var url = "search.php";

              for(var i = 0; i < responseData["Results"].length; ++i){

              	for(var j = 0; j < responseData["Results"][i].length; ++j){
              		 if (url.indexOf('?') === -1) {
				        url = url + '?param' + curr_param_number + "=" + responseData["Results"][i][j];  
				    }else {
				        url = url + '&param' + curr_param_number + "=" + responseData["Results"][i][j];
				    }

				    curr_param_number++;
              	}
              }


              window.location.href = url;

             console.log("Output: " + output);
              

              //Received data is placed within existing <p> tags.
             

              $(output).appendTo(document.getElementById("install"));

                

            }
    });

}