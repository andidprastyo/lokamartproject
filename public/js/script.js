function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  function showConfPassword() {
    var y = document.getElementById("confirm-password");
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
  }
  function changetext() {
    var x = document.getElementById("btnshow");
    if (x.innerHTML === '<i style="font-size: 16px" class="bx bxs-show"></i>') {
      x.innerHTML = '<i style="font-size : 16px" class="bx bxs-hide" ></i>';
    } else {
      x.innerHTML = '<i style="font-size: 16px" class="bx bxs-show"></i>';
    }
  }
  function changeconftext() {
    var y = document.getElementById("btnshowconf");
    if (y.innerHTML === '<i style="font-size: 16px" class="bx bxs-show"></i>') {
      y.innerHTML = '<i style="font-size : 16px" class="bx bxs-hide" ></i>';
    } else {
      y.innerHTML = '<i style="font-size: 16px" class="bx bxs-show"></i>';
    }
  }