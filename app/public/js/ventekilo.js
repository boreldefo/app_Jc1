const formventekiloInput = document.querySelectorAll("#formventekilo input");
const container_ventekilo = document.querySelectorAll(".container-ventekilo");
const formventekiloSearchicon = document.querySelectorAll(
  "#formventekilo .fa-solid.fa-magnifying-glass"
);
const formventekilodeleteicon = document.querySelectorAll("#formventekilo svg");
const formventekilo1 = document.querySelector(".formventekilo1");
const formventekilo2 = document.querySelector(".formventekilo2");
const formventekilo3 = document.querySelector(".formventekilo3");
const formventekilo4 = document.querySelector(".formventekilo4");
const formventekilo5 = document.querySelector(".formventekilo5");
const formventekilo6 = document.querySelector(".formventekilo6");

const alertspan1 = document.querySelectorAll(".ventekilo-control > span");

const blocadress1 = document.querySelector(".list-adress1");
const blocadress2 = document.querySelector(".list-adress2");
const list_adress1 = document.querySelectorAll(
  ".formventekilo1 > .ventekilo-control > .list-adress > li"
);
const list_adress2 = document.querySelectorAll(
  ".formventekilo2 >.ventekilo-control > .list-adress > li"
);

const retour1 = document.querySelector(".retour1");
const retour2 = document.querySelector(".retour2");
const retour3 = document.querySelector(".retour3");
const retour4 = document.querySelector(".retour4");
const retour5 = document.querySelector(".retour5");

const continuer1 = document.querySelector(".continuer1");
const continuer2 = document.querySelector(".continuer2");
const continuer3 = document.querySelector(".continuer3");
const continuer4 = document.querySelector(".continuer4");
const continuer5 = document.querySelector(".continuer5");
const continuer6 = document.querySelector(".continuer6");

const searchdepart = document.getElementById("searchdepart");
const searcharrivee = document.getElementById("searcharrivee");

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

/* changer 'continuer 'en 'valier' apres avoir fait le choix */
const inputchoix2 = document.querySelector(".choix2 > input");
const labelchoix2 = document.querySelector(".choix2 > label");

const inputchoix1 = document.querySelector(".choix1 > input");
const labelchoix1 = document.querySelector(".choix1 > label");

inputchoix1.addEventListener("click", () => {
  continuer6.innerText = "Continuer";
});
labelchoix1.addEventListener("click", () => {
  continuer6.innerText = "Continuer";
});

