// ===== create new modal
var createModal = document.querySelector('.createFolderModal')

// openFolderModal for create new
function openFolderModal() {
  createModal.classList.remove('hidden')
}
openFolderModal()
// closeModal for create new
function closeModal() {
  createModal.classList.add('hidden')
}
closeModal()

window.onclick = function (event) {
  if (event.target === createModal) {
    createModal.classList.add('hidden')
  }
}