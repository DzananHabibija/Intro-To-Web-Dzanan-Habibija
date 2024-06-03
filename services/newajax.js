function callFun(){
  $.ajax({
    url: 'http://localhost/Web-Project/backend/users/all', // staviti /users
    method: 'GET',
    headers: {
      "Authentication": Utils.get_from_localstorage("user").token
    },
    success: function(data) {
      console.log("The new data is:", data);
  
      // Prepare the data for the DataTable (assuming data is an array of user objects)
      var userData = data;
  
      // Access user data and create action buttons dynamically
      for (var i = 0; i < userData.length; i++) {
        var user = userData[i];
        console.log("User ID:", user.id);
        console.log("Username:", user.username);
  
        // Create action buttons based on user data (replace with your logic)
        var actionHtml = '<div class="btn-group" role="group" aria-label="Actions">' +
          '<button style="margin-right: 10px;" type="button" class="btn btn-warning" onClick="openEditNewModal(' + user.id + ')">Edit</button>' +
          '<button type="button" class="btn btn-danger" onClick="deleteUser(' + user.id + ')">Delete</button>' +
        '</div>';
        
        // (Optional) Add actionHtml to user object for further processing
        user.action = actionHtml;
      }
  
      // Initialize the DataTable with prepared user data
      initializeDatatable("#tutorials-table", userData.data);
    },
    error: function(xhr, status, error) {
      // Handle errors
      console.error(xhr.responseText);
    }
  });  
}