/*!
* Start Bootstrap - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

   // Code to execute if the specific page is loaded
/*    console.log("Specific page is loaded.");
    // Remove the button with the class "login"
  var loginButton = document.querySelector(".Login-button");
  if (loginButton) {
    loginButton.parentNode.removeChild(loginButton);
  }
  } */
 //V22

  // Function to remove the login button
// function removeLoginButton() {
//     var loginButton = document.querySelector('.Login-button');
//     if (loginButton) {
//       loginButton.parentNode.removeChild(loginButton);
//     }
//   }
  
//   // Function to add back the login button
//   function addLoginButton() {
//     // Check if the login button is already present
//     let loginButton = document.querySelector('.Login-button');
//     if (!loginButton) {
//       // Create the login button and append it to the navbar
//       var navbar = document.querySelector('.navbar');
//       if (navbar) {
//         // var button = document.createElement('button');
//         // button.textContent = "Login";
//         // button.className = 'Login-button';
//         navbar.appendChild(loginButton);
//       }
//     }
//   }
  
  // Execute actions based on the hash
  // if (window.location.hash === "#shoppingCart") {
  //   $('#userLogin').css({
  //     'display': 'none'
  //   } 
//   $(document).ready(function() {
//     if (window.location.hash === "#shoppingCart") {
//         $('#userLogin').css({
//           'display': 'none'
//         });
//     }
// });

// $(document).ready(function() {
//   // Function to check and hide userLogin based on hash change
//   function checkHash() {
//       if (window.location.hash === "#shoppingCart") {
//           $('#userLogin').css({
//             'display': 'none'
//           });
//       } else {
//           $('#userLogin').css({
//             'display': 'block'
//           });
//       }
//   }

//   // Check hash when the page loads
//   checkHash();

//   // Check hash whenever the hash changes
//   $(window).on('hashchange', function() {
//       checkHash();
//   });
// });

// if (window.location.hash === "#shoppingCart") {
//     console.log("Specific page is loaded.");
//     removeLoginButton();
//   } else {
//     console.log("Other page is loaded.");
//     addLoginButton();
//   } 
// Dylan Blue
  // function removeLoginButton() {
  //   var loginButton = document.querySelector('.Login-button');
  //   if (loginButton) {
  //     loginButton.classList.add('hidden');
  //   }
  // }
  
  // // Function to show the login button
  // function showLoginButton() {
  //   var loginButton = document.querySelector('.Login-button');
  //   if (loginButton) {
  //    loginButton.classList.add('visible');
  //   }
  // }
  
  // // Execute actions based on the hash
  // if (window.location.hash === "#shoppingCart") {
  //   console.log("Specific page is loaded.");
  //   removeLoginButton();
  // } else {
  //   console.log("Other page is loaded.");
  //   showLoginButton();
  // } 
// Function to remove the login button
function removeLoginButton() {
  $('.Login-button').hide(); // Hide the login button using jQuery
}
function removeProfileButton() {
  $('.profile-button').hide(); // Hide the login button using jQuery
}

// Function to add back the login button
function addLoginButton() {
  $('.Login-button').show(); // Show the login button using jQuery
}
function addProfileButton() {
  $('.profile-button').show(); // Show the login button using jQuery
}
$(document).ready(function() {
  // Check if the current page is the shopping cart page
  if (window.location.hash === "#shoppingCart") {
      removeLoginButton(); // Remove the login button if it's the shopping cart page
      addProfileButton();
  } else {
      addLoginButton(); // Add back the login button if it's not the shopping cart page
      removeProfileButton();
  }
  
  // Listen for hash changes (page navigation)
  $(window).on('hashchange', function() {
      // Check if the current page is the shopping cart page
      if (window.location.hash === "#shoppingCart") {
          removeLoginButton(); // Remove the login button if it's the shopping cart page
          addProfileButton();
      } else {
          addLoginButton(); // Add back the login button if it's not the shopping cart page
          removeProfileButton();
      }
  });
});


//odavde
  //Last try with GPT
//   // Wrap the code in a DOMContentLoaded event listener
// document.addEventListener("DOMContentLoaded", function() {
// // // //     // Function to remove the login button
//   function removeLoginButton() {
//       var loginButton = document.querySelector('.Login-button');
//         if (loginButton) {
//           loginButton.classList.add('hidden');
//             loginButton.classList.remove('visible');
//          }
//      }

// // // //     // Function to show the login button
//    function showLoginButton() {
//        var loginButton = document.querySelector('.Login-button');
//        if (loginButton) {
//            loginButton.classList.add('visible');
//            loginButton.classList.remove('hidden');
//        }
//     }

// // // //     // Execute actions based on the hash
//    if (window.location.hash === "#shoppingCart") {
//         console.log("Specific page is loaded.");
//         removeLoginButton();
//     } else {
//         console.log("Other page is loaded.");
//         showLoginButton();
//     }
// });
// dovde



// From Bing Copilot
// document.addEventListener('DOMContentLoaded', function () {
//     const loginButton = document.getElementById('Login-button');
//     if (window.location.hash === '#shoppingCart') {
//       loginButton.style.display = 'none'; // Hide the login button
//     } else {
//       loginButton.style.display = 'block'; // Show the login button for other pages
//     }
//   });




//Amila kod
// // Function to toggle login button visibility
// function toggleLoginButton(show) {
//   var loginBtn = document.getElementById('Login-button');
//   loginBtn.style.display = show ? 'block' : 'none';
// }



// Logic to determine which page is active
// function setActivePage(page) {
//   // Remove active class from all pages
//   document.querySelectorAll('nav ul li a').forEach(function(element) {
//     element.classList.remove('active');
//   });

//   // Add active class to the current page
//   document.getElementById(page).classList.add('active');

//   // Toggle login button visibility based on the page
//   if (page === 'login') {
//     toggleLoginButton(false); // Hide login button on login page
//   } else {
//     toggleLoginButton(true); // Show login button on other pages
//   }
// }

// // Event listeners for navigation links
// document.getElementById('aboutUs').addEventListener('click', function() {
//   setActivePage('aboutUs');
// });

// document.getElementById('contactUs').addEventListener('click', function() {
//   setActivePage('contact');
// });