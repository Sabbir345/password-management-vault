// ===== create new modal
var manageFolderModal = document.querySelector('.createFolderModal')

// openFolderModal for create new
function openFolderModal() {
  manageFolderModal.classList.remove('hidden')
}
openFolderModal()
// closeModal for create new
function closeFolderModal() {
  manageFolderModal.classList.add('hidden')
}
closeFolderModal()

window.onclick = function (event) {
  if (event.target === manageFolderModal) {
    manageFolderModal.classList.add('hidden')
  }
}

// ===== create new item modal
var manageItemModal = document.querySelector('.createItemModal')

// openItemModal for create new
function openItemModal() {
  manageItemModal.classList.remove('hidden')
}
openItemModal()
// closeItemModal for create new
function closeItemModal() {
  manageItemModal.classList.add('hidden')
}
closeItemModal()

window.onclick = function (event) {
  if (event.target === manageItemModal) {
    manageItemModal.classList.add('hidden')
  }
}