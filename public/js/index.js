const header = document.querySelector('.navbar')

// window.addEventListener('scroll', () => {
//   header.classList.toggle('sticky', window.scrollY > 0)
// })

let prevScrollpos = window.pageYOffset

window.onscroll = function () {
  const currentScrollPos = window.pageYOffset

  if (prevScrollpos > currentScrollPos) {
    header.classList.add('fixed')
  } else {
    header.classList.remove('fixed')
  }

  prevScrollpos = currentScrollPos
  w
}
