function customer(){


$(document).ready(function(){
    // When the document is ready, make an AJAX call
    $.ajax({
        url: 'http://localhost/Web-Project/backend/get_users.php', // URL to your API
        type: 'GET', // HTTP method (GET, POST, PUT, DELETE, etc.)
        dataType: 'html', // Expected data type
        headers: {
            "Authentication": Utils.get_from_localstorage("user").token
          },
        success: function(data) {
            console.log("Get users:",data)
            // Define the function outside the AJAX success callback
            // function reload_animals_datatable() {
            //     Utils.get_datatable(
            //         "#tutorials-table",S
            //         "http://localhost/Web-Project/backend/get_users.php", // Corrected URL
            //         [
            //             { data: "id" },
            //             { data: "username" },
            //             { data: "email" },
            //             { data: "password" },
            //             { data: "action"}
            //         ]
            //     );
            // }
            
            // Call the function inside the success callback
            //reload_animals_datatable();
        },
        error: function(xhr, status, error) {
            // This function will be called if there is an error with the AJAX request
            console.error('AJAX error: ', status, error);
        }
    });
}); }
