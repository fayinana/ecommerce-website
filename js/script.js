const profileToggle = document.getElementById("profile-toggle");
const miniProfile = document.querySelector(".mini-profile");

profileToggle.addEventListener("click", () => {
  miniProfile.classList.toggle("show-profile");
});
console.log(profileToggle);
console.log("wow");

const cartCount = document.querySelector(".top-text");

if (Number(cartCount.textContent) > 9) {
  cartCount.innerHTML = "9<sup class='plus-icon'>+</sup>";
}

// toggle active

// Get all list items
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
