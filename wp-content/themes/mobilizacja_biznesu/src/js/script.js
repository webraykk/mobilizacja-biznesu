document.addEventListener("DOMContentLoaded", function () {
  const mobileButton = document.querySelector(".mobilebutton");

  mobileButton.addEventListener("click", function () {
    document.documentElement.classList.toggle("active");
  });
});
