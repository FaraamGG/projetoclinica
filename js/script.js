const openPop = document.querySelectorAll('[data-pop-target]')
const closePop = document.querySelectorAll('[data-pop-close]')
const overlay = document.getElementById('overlay')

const slider = document.getElementById('slider')
const entrar = document.getElementById('entrar')
const cadastrar = document.getElementById('cadastrar')
const logtext = document.getElementById('logtext')

openPop.forEach(div => {
    div.addEventListener('click', () => {
        const popup = document.querySelector(div.dataset.popTarget)
        openPopup(popup);
    })
})

overlay.addEventListener('click', () => {
    const popup = document.querySelectorAll('.pop.active')
    popup.forEach(popup => {
        closePopup(popup)
    })
})

function openPopup(popup) {
    if (popup == null) return
    popup.classList.add('active')
    overlay.classList.add('active')
}

function closePopup(popup) {
    if (popup == null) return
    popup.classList.remove('active')
    overlay.classList.remove('active')
}

slider.addEventListener('click', () => {
    if (slider.classList.contains('active')) {
        slider.classList.remove('active')
        cadastrar.classList.add('active')
        entrar.classList.remove('active')
        logtext.innerHTML = "Entrar";
        return
    }
    slider.classList.add('active')
    cadastrar.classList.remove('active')
    entrar.classList.add('active')
    logtext.innerHTML = "Cadastro";
})