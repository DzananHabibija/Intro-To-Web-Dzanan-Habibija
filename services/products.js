function productFun(){
    $.ajax({
      url: 'http://localhost/Web-Project/backend/products/all', // staviti /products
      method: 'GET',
      headers: {
        "Authentication": Utils.get_from_localstorage("user").token
      },
      success: function(data) {
        console.log("The new data is:", data);
    
        // Prepare the data for the DataTable (assuming data is an array of user objects)
        var productData = data;
    
        // Access user data and create action buttons dynamically
        for (var i = 0; i < productData.length; i++) {
          var product = productData[i];
          console.log("Product ID:", product.id);
          console.log("Product Name:", product.productName);
    
          // Create action buttons based on user data (replace with your logic)
          var actionHtml = '<div class="btn-group" role="group" aria-label="Actions">' +
            '<button style="margin-right: 10px;" type="button" class="btn btn-warning" onClick="openEditNewModal(' + product.id + ')">Edit</button>' +
            '<button type="button" class="btn btn-danger" onClick="deleteUser(' + product.id + ')">Delete</button>' +
          '</div>';
          
          // (Optional) Add actionHtml to user object for further processing
          product.action = actionHtml;
        }
    
        // Initialize the DataTable with prepared user data
        initializeDatatable("#products-table", productData.data);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText);
      }
    });  
  }