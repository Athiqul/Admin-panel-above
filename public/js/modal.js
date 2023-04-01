const imgBtn = document.getElementById("imgModalBtn");

console.log(imgBtn);
const modal = document.getElementById("dltModal");
const imgModal = document.getElementById("imgModal");
const closeButton = document.getElementById("closeButton");
const closeBtn = document.getElementById("imgModalClose");

window.onclick = function (event) {
  if (event.target == closeButton) {
    modal.classList.remove("showModal");
  }
  if (event.target == closeBtn) {
    imgModal.classList.remove("showModal");
  }
};
imgBtn.addEventListener("click", (event) => {
  console.log('Image Button');
  console.log(imgModal);
  imgModal.classList.add("showModal");
});
