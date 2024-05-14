var UserService = [

    Constants.API_BASE_URL + "getnewusers.php", // get_patients.php
    [
      { data: "id" },
      { data: "username" },
      { data: "email" },
      { data: "password" },
      { data: "action" },
    ],

    function open_edit_user_modal (user_id) {
        RestClient.get("users/" + user_id, function (data) {
          $("#add-patient-modal").modal("toggle");
          $("#add-patient-form input[name='id']").val(data.id);
          $("#add-patient-form input[name='first_name']").val(data.first_name);
          $("#add-patient-form input[name='last_name']").val(data.last_name);
          $("#add-patient-form input[name='email']").val(data.email);
          $("#add-patient-form input[name='created_at']").val(data.created_at);
        });
      },

      function openEditModal(user_id) {
        // Populate the modal with user data
        // For now, let's just show the modal
        RestClient.get("get_user.php?id=" + user_id, function (data) {
          console.log("The data inside modal came and it is: ", data);
        $('#exampleModal').modal('show');
        $("#project-form input[name='id']").val(data.id);
        $("#project-form input[name='username']").val(data.username);
        $("#project-form input[name='password']").val(data.password);
      });
      },



      function deleteUser(userId) {
        // Populate the modal with user data
        // For now, let's just show the modal
       // $('#editUserModal').modal('show');
        if(confirm("Do you really want to delete this user?")) {
            RestClient.delete(
              "users/delete/" + userId, // previously: "/delete_user.php?id=" + userId,
              {},
              function(data) {
                console.log("User with ",userId," is deleted successfully");
                // var updatedUsers = users.filter(function(user) {
                //         return user.id !== userId;
                //     });
                    // Update local storage with the updated user data
                    // var index = users.findIndex(function(user) {
                    //     return user.id === userId;
                    // });
                    // // Remove the user from the array
                    // if (index !== -1) {
                    //     users.splice(index, 1);
                    // }
                    // localStorage.setItem('userData', JSON.stringify(updatedUsers));
                    // // Reload DataTable with the updated user data
                    // initializeDatatable("#tutorials-table", users);
              },
            function(error) {
                // Handle error response
                console.error("Error deleting user:", error);
                // Optionally, display the error message to the user
                alert("An error occurred while deleting the user. Please try again later.");
            }
          );
      }
    }
]