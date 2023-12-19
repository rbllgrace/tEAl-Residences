<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>

    <!-- data tables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
    </script>
    <!--  -->
</head>

<body>

    <!-- Your HTML table -->
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Ericson</td>
                <td>ericson@example.com</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Arabella</td>
                <td>ara@example.com</td>
            </tr>

            <tr>
                <td>5</td>
                <td>Leandro</td>
                <td>leandro@example.com</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true, // Enable pagination
                pageLength: 10, // Set the number of rows per page
                ordering: true, // Enable sorting
                order: [
                    [1, 'asc']
                ], // Sort by the second column in ascending order
                searching: true, // Enable search
                responsive: true, // Enable responsive mode
                scrollX: false, // Disable horizontal scrolling
                scrollY: '300px', // Set a fixed height for vertical scrolling
                language: {
                    search: "Custom Search:",
                    paginate: {
                        next: 'Next page',
                        previous: 'Previous page'
                    }
                },
                initComplete: function() {
                    console.log('Table initialized!');
                },
                drawCallback: function() {
                    console.log('Table redrawn!');
                }
            });
        });
    </script>

</body>

</html>