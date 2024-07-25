const formventekiloInputretour = document.querySelectorAll(
  "#formventekiloretour input"
);
const container_ventekilo = document.querySelectorAll(".container-ventekilo");
const formventekiloSearchicon = document.querySelectorAll(
  "#formventekilo .fa-solid.fa-magnifying-glass"
);
const formventekilodeleteicon = document.querySelectorAll("#formventekilo svg");
const formventekiloretour1 = document.querySelector(".formventekiloretour1");
const formventekiloretour2 = document.querySelector(".formventekiloretour2");
const formventekiloretour3 = document.querySelector(".formventekiloretour3");

const alertspan1 = document.querySelectorAll(".ventekilo-control > span");

const retour6 = document.querySelector(".retour6");
const retour7 = document.querySelector(".retour7");

const continuerretour1 = document.querySelector(".continuerretour1");
const continuerretour2 = document.querySelector(".continuerretour2");

const nbrekilo = document.querySelectorAll(".nbrekilo > i");
const inputnbrekilo = document.querySelector(".nbrekilo > input");
const inputprixkilo = document.querySelector(".prixkilo > input");
const prixkilo = document.querySelectorAll(".prixkilo > i");

const recommandationprix = document.querySelector(".recommandationprix > span");
const recommandationprixtext = document.querySelector(
  ".recommandationprix > p"
);

/*errors */
const errordate = document.querySelector(".errordate");
const erroradress1 = document.querySelector(".erroradress1");
const erroradress2 = document.querySelector(".erroradress2");
const errornbrekilo = document.querySelector(".errornbrekilo");
const errorprixkilo = document.querySelector(".errorprixkilo");
const idemadress = document.querySelector(".idemadress");
const formventekiloretour = document.querySelector("#formventekiloretour");

//*get cookie */
function getCookie(name) {
  const cookies = document.cookie.split("; ");
  const value = cookies.find((c) => c.startsWith(name))?.split("=")[1];
  if (value == undefined) {
    return null;
  }
  return decodeURIComponent(value);
}
let max_prix = parseFloat(getCookie("prix_max"));
let min_prix = parseFloat(getCookie("prix_min"));

inputprixkilo.value = (max_prix + min_prix) / 2;
inputprixkilo.value = inputprixkilo.value + " €";

/*incremantation decrementation des kilos */
let k = parseFloat(inputnbrekilo.value);
inputnbrekilo.focus();
inputnbrekilo.addEventListener("input", () => {
  k = parseFloat(inputnbrekilo.value);
});
nbrekilo[0].addEventListener("click", () => {
  if (k >= 1) {
    k--;
    inputnbrekilo.value = k.toString() + " kg";
  }
});
nbrekilo[1].addEventListener("click", () => {
  k++;
  inputnbrekilo.value = k.toString() + " kg";
});
/*incrementation decrementation du prix unitaire*/
let p = parseFloat(inputprixkilo.value);
inputprixkilo.focus();

inputprixkilo.addEventListener("input", () => {
  p = parseFloat(inputprixkilo.value);

  if (p >= min_prix && p <= max_prix + max_prix * 0.1) {
    recommandationprix.style.backgroundColor = "#32ff7e";
  }
  if (p > max_prix + max_prix * 0.1 && p <= max_prix + max_prix * 0.2) {
    recommandationprix.style.backgroundColor = "#ff9f1a";
    recommandationprixtext.innerHTML =
      "<p>Pensez à baisser le prix sur ce trajet. Les acheteurs trouveront des prix Kilos moins chers que les votre </p>";
  }
  if (p < min_prix) {
    recommandationprix.style.backgroundColor = "#ff9f1a";
    recommandationprixtext.innerHTML =
      " <p>Pensez à augmenter le prix pour un meilleur partage des frais. Vous aurez des passagers en un rien de temps !</p>";
  }
  if (p > max_prix + max_prix * 0.2) {
    recommandationprix.style.backgroundColor = "#ff3838";
    recommandationprixtext.innerHTML =
      "<p>Le prix est trop cher. vous trouverez difficilement les achéteurs </p>";
  }
});
prixkilo[0].addEventListener("click", () => {
  if (parseInt(p) > 0) {
    p--;
    inputprixkilo.value = p.toString() + "€";
  }
  if (p >= min_prix && p <= max_prix + max_prix * 0.1) {
    recommandationprix.style.backgroundColor = "#32ff7e";
  }
  if (p > max_prix + max_prix * 0.1 && p <= max_prix + max_prix * 0.2) {
    recommandationprix.style.backgroundColor = "#ff9f1a";
    recommandationprixtext.innerHTML =
      "<p>Pensez à baisser le prix sur ce trajet. Les acheteurs trouveront des prix Kilos moins chers que les votre </p>";
  }
  if (p < min_prix) {
    recommandationprix.style.backgroundColor = "#ff9f1a";
    recommandationprixtext.innerHTML =
      " <p>Pensez à augmenter le prix pour un meilleur partage des frais. Vous aurez des passagers en un rien de temps !</p>";
  }
  if (p > max_prix + max_prix * 0.2) {
    recommandationprix.style.backgroundColor = "#ff3838";
    recommandationprixtext.innerHTML =
      "<p>Le prix est trop cher. vous trouverez difficilement les achéteurs </p>";
  }
});
prixkilo[1].addEventListener("click", () => {
  p++;
  inputprixkilo.value = p.toString() + "€";
  if (p >= min_prix && p <= max_prix + max_prix * 0.1) {
    recommandationprix.style.backgroundColor = "#32ff7e";
  }
  if (p > max_prix + max_prix * 0.1 && p <= max_prix + max_prix * 0.2) {
    recommandationprix.style.backgroundColor = "#ff9f1a";
    recommandationprixtext.innerHTML =
      "<p>Pensez à baisser le prix sur ce trajet. Les acheteurs trouveront des prix Kilos moins chers que les votre </p>";
  }
  if (p < min_prix) {
    recommandationprix.style.backgroundColor = "#ff9f1a";
    recommandationprixtext.innerHTML =
      " <p>Pensez à augmenter le prix pour un meilleur partage des frais. Vous aurez des passagers en un rien de temps !</p>";
  }
  if (p > max_prix + max_prix * 0.2) {
    recommandationprix.style.backgroundColor = "#ff3838";
    recommandationprixtext.innerHTML =
      "<p>Le prix est trop cher. vous trouverez difficilement les achéteurs </p>";
  }
});

