const redirect = () => {
    console.log('nesto: ', Utils.get_from_localstorage("user"))
    if (!(Utils.get_from_localstorage("user"))) {
        window.location = "http://localhost/Web-Project/#userLogin";
      } 
}