inputchoix2.addEventListener("click", () => {
  continuer6.innerText = "Valider";
});
labelchoix2.addEventListener("click", () => {
  continuer6.innerText = "Valider";
});
/*remplir l'input d'adresse apres un click sur les liste des 4 adresses */
container_ventekilo[0].addEventListener("click", () => {
  if (formventekiloInput[2].value) {
    errordate.style.display = "none";
  }
});
list_adress1[0].addEventListener("click", () => {
  formventekilo1.style.display = "none";
  formventekilo2.style.display = "block";
  retour1.style.display = "block";
  searchdepart.value = list_adress1[0].childNodes[1].childNodes[3].innerText;
  formventekiloSearchicon[0].style.display = "none";
  formventekilodeleteicon[0].style.display = "block";
  if (!formventekiloInput[0].value) {
    formventekiloSearchicon[0].style.display = "block";
    formventekilodeleteicon[0].style.display = "none";
  }

  /* renvoie les meme liste d'adresse  */
  list_adress2[0].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;
  list_adress2[1].childNodes[1].childNodes[3].innerText =
    list_adress1[1].childNodes[1].childNodes[3].innerText;
  list_adress2[2].childNodes[1].childNodes[3].innerText =
    list_adress1[2].childNodes[1].childNodes[3].innerText;
  list_adress2[3].childNodes[1].childNodes[3].innerText =
    list_adress1[3].childNodes[1].childNodes[3].innerText;
});
list_adress1[1].addEventListener("click", () => {
  formventekilo1.style.display = "none";
  formventekilo2.style.display = "block";
  retour1.style.display = "block";
  searchdepart.value = list_adress1[1].childNodes[1].childNodes[3].innerText;

  formventekiloSearchicon[0].style.display = "none";
  formventekilodeleteicon[0].style.display = "block";
  if (!formventekiloInput[0].value) {
    formventekiloSearchicon[0].style.display = "block";
    formventekilodeleteicon[0].style.display = "none";
  }

  list_adress1[1].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;

  list_adress1[0].childNodes[1].childNodes[3].innerText =
    formventekiloInput[0].value;

  /* renvoie les meme liste d'adresse  */
  list_adress2[0].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;
  list_adress2[1].childNodes[1].childNodes[3].innerText =
    list_adress1[1].childNodes[1].childNodes[3].innerText;
  list_adress2[2].childNodes[1].childNodes[3].innerText =
    list_adress1[2].childNodes[1].childNodes[3].innerText;
  list_adress2[3].childNodes[1].childNodes[3].innerText =
    list_adress1[3].childNodes[1].childNodes[3].innerText;
});
list_adress1[2].addEventListener("click", () => {
  formventekilo1.style.display = "none";
  formventekilo2.style.display = "block";
  retour1.style.display = "block";
  searchdepart.value = list_adress1[2].childNodes[1].childNodes[3].innerText;

  formventekiloSearchicon[0].style.display = "none";
  formventekilodeleteicon[0].style.display = "block";
  if (!formventekiloInput[0].value) {
    formventekiloSearchicon[0].style.display = "block";
    formventekilodeleteicon[0].style.display = "none";
  }

  list_adress1[2].childNodes[1].childNodes[3].innerText =
    list_adress1[1].childNodes[1].childNodes[3].innerText;

  list_adress1[1].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;

  list_adress1[0].childNodes[1].childNodes[3].innerText =
    formventekiloInput[0].value;

  /* renvoie les meme liste d'adresse  */
  list_adress2[0].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;
  list_adress2[1].childNodes[1].childNodes[3].innerText =
    list_adress1[1].childNodes[1].childNodes[3].innerText;
  list_adress2[2].childNodes[1].childNodes[3].innerText =
    list_adress1[2].childNodes[1].childNodes[3].innerText;
  list_adress2[3].childNodes[1].childNodes[3].innerText =
    list_adress1[3].childNodes[1].childNodes[3].innerText;
});
list_adress1[3].addEventListener("click", () => {
  formventekilo1.style.display = "none";
  formventekilo2.style.display = "block";
  retour1.style.display = "block";
  searchdepart.value = list_adress1[3].childNodes[1].childNodes[3].innerText;

  formventekiloSearchicon[0].style.display = "none";
  formventekilodeleteicon[0].style.display = "block";
  if (!formventekiloInput[0].value) {
    formventekiloSearchicon[0].style.display = "block";
    formventekilodeleteicon[0].style.display = "none";
  }

  list_adress1[3].childNodes[1].childNodes[3].innerText =
    list_adress1[2].childNodes[1].childNodes[3].innerText;

  list_adress1[2].childNodes[1].childNodes[3].innerText =
    list_adress1[1].childNodes[1].childNodes[3].innerText;

  list_adress1[1].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;

  list_adress1[0].childNodes[1].childNodes[3].innerText =
    formventekiloInput[0].value;

  /* renvoie les meme liste d'adresse  */
  list_adress2[0].childNodes[1].childNodes[3].innerText =
    list_adress1[0].childNodes[1].childNodes[3].innerText;
  list_adress2[1].childNodes[1].childNodes[3].innerText =
    list_adress1[1].childNodes[1].childNodes[3].innerText;
  list_adress2[2].childNodes[1].childNodes[3].innerText =
    list_adress1[2].childNodes[1].childNodes[3].innerText;
  list_adress2[3].childNodes[1].childNodes[3].innerText =
    list_adress1[3].childNodes[1].childNodes[3].innerText;
});

