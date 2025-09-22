  // Email JS
  function sendMail() {
    var params = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      message: document.getElementById("number").value,
      message: document.getElementById("address").value,
      message: document.getElementById("message").value,
    };
  
    const serviceID = "service_92xlg96";
    const templateID = "";
  
      emailjs.send(serviceID, templateID, params)
      .then(res=>{
          document.getElementById("name").value = "";
          document.getElementById("email").value = "";
          document.getElementById("number").value = "";
          document.getElementById("address").value = "";
          document.getElementById("message").value = "";
          console.log(res);
          alert("Your message sent successfully!!")
  
      })
      .catch(err=>console.log(err));
  
  }