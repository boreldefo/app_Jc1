const headerMobileButton = document.querySelector(".header-mobile-icon");
const validateregister1 = document.querySelector(".validateregister1");
const retourregister1 = document.querySelector(".retourregister1");
const headerMobileList = document.querySelector(".header-mobile-list");
const body_content = document.querySelector("body");

const formventekilo = document.querySelectorAll("#formventekilo");
const formregister = document.querySelector("#formregister");
const formregister1 = document.querySelector(".formregister1");
const formregister2 = document.querySelector(".formregister2");
const formlogin = document.querySelector("#formlogin");
const formforgetpassword = document.querySelector("#formforgetpassword");
const firstname = document.querySelector("#firstname"); //
const lastname = document.querySelector("#lastname");
const emailregister = document.querySelector("#emailregister");
const emaillogin = document.querySelector("#emaillogin");
const emailforgetpassword = document.querySelector("#emailforgetpassword");
const passwordregister = document.querySelector("#passwordregister");
const passwordlogin = document.querySelector("#passwordlogin");
const confirmpassword = document.querySelector("#confirmpassword");

const AuthInput = document.querySelectorAll(".container-input");
const formaction = document.querySelectorAll(".form-actions");
const AuthLabel = document.querySelectorAll(".show-label");
const input = document.querySelector("input");
const error = document.querySelectorAll(".error");
var inputphone = document.querySelector("#telephone");

let passwordValue = "";
// evenements
headerMobileButton.addEventListener("click", () => {
  headerMobileList.classList.toggle("show");
});

if (formforgetpassword) {
  formforgetpassword.emailforgetpassword.addEventListener("click", function () {
    formaction[0].style.display = "block";
  });

  formforgetpassword.emailforgetpassword.addEventListener(
    "change",
    function () {
      formaction[0].style.display = "block";
      validForgetpassword(this);
    }
  );
}
if (formlogin) {
  input.focus();
  formlogin.emaillogin.addEventListener("change", function () {
    validEmaillogin(this);
  });
  formlogin.passwordlogin.addEventListener("change", function () {
    validPasswordlogin(this);
  });
}
if (formregister) {
  formregister.firstname.addEventListener("change", function () {
    error[0].style.display = "none";
    error[1].style.display = "none";
    error[2].style.display = "none";
    error[3].style.display = "none";
    error[4].style.display = "none";
    validFirstname(this);
  });
  formregister.lastname.addEventListener("change", function () {
    validLastname(this);
  });
  formregister.email.addEventListener("change", function () {
    validEmail(this);
  });
  formregister.password.addEventListener("change", function () {
    validPassword(this);
  });
  formregister.confirmpassword.addEventListener("change", function () {
    validConfirmPassword(this);
  });

  validateregister1.addEventListener("click", function () {
    formregister1.style.display = "none";
    formregister2.style.display = "block";
  });
  retourregister1.addEventListener("click", () => {
    formregister2.style.display = "none";
    formregister1.style.display = "block";
  });
}

//fonctions

const validFirstname = function (inputFirstname) {
  if (!inputFirstname.value) {
    let message = "veuillez renseigner ce champs";
    SetError(firstname, message);
  } else if (!inputFirstname.value.match(/^[a-zA-Z]/)) {
    let message = "ce champs doit commencer par une lettre";
    SetError(firstname, message);
  } else {
    let letterNum = inputFirstname.value.length;
    if (letterNum < 2) {
      let message = "ce champs est trop petit";
      SetError(firstname, message);
    } else {
      setSucess(firstname);
      error[0].style.display = "none";
    }
  }
};

