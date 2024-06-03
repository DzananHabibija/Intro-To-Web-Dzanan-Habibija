function adminFun(){
    $.ajax({
      url: 'http://localhost/Web-Project/backend/admins/all', // staviti /products
      method: 'GET',
      headers: {
        "Authentication": Utils.get_from_localstorage("user").token
      },
      success: function(data) {
        console.log("The new data is:", data);
    
        // Prepare the data for the DataTable (assuming data is an array of user objects)
        var adminData = data;
    
        // Access user data and create action buttons dynamically
        for (var i = 0; i < adminData.length; i++) {
          var admin = adminData[i];
          console.log("Admin ID:", admin.id);
          console.log("Admin Name:", admin.name);
    
          // Create action buttons based on user data (replace with your logic)
          var actionHtml = '<div class="btn-group" role="group" aria-label="Actions">' +
            '<button style="margin-right: 10px;" type="button" class="btn btn-warning" onClick="openEditAdminModal(' + admin.id + ')">Edit</button>' +
            '<button type="button" class="btn btn-danger" onClick="deleteAdmin(' + admin.id + ')">Delete</button>' +
          '</div>';
          
          // (Optional) Add actionHtml to user object for further processing
          admin.action = actionHtml;
        }
    
        // Initialize the DataTable with prepared user data
        initializeDatatableAdmin("#admins-table", adminData.data);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText);
      }
    });  
  }