function submitForm() {
  // Get form values
  const username = document.getElementById('username').value.trim()
  const email = document.getElementById('email').value.trim()

  // Create a FormData object and append form data
  const formData = new FormData()
  formData.append('username', username)
  formData.append('email', email)

  // Send a POST request to the server
  fetch('validate.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // Handle the response
      if (data.status === 'error') {
        // Display SweetAlert2 error alert
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: data.message,
        })
      } else if (data.status === 'success') {
        // Display SweetAlert2 success alert
        Swal.fire({
          icon: 'success',
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
