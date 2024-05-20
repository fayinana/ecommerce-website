const navigationBtn = document.querySelector(".navigation-btn");
const navBar = document.querySelector(".nav-bar");
const closeBtn = document.querySelector(".close-btn");

navigationBtn.addEventListener("click", (e) => {
  e.preventDefault();
  navBar.classList.add("show-nav-bar");
});
closeBtn.addEventListener("click", (e) => {
  e.preventDefault();
  navBar.classList.remove("show-nav-bar");
});
