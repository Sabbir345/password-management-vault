// ===== create new item modal
const manageItemImportModal = document.querySelector('.itemImport')

// openItemModal for create new
function openItemImportModal() {
  manageItemImportModal.classList.remove('hidden')
}
openItemImportModal()
// closeItemModal for create new
function closeItemImportModal() {
  manageItemImportModal.classList.add('hidden')
}
closeItemImportModal()

window.onclick = function (event) {
  if (event.target === manageItemImportModal) {
    manageItemImportModal.classList.add('hidden')
  }
}
// ===== create new item modal
const manageItemExportModal = document.querySelector('.itemExport')

// openItemModal for create new
function openItemExportModal() {
  manageItemExportModal.classList.remove('hidden')
}
openItemExportModal()
// closeItemModal for create new
function closeItemExportModal() {
  manageItemExportModal.classList.add('hidden')
}
closeItemExportModal()

window.onclick = function (event) {
  if (event.target === manageItemExportModal) {
    manageItemExportModal.classList.add('hidden')
  }
}