<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Dashboard</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}" />

    <!-- Custom Styling -->
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .containers {
            width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .modal-content {
            background-color: #f8f9fa;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            border-color: #0d6efd;
        }

        .form-label {
            color: #495057;
        }

        /* new */
        body {
            font-family: sans-serif !important;
            margin: 20px;
            background-color: rgb(207, 205, 205) !important;
        }

        .containers {
            width: 100%;
        }

        .header {
            display: flex;
            background-color: white;
            height: 60px;
            margin-left: 4px;
            border-radius: 10px;
            width: 900px;
        }

        .top_nav {
            background-color: white;
            border-radius: 8px;
            height: 60px;
            margin-left: 8px;
            display: flex;
            justify-content: left;
            align-items: center;
            margin-top: 5px;
            width: 99%;

        }

        .top_nav h4 {
            margin-left: 30px;
        }

        .breadcrumb-buttons {
            display: flex;
            justify-content: space-between;
            margin-left: 8px;
            background-color: white;
            height: 50px;
            border-radius: 8px;
            margin-top: 3px;
            align-items: center;
        }

        .container {
            width: 100%;
        }

        .container .breadcrumb-buttons .breadcrumb {
            display: block;
            margin-left: 30px;
            margin-top: 5px;
        }

        .breadcrumb {
            margin-top: 15px;
            margin-left: 20px;
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .fa-angle-double-right:before,
        .fa-angles-right:before {
            content: "\f101";
            color: grey;
        }

        .btn-primary {
            height: 40px;
            margin-right: 10px;

        }

        .btn-primary p {

            text-align: center;
            font-size: 14px;
        }

        .dt-search {
            display: none;
        }

        /* .table responsive shadow-sm {
     box-shadow: var(--bs-box-shadow-sm) !important;
 } */
        div.dt-container div.dt-layout-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin: 0.75em 0;
        }

        .dt-layout-row {
            display: none;
        }

        th,
        td {
            border: none !important;
        }

        body {
            font-family: sans-serif !important;
            /* margin: 20px; */
            background-color: whitesmoke !important;
        }

        .table-responsive {
            /* overflow-x: auto; */
            -webkit-overflow-scrolling: touch;
        }

        div.dt-container {
            position: relative;
            clear: both;
            margin-left: 10px;
        }

        .dt-length {
            display: none;
        }

        .search-container {
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_filter {
            display: none;
            /* Hide default search box */
        }

        .search-wrapper {
            border: 1px solid black;
            background-color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }


        /* Media Query for tablets and below */


        /* Media Query for mobile devices */
        @media (max-width: 576px) {

            .breadcrumb-buttons,
            .top_nav {
                margin-left: 0px;
                margin-top: 5px;
            }
        }

        @media (max-width: 576px) {
            .breadcrumb-buttons {
                display: flex;
                justify-content: space-between;
                margin-left: 8px;
                background-color: white;
                height: 50px;
                border-radius: 8px;
                margin-top: 3px;
                align-items: normal;
            }

            .mailing_container {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                padding: 0px;
            }

            .mailing_container h4 {
                font-size: 16px;
                margin-left: 5px;
            }
        }

        @media (max-width: 992px) {
            .breadcrumb-buttons {
                margin: 2px;
                margin-top: 5px;
                height: auto;
                flex-direction: column;
                padding: 0.5rem;
            }

            .top_nav {
                flex-direction: column;
                align-items: flex-start;
                height: auto;
                padding: 10px;
                margin-left: 0px;
                padding: 0px;
            }

            .top_nav h4 {
                margin-left: 0;
                font-size: 18px;
            }

            .breadcrumb-buttons .breadcrumb {
                margin: 10px 0;
            }

            .btn-primary {
                width: 100%;
                margin: 10px 0 0 0;
            }

            .filter-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .filter-row .search-wrapper,
            .filter-row .form-select {
                width: 100%;
            }

            .dropdown {
                width: 100%;
            }

            .table-responsive {
                overflow-x: auto;
            }

            #customerTable {
                font-size: 14px;
            }

            .modal-dialog {
                margin: 1rem;
            }

            .modal-content {
                padding: 1rem;
            }

            .modal-header,
            .modal-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .modal-footer .btn {
                width: 100%;
                margin-top: 0.5rem;
            }

            .form-control,
            .form-select {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {

            .breadcrumb-buttons,
            .top_nav {
                padding: 0.5rem;
            }

            .top_nav h4 {
                font-size: 16px;
            }

            .search-wrapper {
                width: 100%;
            }

            .search-input {
                width: 100%;
            }

            .form-label {
                font-size: 14px;
            }

            .modal-header h4 {
                font-size: 18px;
            }

            .modal-body .col-md-6,
            .modal-body .col-md-5,
            .modal-body .col-md-2,
            .modal-body .col-md-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .modal-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-primary {
                width: 80%;
                margin-left: 40px;
            }

            /* Desktop style (already good) */


            /* Clean and correct mobile styles for search box and filter row */
            @media (max-width: 576px) {
                .filter-row {
                    flex-direction: column !important;
                    align-items: stretch !important;
                    gap: 1rem;
                }

                .search-wrapper {
                   
                    align-items: stretch !important;
                    width: 100% !important;
                    padding: 0.5rem;
                }

                .search-wrapper input {
                    width: 100% !important;
                }

                #showEntries,
                .dropdown {
                    width: 100% !important;
                }

                .dropdown .btn {
                    width: 100% !important;
                }
            }


        }
    </style>
</head>

<body style="display: flex; margin: 0px;">
    @include('layout.sidebarnew')

    <div class="containers">
        <!-- Top Nav -->
        <div class="mailing_container">
            <div class="top_nav">
                <h4>Customer Details Here</h4>
            </div>
        </div>

        <!-- Breadcrumb + Button -->
        <div class="breadcrumb-buttons d-flex justify-content-between ">
            <div class="breadcrumb">
                <a href="#">Home</a>
                <span>&raquo;</span>
                <span class="current">Dashboard</span>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal"
                id="btnAddNew">
                <i class="fas fa-plus"></i> New Customer
            </button>
        </div>
        <div class="filter-row d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center gap-3 ms-auto">
                <div class="search-wrapper">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <input type="text" placeholder="Search" class="search-input" style="border:none; outline: none ;">
                </div>
                <label for="showEntries">Entries</label>
                <select id="showEntries" class="form-select w-auto">
                    <option value="All">All</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>

                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="downloadDropdown"
                        data-bs-toggle="dropdown" style="background-color: white;">
                        <i class="fa-solid fa-download"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive px-3">
            <table id="customerTable" class="display table" style="width: 100%; margin-top: -10px;">
                <thead class="table-light">
                    <tr>
                        <th>S.No</th>
                        <th>Customer Name</th>
                        <th>Email ID</th>
                        <th>Address</th>
                        <th>Customer Number</th>
                        <th>Service History</th>
                        <th>Status</th>
                        <th>Documents</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Customer Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4">
                <form id="customerForm" class="bg-light p-4 rounded-4" enctype="multipart/form-data">
                    <div class="modal-header border-0">
                        <h4 class="modal-title fw-bold text-primary" id="customerModalLabel">New Customer</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-2">
                                <label class="form-label fw-semibold">S.No</label>
                                <input type="text" class="form-control shadow-sm" name="sno" required />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-semibold">Customer Name</label>
                                <input type="text" class="form-control shadow-sm" name="name" required />
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-semibold">Email ID</label>
                                <input type="email" class="form-control shadow-sm" name="email" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Address</label>
                                <input type="text" class="form-control shadow-sm" name="address" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Customer Number</label>
                                <input type="text" class="form-control shadow-sm" name="number" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Service History</label>
                                <textarea class="form-control shadow-sm" name="history" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status</label>
                                <select class="form-select shadow-sm" name="status" required>
                                    <option value="">Choose...</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Documents</label>
                                <input type="file" class="form-control shadow-sm" name="documents" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS to Handle Table and Form -->
    <script>
        $(document).ready(function () {
            const table = $('#customerTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: 8 } // Disable ordering on Action column
                ]
            });

            let editRow = null;

            // Clear form and modal title when clicking "New Customer"
            $('#btnAddNew').on('click', function () {
                editRow = null;
                $('#customerForm')[0].reset();
                $('#customerModalLabel').text('New Customer');
            });

            // Submit form for add or edit
            $('#customerForm').on('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                // Prepare row data for DataTable
                const rowData = [
                    formData.get('sno'),
                    formData.get('name'),
                    formData.get('email'),
                    formData.get('address'),
                    formData.get('number'),
                    formData.get('history'),
                    formData.get('status'),
                    formData.get('documents')?.name || '',
                    `
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item btn-view" href="#"><i class="fas fa-eye me-2 text-primary"></i>View</a></li>
                            <li><a class="dropdown-item btn-edit" href="#"><i class="fas fa-edit me-2 text-warning"></i>Edit</a></li>
                            <li><a class="dropdown-item text-danger btn-delete" href="#"><i class="fas fa-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                    `
                ];

                if (editRow) {
                    // Update existing row
                    table.row(editRow).data(rowData).draw(false);
                    editRow = null;
                } else {
                    // Add new row
                    table.row.add(rowData).draw(false);
                }

                $('#customerModal').modal('hide');
                this.reset();
            });

            // Delete row
            $('#customerTable tbody').on('click', '.btn-delete', function () {
                if (confirm('Are you sure you want to delete this customer?')) {
                    table.row($(this).closest('tr')).remove().draw(false);
                }
            });

            // View customer details
            $('#customerTable tbody').on('click', '.btn-view', function () {
                const row = table.row($(this).closest('tr')).data();
                alert(`
S.No: ${row[0]}
Name: ${row[1]}
Email: ${row[2]}
Address: ${row[3]}
Number: ${row[4]}
History: ${row[5]}
Status: ${row[6]}
Document: ${row[7]}
                `);
            });

            // Edit customer details
            $('#customerTable tbody').on('click', '.btn-edit', function () {
                editRow = table.row($(this).closest('tr'));
                const rowData = editRow.data();

                // Populate form fields
                const form = $('#customerForm');
                form.find('[name="sno"]').val(rowData[0]);
                form.find('[name="name"]').val(rowData[1]);
                form.find('[name="email"]').val(rowData[2]);
                form.find('[name="address"]').val(rowData[3]);
                form.find('[name="number"]').val(rowData[4]);
                form.find('[name="history"]').val(rowData[5]);
                form.find('[name="status"]').val(rowData[6]);

                // Change modal title to Edit
                $('#customerModalLabel').text('Edit Customer');

                // Show modal
                $('#customerModal').modal('show');
            });
        });
    </script>
</body>

</html>