const btn_envoi = document.querySelector("#envoi");
const btn_continuer = document.querySelector("#continuer");
const info_container = document.querySelector("#info-container");
const form_colis = document.querySelector("#form-colis");
const retour1 = document.querySelector("#retour1");

btn_envoi.addEventListener("click", () => {
  info_container.style.display = "none";
  form_colis.style.display = "block";
});
btn_continuer.addEventListener("click", (e) => {
  // e.preventDefault();
  info_container.style.display = "none";
  form_colis.style.display = "block";
  console.log("ok");
});

retour1.addEventListener("click", () => {
  info_container.style.display = "block";
  form_colis.style.display = "none";
});
