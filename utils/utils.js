var Utils = {
    init_spapp : function(){
        var app = $.spapp({
            templateDir: "../pages/",
          });
          app.run();
    }
}