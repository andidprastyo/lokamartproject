function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
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
