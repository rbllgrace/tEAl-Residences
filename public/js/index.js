'use strict'

const header = document.querySelector('.navbar')

// window.addEventListener('scroll', () => {
//   header.classList.toggle('sticky', window.scrollY > 0)
// })

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

function register() {
  x.style.left = '-400px'
  y.style.left = '50px'
  z.style.left = '110px'
}

function login() {
  x.style.left = '50px'
  y.style.left = '450px'
  z.style.left = '0'
}

// ----------------------------

document
  .getElementById('register')
  .addEventListener('submit', function (event) {
    event.preventDefault()
  })

function isValidEmail(email) {
  // Regular expression for a simple email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

function isValidPassword(password) {
  // Password should have at least 6 characters
  return password.length >= 6
}

function passwordsMatch(password, confirmPassword) {
  // Check if the password and confirm password match
  return password === confirmPassword
}

function submitForm() {
  // Get form values
  const email = document.getElementById('email').value.trim()
  const password = document.getElementById('password').value.trim()
  const confirm_password = document
    .getElementById('confirm_password')
    .value.trim()

  // Create a FormData object and append form data
  const formData = new FormData()
  formData.append('email', email)
  formData.append('password', password)
  formData.append('confirm_password', confirm_password)

  // Send a POST request to the server
  fetch('validate_form.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // Handle the response
      if (data.status === 'error') {
        // Display SweetAlert2 error alert
        Swal.fire({
          // icon: 'error',
          title: 'Oops...',
          text: data.message,
        })

        // Validate email
        if (!isValidEmail(email)) {
          // Display SweetAlert2 error alert for invalid email
          Swal.fire({
            // icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid email address!',
          })
          return // Stop further processing if email is invalid
        }

        // Validate password
        if (!isValidPassword(password)) {
          // Display SweetAlert2 error alert for invalid password
          Swal.fire({
            // icon: 'error',
            title: 'Oops...',
            text: 'Password should have at least 6 characters!',
          })
          return // Stop further processing if password is invalid
        }

        // Check if password and confirm password match
        if (!passwordsMatch(password, confirm_password)) {
          // Display SweetAlert2 error alert for non-matching passwords
          Swal.fire({
            // icon: 'error',
            title: 'Oops...',
            text: 'Password and Confirm Password do not match!',
          })
          return // Stop further processing if passwords do not match
        }
      } else if (data.status === 'success') {
        // Display SweetAlert2 success alert
        Swal.fire({
          // icon: 'success',
          title: 'Success!',
          text: data.message,
        })

        // You can also perform additional client-side actions here
      }
    })
    .catch((error) => {
      console.error('Error:', error)
    })
}
