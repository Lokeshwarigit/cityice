<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Requests</title>
    <link rel="stylesheet" href="{{ asset('css/pending.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- jQuery + DataTables + Buttons -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
</head>

<style>
    /* All styles same as your code (unchanged) */
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fc;
    }

    .container {
        margin-top: 10px;
        padding: 0px 5px 0px 20px;
        width: 100%;
        height: 98vh;
    }

    .top_nav_tot {
        display: flex;
        width: 100%;
        justify-content: space-between;
        gap: 100px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        margin-bottom: 15px;
        height: 80px;
    }

    .top_nav {
        margin-left: 10px;
    }

    .top_nav h4 {
        font-size: 20px;
        color: #222;
        margin: 0 0 5px;
    }

    .profile-card {
        width: 30%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .profile-card img {
        width: 30px;
        height: 30px;
    }

    .breadcrumb-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: white;
        padding: 15px 30px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        margin-top: -10px;
    }

    .breadcrumb a {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb i {
        margin: 0 5px;
        color: #888;
        margin-top: 6px;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .search-box {
        position: relative;
        width: 250px;
    }

    .search-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #999;
    }

    .search-input {
        width: 100%;
        padding: 8px 12px 8px 32px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: white;
    }

    .download-btn {
        padding: 8px 16px;
        background-color: #ffffff !important;
        color: rgb(156, 56, 56);
        border: none;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: background-color 0.3s ease;
    }

    .download-btn:hover {
        background-color: #e9ecef;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background: #f0f0f0;
    }

    tr:hover {
        background-color: #f9f9f9;
    }

    .top-bar {
        display: flex;
        justify-content: right;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 15px;
        margin-top: 10px;
    }

    .search-filter-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .filter-box select {
        width: 70px;
        padding: 8px 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .filter-group {
        display: flex;
        gap: 10px;
    }

    .export-buttons .dt-button {
        background-color: white !important;
        color: black !important;
        border: 1px solid #ccc !important;
        border-radius: 8px !important;
        padding: 6px 12px !important;
    }

    .dt-button-collection {
        background-color: #fff !important;
        border: 1px solid #ccc !important;
        border-radius: 10px !important;
        padding: 10px 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        min-width: 180px;
    }

    .dt-button-collection .dt-button {
        display: block;
        width: 100%;
        padding: 8px 20px;
        font-size: 14px;
        text-align: left;
        background-color: transparent;
        border: none;
        color: #202020;
    }

    .dt-button-collection .dt-button:hover {
        background-color: #f1f1f1 !important;
    }

    .dataTables_filter {
        display: none;
    }
</style>

<body style="display: flex;">
    @include('layout.sidebarnew')
    <div class="container">
        <div class="top_nav_tot">
            <div class="top_nav">
                <h4 style="margin-top:20px; padding-left: 10px;">Pending</h4>
                <p style="font-size: 14px ; padding-left: 10px;" p> Use the form below to view Pending details and
                    create the Schedules.</p>
            </div>
            <div class="profile-card">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Image">
                <div class="profile-details" style="display: flex">
                    <div >
                        <h6>Dinesh kumar .G</h6>
                        <p>dineshkumardextra@gmail.com</p>
                    </div>


                </div>
            </div>
        </div>

        <div class="breadcrumb-buttons">
            <div class="breadcrumb">
                <a href="#">Home</a> <i class="fas fa-angle-right"></i> Dashboard
            </div>
        </div>

        <div class="top-bar">
            <div class="search-filter-wrapper">
                <div class="search-box">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" id="searchInput" placeholder="Search..." class="search-input" />
                </div>

                <div class="filter-box" style="display: flex; align-items: center; gap: 10px;">
                    <label for="serviceFilter" style="margin: 0;">Entries</label>
                    <select id="serviceFilter">
                        <option value="">All</option>
                        <option value="Plumbing">Plumbing</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Cleaning">Cleaning</option>
                    </select>
                    <div class="export-buttons"></div>


                </div>
            </div>
        </div>

        <table id="dataTable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Request Date</th>
                    <th>Customer Name</th>
                    <th>Contact No</th>
                    <th>Address</th>
                    <th>Preferred Date</th>
                    <th>Preferred Time</th>
                    <th>Service</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2025-05-14</td>
                    <td>John Doe</td>
                    <td>9876543210</td>
                    <td>123 Main St</td>
                    <td>2025-05-20</td>
                    <td>10:00 AM</td>
                    <td>Plumbing</td>
                    <td>Leaky faucet</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2025-05-13</td>
                    <td>Jane Smith</td>
                    <td>9123456789</td>
                    <td>456 Oak Rd</td>
                    <td>2025-05-22</td>
                    <td>02:00 PM</td>
                    <td>Electrical</td>
                    <td>Power issue</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2025-05-10</td>
                    <td>Sam Wilson</td>
                    <td>9988776655</td>
                    <td>789 Pine Ln</td>
                    <td>2025-05-23</td>
                    <td>11:00 AM</td>
                    <td>Cleaning</td>
                    <td>Full house clean</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            const table = $('#dataTable').DataTable({
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                buttons: [{
                    extend: 'collection',
                    text: '<i class="fa fa-download"></i> ',
                    className: 'download-btn',
                    buttons: [
                        'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print', 'colvis'
                    ]
                }]
            });

            // Move buttons to your custom div
            table.buttons().container().appendTo('.export-buttons');

            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#serviceFilter').on('change', function() {
                const value = this.value;
                table.column(7).search(value).draw();
            });
        });
    </script>


</body>

</html>
