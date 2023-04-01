function verifyOTP() {
    var inputOTP = document.getElementById("otp").value;
    if (inputOTP === "") {
      document.getElementById("message").innerHTML = "Please enter OTP";
    } else if (inputOTP.length !== 6 || isNaN(inputOTP)) {
      document.getElementById("message").innerHTML = "OTP should be 6 digits";
    } else {
      document.getElementById("message").innerHTML = "OTP verified!";
      // You can add your own code here to redirect the user to the next page or perform some other action
    }
  }
  