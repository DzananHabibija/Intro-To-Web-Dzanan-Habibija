$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);


  var app = $.spapp({
    defaultView : "#home",
    templateDir : "./pages/",
    pageNotFound : false }); // initialize

  // define routes
  /*app.route({
    view: 'view_1',
    onCreate: function() { $("#view_1").append($.now()+': Written on create<br/>'); },
    onReady: function() { $("#view_1").append($.now()+': Written when ready<br/>'); }
  });
  app.route({
    view: 'view_2', 
    load: 'view_2.html' });
  app.route({
    view: 'view_3', 
    onCreate: function() { $("#view_3").append("I'm the third view"); }
  });*/

  app.route({
    view: "home",
    load: "home.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "product",
    load: "product.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "aboutUs",
    load: "aboutUs.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "contactUs",
    load: "contactUs.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "shoppingCart",
    load: "shoppingCart.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "userLogin",
    load: "userLogin.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "registration",
    load: "registration.html",
    onCreate: function() { },
    onReady: function() { }
  });

  app.route({
    view: "users-profile",
    load: "users-profile.html",
    onCreate: function() { },
    onReady: function() { }
  });



  // run app
  app.run();

});