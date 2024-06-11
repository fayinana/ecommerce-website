// Assuming you have the following HTML structure
// <ul>
//     <li class="link"><a href="index.php?category=1">Category 1</a></li>
//     <li class="link"><a href="index.php?category=2">Category 2</a></li>
//     <li class="link"><a href="index.php?category=3">Category 3</a></li>
//     <li class="link"><a href="index.php?category=4">Category 4</a></li>
// </ul>

// Get the current page URL
const currentURL = window.location.href;

// Get all the links
const links = document.querySelectorAll(".link");

// Add the "active" class to the appropriate link
links.forEach((link) => {
  console.log(link);
  const linkURL = link.querySelector("a").href;
  if (currentURL.includes(linkURL)) {
    link.classList.add("active");
  } else {
    link.classList.remove("active");
  }
});

const profileToggle = document.getElementById("profile-toggle");
const miniProfile = document.querySelector(".mini-profile");
const body = document.querySelector("body");

function bottomNotification(text, type, destination) {
  const icon =
    type === "fail"
      ? "<i class='fa fa-exclamation-circle'></i>"
      : "<i class='fa fa-check-circle'></i>";

  notificationHtml = `
  <div class='small-notification'>
  <span class='icon'><i class='fas fa-bars'></i></span>
  <p>${text}</p>
  <div class='bottom-border'></div>
  </div>`;

  body.innerHTML = notificationHtml;
  notificationContainer.style.transform = "translateX(0%)";
  setTimeout(() => {
    notificationContainer.style.visibility = "hidden";
    setTimeout(() => {
      notificationContainer.style.transform = "translateX(150%)";
      window.open(destination, "_self");
    }, 500);
  }, 5000);
}

profileToggle.addEventListener("click", () => {
  miniProfile.classList.toggle("show-profile");
});

const cartCount = document.querySelector(".top-text");

if (Number(cartCount.textContent) > 9) {
  cartCount.innerHTML = "9<sup class='plus-icon'>+</sup>";
}

const listItems = document.querySelectorAll(".list");

// Add click event to each list item
listItems.forEach((listItem) => {
  listItem.addEventListener("click", () => {
    // Remove "active" class from all list items
    listItems.forEach((item) => {
      item.classList.remove("active");
    });

    // Add "active" class to the clicked list item
    listItem.classList.add("active");
  });
});

function alert(text, type) {
  const html = `
<div class='${type}'> ${text} </div>

`;
}

function alertMessage(text, type, destination) {
  const icon =
    type === "fail"
      ? "<i class='fa fa-exclamation-circle'></i>"
      : "<i class='fa fa-check-circle'></i>";
  const html = `
     <div class="alert">
        <p class="icon ${type}">${icon}</p>
        <p class='text'>${text}</p>
        <button class="${type} ok" id="goto">ok</button>
    </div>`;

  body.innerHTML = html;
  document.querySelector("#goto").addEventListener("click", (e) => {
    e.preventDefault();
    window.open(destination, "_self");
  });
}