retour6.addEventListener("click", () => {
  retour6.style.display = "none";
  formventekiloretour2.style.display = "none";
  formventekiloretour1.style.display = "block";
  errordate.style.display = "none";
  // formventekilo4.style.display = "none";
  // continuer3.style.display = "block";
  // retour2.style.display = "block";
});
retour7.addEventListener("click", () => {
  formventekiloretour3.style.display = "none";
  formventekiloretour2.style.display = "block";
  errornbrekilo.style.display = "none";
  retour7.style.display = "none";
  retour6.style.display = "block";
  // formventekilo1.style.display = "none";
  // formventekilo4.style.display = "block";
  // formventekilo5.style.display = "none";
  // continuer4.style.display = "block";
  // retour3.style.display = "block";
  // errornbrekilo.style.display = "none";
});

// retour5.addEventListener("click", () => {
//   retour5.style.display = "none";
//   formventekilo1.style.display = "none";
//   formventekilo5.style.display = "block";
//   formventekilo6.style.display = "none";
//   continuer3.style.display = "block";
//   retour4.style.display = "block";
//   errorprixkilo.style.display = "none";
// });
continuerretour1.addEventListener("click", () => {
  if (formventekiloInputretour[0].value) {
    formventekiloretour1.style.display = "none";
    formventekiloretour2.style.display = "block";
    retour6.style.display = "block";
  } else {
    errordate.style.display = "block";
  }
});
continuerretour2.addEventListener("click", () => {
  var t = parseFloat(formventekiloInputretour[1].value);

  if (t > 0) {
    formventekiloretour2.style.display = "none";
    formventekiloretour3.style.display = "block";
    retour7.style.display = "block";
    retour6.style.display = "none";
  } else {
    errornbrekilo.style.display = "block";
  }
  formventekiloInputretour[1].value = parseFloat(
    formventekiloInputretour[1].value
  );
});
// continuer3.addEventListener("click", () => {
//   if (formventekiloInput[2].value) {
//     formventekilo3.style.display = "none";
//     formventekilo4.style.display = "block";
//     retour3.style.display = "block";
//   } else {
//     errordate.style.display = "block";
//   }
// });

// continuer4.addEventListener("click", () => {
//   var t = parseFloat(formventekiloInput[3].value);

//   if (t > 0) {
//     formventekilo4.style.display = "none";
//     formventekilo5.style.display = "block";
//     retour4.style.display = "block";
//   } else {
//     errornbrekilo.style.display = "block";
//   }
//   formventekiloInput[3].value = parseFloat(formventekiloInput[3].value);
// });
// continuer5.addEventListener("click", () => {
//   var u = parseFloat(formventekiloInput[4].value);

//   if (u > 0) {
//     formventekilo5.style.display = "none";
//     formventekilo6.style.display = "block";
//     retour5.style.display = "block";
//   } else {
//     errorprixkilo.style.display = "block";
//   }
//   formventekiloInput[4].value = parseFloat(formventekiloInput[4].value);
// });

/* erreurs de soumitions*/
formventekiloretour.addEventListener("submit", function (e) {
  let myInput = document.getElementById("prixkilo");

  let t = parseFloat(myInput.value);
  let myerror = document.getElementById("errorprixkilo");
  if (t > 0) {
    myInput.value = parseFloat(myInput.value);
    console.log(myInput.value);
  } else {
    myerror.innerHTML = "entrez un nombre strictement positif";
    e.preventDefault();
  }
});
