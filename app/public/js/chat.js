const usersList = document.querySelectorAll(".users-list a");
console.log(usersList);

function _(element) {
  return document.getElementById(element);
}

var inner_pannel = _("inner_right_pannel");
var ajax = new XMLHttpRequest();
// usersList.forEach((option) => option.addEventListener("click"));
ajax.open("POST", "chats.php", true);
ajax.onload = function () {
  if (ajax.status == 200 || ajax.readyState == 4) {
    inner_pannel.innerHTML = ajax.responseText;
  }
};

ajax.send();

//search
const searchBar = document.querySelector(".search input"),
  searchBtn = document.querySelector(".search button");

searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
};
