function showPassSignin() {
  var x = document.getElementById("pass1");

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function showPassSignup() {
    var x = document.getElementById("pass1");
    var y = document.getElementById("pass2")
    if (x.type === "password" || y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
  