list_adress2[0].addEventListener("click", () => {
  searcharrivee.value = list_adress2[0].childNodes[1].childNodes[3].innerText;

  if (formventekiloInput[0].value == formventekiloInput[1].value) {
    idemadress.style.display = "block";
    alertspan1[1].style.display = "none";
  } else {
    formventekilo2.style.display = "none";
    formventekilo3.style.display = "block";
    retour2.style.display = "block";

    formventekiloSearchicon[1].style.display = "none";
    formventekilodeleteicon[1].style.display = "block";
    if (!formventekiloInput[1].value) {
      formventekiloSearchicon[1].style.display = "block";
      formventekilodeleteicon[1].style.display = "none";
    }

    /* renvoie les meme liste d'adresse  */
    list_adress1[0].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;
    list_adress1[1].childNodes[1].childNodes[3].innerText =
      list_adress2[1].childNodes[1].childNodes[3].innerText;
    list_adress1[2].childNodes[1].childNodes[3].innerText =
      list_adress2[2].childNodes[1].childNodes[3].innerText;
    list_adress1[3].childNodes[1].childNodes[3].innerText =
      list_adress2[3].childNodes[1].childNodes[3].innerText;
  }
});
list_adress2[1].addEventListener("click", () => {
  searcharrivee.value = list_adress2[1].childNodes[1].childNodes[3].innerText;

  if (formventekiloInput[0].value == formventekiloInput[1].value) {
    idemadress.style.display = "block";
    alertspan1[1].style.display = "none";
  } else {
    formventekilo2.style.display = "none";
    formventekilo3.style.display = "block";
    retour2.style.display = "block";

    formventekiloSearchicon[1].style.display = "none";
    formventekilodeleteicon[1].style.display = "block";
    if (!formventekiloInput[1].value) {
      formventekiloSearchicon[1].style.display = "block";
      formventekilodeleteicon[1].style.display = "none";
    }

    list_adress2[1].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;

    list_adress2[0].childNodes[1].childNodes[3].innerText =
      formventekiloInput[1].value;

    /* renvoie les meme liste d'adresse  */
    list_adress1[0].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;
    list_adress1[1].childNodes[1].childNodes[3].innerText =
      list_adress2[1].childNodes[1].childNodes[3].innerText;
    list_adress1[2].childNodes[1].childNodes[3].innerText =
      list_adress2[2].childNodes[1].childNodes[3].innerText;
    list_adress1[3].childNodes[1].childNodes[3].innerText =
      list_adress2[3].childNodes[1].childNodes[3].innerText;
  }
});
list_adress2[2].addEventListener("click", () => {
  searcharrivee.value = list_adress2[2].childNodes[1].childNodes[3].innerText;

  if (formventekiloInput[0].value == formventekiloInput[1].value) {
    idemadress.style.display = "block";
    alertspan1[1].style.display = "none";
  } else {
    formventekilo2.style.display = "none";
    formventekilo3.style.display = "block";
    retour2.style.display = "block";

    formventekiloSearchicon[1].style.display = "none";
    formventekilodeleteicon[1].style.display = "block";
    if (!formventekiloInput[1].value) {
      formventekiloSearchicon[1].style.display = "block";
      formventekilodeleteicon[1].style.display = "none";
    }

    list_adress2[2].childNodes[1].childNodes[3].innerText =
      list_adress2[1].childNodes[1].childNodes[3].innerText;

    list_adress2[1].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;

    list_adress2[0].childNodes[1].childNodes[3].innerText =
      formventekiloInput[1].value;

    /* renvoie les meme liste d'adresse  */
    list_adress1[0].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;
    list_adress1[1].childNodes[1].childNodes[3].innerText =
      list_adress2[1].childNodes[1].childNodes[3].innerText;
    list_adress1[2].childNodes[1].childNodes[3].innerText =
      list_adress2[2].childNodes[1].childNodes[3].innerText;
    list_adress1[3].childNodes[1].childNodes[3].innerText =
      list_adress2[3].childNodes[1].childNodes[3].innerText;
  }
});
list_adress2[3].addEventListener("click", () => {
  searcharrivee.value = list_adress2[3].childNodes[1].childNodes[3].innerText;

  if (formventekiloInput[0].value == formventekiloInput[1].value) {
    idemadress.style.display = "block";
    alertspan1[1].style.display = "none";
  } else {
    formventekilo2.style.display = "none";
    formventekilo3.style.display = "block";
    retour2.style.display = "block";

    formventekiloSearchicon[1].style.display = "none";
    formventekilodeleteicon[1].style.display = "block";
    if (!formventekiloInput[1].value) {
      formventekiloSearchicon[1].style.display = "block";
      formventekilodeleteicon[1].style.display = "none";
    }

    list_adress2[3].childNodes[1].childNodes[3].innerText =
      list_adress2[2].childNodes[1].childNodes[3].innerText;

    list_adress2[2].childNodes[1].childNodes[3].innerText =
      list_adress2[1].childNodes[1].childNodes[3].innerText;

    list_adress2[1].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;

    list_adress2[0].childNodes[1].childNodes[3].innerText =
      formventekiloInput[1].value;

    /* renvoie les meme liste d'adresse  */
    list_adress1[0].childNodes[1].childNodes[3].innerText =
      list_adress2[0].childNodes[1].childNodes[3].innerText;
    list_adress1[1].childNodes[1].childNodes[3].innerText =
      list_adress2[1].childNodes[1].childNodes[3].innerText;
    list_adress1[2].childNodes[1].childNodes[3].innerText =
      list_adress2[2].childNodes[1].childNodes[3].innerText;
    list_adress1[3].childNodes[1].childNodes[3].innerText =
      list_adress2[3].childNodes[1].childNodes[3].innerText;
  }
});
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
/* autocompletion adress departure */
var searchInput = "searchdepart";
var searchInput2 = "searcharrivee";
if (formventekilo1 || formventekilo2) {
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

      var l = formventekiloInput[0].value.split(",").length;
      if (l > 1) {
        formventekilo1.style.display = "none";
        formventekilo2.style.display = "block";
        retour1.style.display = "block";

        list_adress1[3].childNodes[1].childNodes[3].innerText =
          list_adress1[2].childNodes[1].childNodes[3].innerText;

        list_adress1[2].childNodes[1].childNodes[3].innerText =
          list_adress1[1].childNodes[1].childNodes[3].innerText;

        list_adress1[1].childNodes[1].childNodes[3].innerText =
          list_adress1[0].childNodes[1].childNodes[3].innerText;

        list_adress1[0].childNodes[1].childNodes[3].innerText =
          formventekiloInput[0].value;

        /* renvoie les meme liste d'adresse  */
        list_adress2[0].childNodes[1].childNodes[3].innerText =
          list_adress1[0].childNodes[1].childNodes[3].innerText;
        list_adress2[1].childNodes[1].childNodes[3].innerText =
          list_adress1[1].childNodes[1].childNodes[3].innerText;
        list_adress2[2].childNodes[1].childNodes[3].innerText =
          list_adress1[2].childNodes[1].childNodes[3].innerText;
        list_adress2[3].childNodes[1].childNodes[3].innerText =
          list_adress1[3].childNodes[1].childNodes[3].innerText;
      } else {
        erroradress1.style.display = "block";
        alertspan1[0].style.display = "none";
      }
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

      var i = formventekiloInput[1].value.split(",").length;
      if (
        i > 1 &&
        formventekiloInput[0].value !== formventekiloInput[1].value
      ) {
        formventekilo2.style.display = "none";
        formventekilo3.style.display = "block";
        retour2.style.display = "block";

        list_adress2[3].childNodes[1].childNodes[3].innerText =
          list_adress2[2].childNodes[1].childNodes[3].innerText;

        list_adress2[2].childNodes[1].childNodes[3].innerText =
          list_adress2[1].childNodes[1].childNodes[3].innerText;

        list_adress2[1].childNodes[1].childNodes[3].innerText =
          list_adress2[0].childNodes[1].childNodes[3].innerText;

        list_adress2[0].childNodes[1].childNodes[3].innerText =
          formventekiloInput[1].value;

        /* renvoie les meme liste d'adresse  */
        list_adress1[0].childNodes[1].childNodes[3].innerText =
          list_adress2[0].childNodes[1].childNodes[3].innerText;
        list_adress1[1].childNodes[1].childNodes[3].innerText =
          list_adress2[1].childNodes[1].childNodes[3].innerText;
        list_adress1[2].childNodes[1].childNodes[3].innerText =
          list_adress2[2].childNodes[1].childNodes[3].innerText;
        list_adress1[3].childNodes[1].childNodes[3].innerText =
          list_adress2[3].childNodes[1].childNodes[3].innerText;
      } else {
        if (i == 1) {
          erroradress2.style.display = "block";
          alertspan1[1].style.display = "none";
        }
        if (formventekiloInput[0].value == formventekiloInput[1].value) {
          idemadress.style.display = "block";
          alertspan1[1].style.display = "none";
        }
      }
    });
  });
}
retour1.addEventListener("click", () => {
  retour1.style.display = "none";
  formventekilo1.style.display = "block";
  formventekilo2.style.display = "none";
  formventekilo3.style.display = "none";
  continuer1.style.display = "block";
  blocadress1.style.display = "block";
  alertspan1[0].style.display = "none";
  erroradress1.style.display = "none";
});

