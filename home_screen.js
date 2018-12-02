

function retrieve_params(){

	console.log("Here..");
	var query_type = $('input[name=radio]:checked').val();
	var query_param = $('#search_input').val();
	// alert(query_param);
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

               var url = "http://localhost/BookShare/search.php";
               
              for(var i = 0; i < responseData["Results"].length; ++i){
              	// output += "<p>" + responseData["Results"][i] + "</p>" + "<br/>";
              	// output+="<br/>";
              	// output+="<br/>";
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
             


			    // $.ajax({
			    //     type: "Post",
			    //     url: "search.php",
			    //     data: {"Results": responseData["Results"]},
			    //     success: function(data){
			           
			    //     }


			    // });

			  



             console.log("Output: " + output);
              

              //Received data is placed within existing <p> tags.
             

              $(output).appendTo(document.getElementById("install"));

                

            }
    });

}