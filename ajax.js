$(document).ready(function () {
    $.ajax({
        url: "products.json",
        method: "GET", // You can change this to POST, PUT, DELETE, etc. depending on your API endpoint
        dataType: "json", // Specify the data type you expect back from the server
        // data: {
        //   // If you need to send any data with the request, you can include it here
        //   key1: "value1",
        //   key2: "value2"
        // },
        success: function(data) {
          // This function will be called if the request is successful
          //console.log("Success:", data);
          $("#maindiv").empty();
         // data = JSON.parse(data);
          let html = "";
          data.forEach((item) => {
            
            html += `<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/samsung.png" alt="Samsung Galaxy A53" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Samsung Galaxy A53</h5>
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
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/pc.png" style="width:80%;align-self:center;" alt="PC" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">ASUS - ROG Gaming Desktop</h5>
                            <!-- Product reviews-->
                            <!--<div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div> -->
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$900.00</span>
                            $750.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/smartwatch-Photoroom.png-Photoroom.png" style="width: 75%;align-self: center; margin-top: 10px;" alt="SmartWatch" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Xiaomi Redmi Watch 4</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$250.00</span>
                            $200.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/laptop.png-Photoroom.png" style="width: 120%; align-self: center; margin-top: 10px;" alt="Laptop" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Lenovo ThinkPad T560</h5>
                            <!-- Product reviews-->
                            
                            <!-- Product price-->
                            $400.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <!--<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div> -->
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/macbook-Photoroom.png-Photoroom.png" style="margin-top: 15px; align-self: center;" alt="MacBook Air" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Apple MacBook Air 13</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$1200.00</span>
                            $999.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/lenovo M10 .png-Photoroom.png" style="margin-left: 10px;" alt="Lenovo M10 Pro" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Lenovo M10 Pro</h5>
                            <!-- Product price-->
                            $800.00 
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/iphone.png-Photoroom.png" style="align-self: center;" alt="Apple iPhone 15" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Apple iPhone 15</h5>
                            <!-- Product reviews-->
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$850.00</span>
                            $750.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#product" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="pictures/monitor.png-Photoroom.png" style="margin-top: 15px; width: 110%; align-self: center;" alt="Monitor" />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Acer V227Q LED Monitor</h5>
                            <!-- Product reviews-->
                            <!-- Product price-->
                            $300.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="product.html" target="_blank">View more</a></div>
                    </div>
                </div>
            </div>
        </div>`;

        // $(document).ready(function (){
        //     $(".card-body").hide();
        // });
        //document.getElementById("container").innerHTML = html;
    
        $("#maindiv").append(html);

        //$("#maindiv").show();

        
          });
        },
        error: function(xhr, status, error) {
          // This function will be called if there's an error with the request
          console.error("Error:", error);
          // You can handle the error here, such as displaying a message to the user
        },
      });
});