const editBtnEl = document.getElementById('editBtn')
const saveBtnEl = document.getElementById('saveBtn')
const cancelBtnEl = document.getElementById('cancelBtn')
const saveContainerEl = document.getElementById('saveContainer')
const infoFldEl = document.getElementById('infoFld')

editBtnEl.addEventListener('click', () => {
    saveContainerEl.classList.toggle('hide')
    editBtnEl.disabled = true
    infoFldEl.disabled = false
})

saveBtnEl.addEventListener('click', () => {
    saveContainerEl.classList.toggle('hide')
    editBtnEl.disabled = false
})

cancelBtnEl.addEventListener('click', () => {
    saveContainerEl.classList.toggle('hide')
    editBtnEl.disabled = false
    document.location.reload(true)
})