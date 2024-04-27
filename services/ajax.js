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
          JSON.stringify(data);

          let html = "";

          //data && data.products.forEach(item => {

            // Opening container div
            html += '<div class="container">';

            // Opening row div
            html += '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center">';

            data.forEach(item => {
                
                let imageStyle = "";
                
                if (item.shouldApplyStyles) {
                    imageStyle = 'style="width:80%;align-self:center;"';
                }
                 let marginTop = "";
                if (item.shouldAddMargin){
                     marginTop = 'style="margin-top: 10px;"';
                 }
                // Card HTML
                html += `
                    <div class="col mb-4">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="${item.image}" ${imageStyle} ${marginTop} alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bold">${item.productName}</h5>
                                    <!-- Product price-->
                                    ${item.productPrice}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-3 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark" href="#product" target="_blank">View more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            // Closing row div
            html += '</div>';

            // Closing container div
            html += '</div>';

        // $(document).ready(function (){
        //     $(".card-body").hide();
        // });
        //document.getElementById("container").innerHTML = html;
    
        $("#maindiv").append(html);
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        },
    });
});