retour2.addEventListener("click", () => {
  retour2.style.display = "none";
  formventekilo1.style.display = "none";
  formventekilo2.style.display = "block";
  formventekilo3.style.display = "none";
  continuer2.style.display = "block";
  retour1.style.display = "block";
  blocadress2.style.display = "block";
  alertspan1[1].style.display = "none";
  erroradress2.style.display = "none";
  idemadress.style.display = "none";
});
retour3.addEventListener("click", () => {
  retour3.style.display = "none";
  formventekilo1.style.display = "none";
  formventekilo3.style.display = "block";
  formventekilo4.style.display = "none";
  continuer3.style.display = "block";
  retour2.style.display = "block";
});
retour4.addEventListener("click", () => {
  retour4.style.display = "none";
  formventekilo1.style.display = "none";
  formventekilo4.style.display = "block";
  formventekilo5.style.display = "none";
  continuer4.style.display = "block";
  retour3.style.display = "block";
  errornbrekilo.style.display = "none";
});

retour5.addEventListener("click", () => {
  retour5.style.display = "none";
  formventekilo1.style.display = "none";
  formventekilo5.style.display = "block";
  formventekilo6.style.display = "none";
  continuer3.style.display = "block";
  retour4.style.display = "block";
  errorprixkilo.style.display = "none";
});
continuer1.addEventListener("click", () => {
  formventekilo1.style.display = "none";
  formventekilo2.style.display = "block";
  retour1.style.display = "block";
});
continuer2.addEventListener("click", () => {
  if (formventekiloInput[0].value == formventekiloInput[1].value) {
    idemadress.style.display = "block";
  } else {
    formventekilo2.style.display = "none";
    formventekilo3.style.display = "block";
    retour2.style.display = "block";
  }
});
continuer3.addEventListener("click", () => {
  if (formventekiloInput[2].value) {
    formventekilo3.style.display = "none";
    formventekilo4.style.display = "block";
    retour3.style.display = "block";
  } else {
    errordate.style.display = "block";
  }
});

