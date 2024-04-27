$(document).ready(function () {
getPosts = () => {
    // Through the library called JQuery
    $.get(products.json, (data) => { // Callback function
      let output = "";
      data.forEach((product) => {
        output += `
        <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="pictures/samsung.png" alt="Samsung Galaxy A53" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">${products.productName}</h5>
                    <!-- Product price-->
                    $359.00
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
            </div>
        </div>
    </div>
                  `;
      });
      document.getElementById("container").innerHTML = output;
    });
  }
} );

getPosts();