const validLastname = function (inputLastname) {
  if (!inputLastname.value) {
    let message = "veuillez renseigner ce champs";
    SetError(lastname, message);
  } else if (!inputLastname.value.match(/^[a-zA-Z]/)) {
    let message = "ce champs doit commencer par une lettre";
    SetError(lastname, message);
  } else {
    let letterNum = inputLastname.value.length;
    if (letterNum < 2) {
      let message = "ce champs est trop petit";
      SetError(lastname, message);
    } else {
      setSucess(lastname);
      error[1].style.display = "none";
    }
  }
};
const validEmail = function (inputEmail) {
  let emailRegExp = new RegExp(
    "^[a-z0-9._-]+[@]{1}[a-z0-9._-]+[.]{1}[a-z]{2,10}$",
    "g"
  );
  if (!inputEmail.value) {
    let message = "veuillez renseigner ce champs";
    SetError(emailregister, message);
  } else if (!emailRegExp.test(inputEmail.value)) {
    let message = "l'email n'est pas valide";
    SetError(emailregister, message);
  } else {
    setSucess(emailregister);
    error[2].style.display = "none";
  }
};
const validEmaillogin = function (inputEmail) {
  let emailRegExp = new RegExp(
    "^[a-z0-9._-]+[@]{1}[a-z0-9._-]+[.]{1}[a-z]{2,10}$",
    "g"
  );
  if (!inputEmail.value) {
    let message = "veuillez renseigner ce champs";
    SetError(emaillogin, message);
  } else if (!emailRegExp.test(inputEmail.value)) {
    let message = "l'email n'est pas valide";
    SetError(emaillogin, message);
  } else {
    setSucess(emaillogin);
    error[0].style.display = "none";
  }
};
const validForgetpassword = function (inputEmail) {
  let emailRegExp = new RegExp(
    "^[a-z0-9._-]+[@]{1}[a-z0-9._-]+[.]{1}[a-z]{2,10}$",
    "g"
  );
  if (!inputEmail.value) {
    let message = "veuillez renseigner ce champs";
    SetError(emailforgetpassword, message);
  } else if (!emailRegExp.test(inputEmail.value)) {
    let message = "l'email n'est pas valide";
    SetError(emailforgetpassword, message);
  } else {
    setSucess(emailforgetpassword);
    error[0].style.display = "none";
    formaction[0].style.display = "block";
  }
};
const validPassword = function (inputPassword) {
  passwordValue = inputPassword.value;
  let passwordRegExp = new RegExp(
    "^(?=.*[0-9])(?=.*[!@#%^&*])[a-zA-Z0-9!@#%^&*]{8,12}$"
  );
  if (!inputPassword.value) {
    let message = "veuillez renseigner ce champs";
    SetError(passwordregister, message);
  } else if (!passwordRegExp.test(inputPassword.value)) {
    let message =
      "le mot de passe est trop faible (au moins 1lettre, 1chiffre, et 1 carrectère spécial)";
    SetError(passwordregister, message);
  } else {
    setSucess(passwordregister);
    error[3].style.display = "none";
  }
};
const validPasswordlogin = function (inputPassword) {
  passwordValue = inputPassword.value;
  let passwordRegExp = new RegExp(
    "^(?=.*[0-9])(?=.*[!@#%^&*])[a-zA-Z0-9!@#%^&*]{8,12}$"
  );
  if (!inputPassword.value) {
    let message = "veuillez renseigner ce champs";
    SetError(passwordlogin, message);
  } else if (!passwordRegExp.test(inputPassword.value)) {
    let message = "mot de passe invalide";
    SetError(passwordlogin, message);
  } else {
    setSucess(passwordlogin);
    error[1].style.display = "none";
  }
};
const validConfirmPassword = function (inputConfirmPassword) {
  if (!inputConfirmPassword.value) {
    let message = "veuillez renseigner ce champs";
    SetError(confirmpassword, message);
  } else if (inputConfirmPassword.value !== passwordValue) {
    let message = "les mots de passe ne correspondent pas";
    SetError(confirmpassword, message);
  } else {
    setSucess(confirmpassword);
    error[4].style.display = "none";
  }
};

function SetError(elem, message) {
  const containerInput = elem.parentElement;
  const formControl = containerInput.parentElement;
  const small = formControl.querySelector("small");

  small.innerText = message;
  formControl.className = "form-control danger";
}

function setSucess(elem) {
  const containerInput = elem.parentElement;
  const formControl = containerInput.parentElement;
  const small = formControl.querySelector("small");

  small.innerText = "";
  if (formregister) {
    formControl.className = "form-control sucess";
  }
  if (formlogin) {
    formControl.className = "form-control";
  }
  if (formforgetpassword) {
    formControl.className = "form-control";
    formaction[0].style.display = "block";
  }
}

const body = document.querySelector("body");

if (formregister) {
  AuthInput[0].addEventListener("change", () => {
    AuthInput[0].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[0].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });
  AuthInput[1].addEventListener("change", () => {
    AuthInput[1].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[1].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });
  AuthInput[2].addEventListener("change", () => {
    AuthInput[2].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[2].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });

  AuthInput[3].addEventListener("change", () => {
    AuthInput[3].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[3].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });
  AuthInput[4].addEventListener("change", () => {
    AuthInput[4].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[4].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });
}

if (formlogin) {
  AuthInput[0].addEventListener("change", () => {
    AuthInput[0].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[0].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });
  AuthInput[1].addEventListener("change", () => {
    AuthInput[1].style.backgroundColor = "#F5FEFF";
    setTimeout(() => {
      AuthLabel[1].style.display = "block";
    }, 120);
    input.setAttribute("placeholder", "");
  });
}
// body.addEventListener("click", () => {
//   AuthInput.style.backgroundColor = "#fff";
//   setTimeout(() => {
//     AuthLabel.style.display = "none";
//   }, 120);
// });

//register jscode

var searchInput = "searchdepart";
var searchInput2 = "searcharrivee";

$(document).ready(function () {
  var autocomplete1;
  autocomplete1 = new google.maps.places.Autocomplete(
    document.getElementById(searchInput),
    {
      types: ["geocode"],
    }
  );

  google.maps.event.addListener(autocomplete1, "place_changed", function () {
    var near_place = autocomplete1.getPlace();
  });

  var autocomplete2;
  autocomplete2 = new google.maps.places.Autocomplete(
    document.getElementById(searchInput2),
    {
      types: ["geocode"],
    }
  );

  google.maps.event.addListener(autocomplete2, "place_changed", function () {
    var near_place2 = autocomplete2.getPlace();
  });
});
