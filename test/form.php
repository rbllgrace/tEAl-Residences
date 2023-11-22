<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation with SweetAlert2</title>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Your custom script -->
    <script src="script.js" defer></script>
</head>

<body>

    <form id="myForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

</body>

</html>