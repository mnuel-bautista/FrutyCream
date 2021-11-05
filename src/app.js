import './css/styles.css'

const body = document.querySelector('body')
const button = document.querySelector('.ver-mas')


button.addEventListener('click', () => {
    for (i = 10; i < 100; i++) {
        const p = document.createElement('p')
        p.innerHTML = "HEY EYYE"

        body.appendChild(p)
    }
})