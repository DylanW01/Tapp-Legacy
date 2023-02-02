$('#formUserLogin').submit(function (event) {
  formData = $('#formUserLogin').serialize();

  event.preventDefault();

  //alert("Hello");

  $.ajax({
      type: "POST",
      url: "/src/db.php",
      data: formData + "&phpFunction=login",
      datatype: 'json',
      success: function (msg) {
        dataJson = JSON.parse(msg);
        if (dataJson['result'] == 'false') {
          $("#divMessage").html("Wrong username/password");
        } else {
          $("#divMessage").html("Logging in");
//          firstName = dataJson['Forename'];
//          lastName = dataJson['Surname'];
//          email = dataJson['email'];
//          accountType = dataJson['AccountType'];
//          sessionStorage.setItem('First_Name', lastName);
//          sessionStorage.setItem('Last_Name', lastName);
//          sessionStorage.setItem('email', email);
//          sessionStorage.setItem('Administator', admin);
          location.href = "admindashboard.html";
        }
      }
    }
  });
});
