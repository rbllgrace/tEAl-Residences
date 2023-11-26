'use strict'

const header = document.querySelector('.navbar')

let prevScrollpos = window.pageYOffset

window.onscroll = function () {
  const currentScrollPos = window.pageYOffset
  z
  if (prevScrollpos > currentScrollPos) {
    header.classList.add('fixed')
  } else {
    header.classList.remove('fixed')
  }

  prevScrollpos = currentScrollPos
}

// ---------------------

const x = document.getElementById('login')
const y = document.getElementById('register')
const z = document.getElementById('btn')