continuer4.addEventListener("click", () => {
  var t = parseFloat(formventekiloInput[3].value);

  if (t > 0) {
    formventekilo4.style.display = "none";
    formventekilo5.style.display = "block";
    retour4.style.display = "block";
  } else {
    errornbrekilo.style.display = "block";
  }
  formventekiloInput[3].value = parseFloat(formventekiloInput[3].value);
});
continuer5.addEventListener("click", () => {
  var u = parseFloat(formventekiloInput[4].value);

  if (u > 0) {
    formventekilo5.style.display = "none";
    formventekilo6.style.display = "block";
    retour5.style.display = "block";
  } else {
    errorprixkilo.style.display = "block";
  }
  formventekiloInput[4].value = parseFloat(formventekiloInput[4].value);
  console.log(formventekiloInput[4].value);
});
/*focus input after click on search */
formventekiloSearchicon[0].addEventListener("click", () => {
  formventekiloInput[0].focus();
});
formventekiloSearchicon[1].addEventListener("click", () => {
  formventekiloInput[1].focus();
});
// formventekiloSearchicon[2].addEventListener("click", () => {
//   formventekiloInput[2].focus();
// });

/* change search icon with delete icon */
formventekiloInput[0].addEventListener("input", () => {
  formventekiloSearchicon[0].style.display = "none";
  formventekilodeleteicon[0].style.display = "block";
  blocadress1.style.display = "none";
  continuer1.style.display = "none";
  if (searchdepart || searcharrivee) {
    alertspan1[0].style.display = "block";
  }
  if (!formventekiloInput[0].value) {
    formventekiloSearchicon[0].style.display = "block";
    formventekilodeleteicon[0].style.display = "none";
    blocadress1.style.display = "block";
    alertspan1[0].style.display = "none";
  }
});

