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

// ---- ---- Const ---- ---- //
const stars = document.querySelectorAll('.stars i');
const starsNone = document.querySelector('.rating-box');

// ---- ---- Stars ---- ---- //
stars.forEach((star, index1) => {
  star.addEventListener('click', () => {
    stars.forEach((star, index2) => {
      // ---- ---- Active Star ---- ---- //
      index1 >= index2
        ? star.classList.add('active')
        : star.classList.remove('active');
    });
  });
});

// const dropdown = document.querySelector('select');
// const radioInputs = document.querySelectorAll('input[type="radio"]');

// // Set initial placeholder text
// // dropdown.addEventListener('change', (event) => {
// //   const selectedOption = event.target.value;
// //   dropdown.options[0].text = selectedOption;
// // });

// Update placeholder text when a radio input is clicked
radioInputs.forEach((radioInput) => {
  radioInput.addEventListener('click', (event) => {
    const selectedOption = event.target.value;
    dropdown.options[0].text = selectedOption;
  });
});