formventekiloInput[1].addEventListener("input", () => {
  formventekiloSearchicon[1].style.display = "none";
  formventekilodeleteicon[1].style.display = "block";
  blocadress2.style.display = "none";
  continuer2.style.display = "none";
  if (searchdepart || searcharrivee) {
    alertspan1[1].style.display = "block";
  }
  if (!formventekiloInput[1].value) {
    formventekiloSearchicon[1].style.display = "block";
    formventekilodeleteicon[1].style.display = "none";
    blocadress2.style.display = "block";
    alertspan1[1].style.display = "none";
  }
});
// formventekiloInput[2].addEventListener("input", () => {
//   formventekiloSearchicon[2].style.display = "none";
//   formventekilodeleteicon[2].style.display = "block";
//   if (!formventekiloInput[2].value) {
//     formventekiloSearchicon[2].style.display = "block";
//     formventekilodeleteicon[2].style.display = "none";
//   }
// });

/*delete input value after click on deleteicon */
formventekilodeleteicon[0].addEventListener("click", () => {
  formventekiloInput[0].value = "";
  formventekiloInput[0].focus();
  formventekiloSearchicon[0].style.display = "block";
  formventekilodeleteicon[0].style.display = "none";
  blocadress1.style.display = "block";
  alertspan1[0].style.display = "none";
  continuer1.style.display = "none";
  erroradress1.style.display = "none";
});
formventekilodeleteicon[1].addEventListener("click", () => {
  formventekiloInput[1].value = "";
  formventekiloInput[1].focus();
  formventekiloSearchicon[1].style.display = "block";
  formventekilodeleteicon[1].style.display = "none";
  blocadress2.style.display = "block";
  alertspan1[1].style.display = "none";
  continuer2.style.display = "none";
  erroradress2.style.display = "none";
});
// formventekilodeleteicon[2].addEventListener("click", () => {
//   formventekiloInput[2].value = "";
//   formventekiloInput[2].focus();
//   formventekiloSearchicon[2].style.display = "block";
//   formventekilodeleteicon[2].style.display = "none";
// });

// function result() {
//   let adress1 = document.getElementById("adress1").value;
//   sessionStorage.setItem("adress1", adress1);
// }
