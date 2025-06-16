<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appointment</title>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('css/appointment.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <style>
        body {
            display: flex;
            background-color: lavender;
        }

        div.dt-button-collection {
            left: auto;
            right: 0 !important;
        }

        #calendarModal .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #calendarModal .modal-content {
            background-color: whitesmoke;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
        }

        #calendarModal .modal-title {
            font-weight: 600;
            font-size: 20px;
            color: #333;
        }

        #calendarModal .form-label {
            font-weight: 500;
        }

        #calendarModal .btn-primary {
            background-color: #4A90E2;
            border: none;
        }

        #calendarModal .btn-primary:hover {
            background-color: #357ABD;
        }
    </style>
</head>

<body>
    @include('layout.sidebarnew')

    <div class="header-container w-100">
        <!-- Header Section -->
        <div class="header d-flex justify-content-between align-items-center p-3">
            <h4 class="ms-2 mb-3">History</h4>
            <div class="profile-card d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Image" width="50"
                    class="rounded-circle me-2">
                <div>
                    <div class="profile-name">Dinesh Kumar G.</div>
                    <div class="profile-email">dineshkumardextra@gmail.com</div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb and Buttons -->
        <div class="breadcrumb-buttons d-flex justify-content-between align-items-center px-3">
            <div class="breadcrumb ms-2">
                <a href="{{ route('dashboard') }}">Home </a>
                <i class="fa-solid fa-angles-right"></i> Dashboard
            </div>
            <div>
                <button type="button" class="btn btn-primary me-2 mt-2" id="modal_calendra">
                    <i class="fa-solid fa-calendar-days"></i>
                </button>
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#myform">
                    <i class="fa-solid fa-plus"></i> New Appointment
                </button>
            </div>
        </div>

        <!-- Filter and Export -->
        <div class="filter-row d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center gap-3 ms-auto">
                <div class="search-wrapper">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <input type="text" placeholder="Search" class="search-input" />
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
                        data-bs-toggle="dropdown">
                        <i class="fa-solid fa-download"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="downloadDropdown">
                        <li><a class="dropdown-item" href="#" id="btnPrint">Print</a></li>
                        <li><a class="dropdown-item" href="#" id="btnCopy">Copy</a></li>
                        <li><a class="dropdown-item" href="#" id="btnPDF">PDF</a></li>
                        <li><a class="dropdown-item" href="#" id="btnExcel">Excel</a></li>
                        <li><a class="dropdown-item" href="#" id="btnCSV">CSV</a></li>
                        <li><a class="dropdown-item" href="#" id="btnColVis">Toggle Columns</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-wrapper pb-4">
            <table id="myTable" class="table table-striped display" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Request Date</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Preferred Date</th>
                        <th>Preferred Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    {{-- @include('appointments.partials.appointment_modal') --}}

    <!-- JS Logic -->
    <script>
        $(document).ready(function() {
            const table = $('#myTable').DataTable({
                ajax: "{{ route('appointments.list') }}",
                columns: [{
                        data: 'sno'
                    },
                    {
                        data: 'request_date'
                    },
                    {
                        data: 'customer_name'
                    },
                    {
                        data: 'contact_no'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'preferred_date'
                    },
                    {
                        data: 'preferred_time'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<button class='btn btn-sm btn-info' onclick='viewAppointment(${row.id})'>
                                        <i class="fa fa-eye"></i>
                                    </button>`;
                        },
                        orderable: false
                    }
                ],
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        className: 'd-none',
                        title: 'Appointment List'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'd-none',
                        title: 'Appointment List'
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'd-none',
                        title: 'Appointment List'
                    },
                    {
                        extend: 'colvis',
                        className: 'd-none'
                    }
                ],
                pageLength: 10,
                ordering: true,
                lengthChange: false
            });

            $('#showEntries').on('change', function() {
                table.page.len(this.value).draw();
            });

            $('.search-input').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#modal_calendra').on('click', function() {
                new bootstrap.Modal(document.getElementById('calendarModal')).show();
            });

            $('#calendarFilterForm').on('submit', function(e) {
                e.preventDefault();
                bootstrap.Modal.getInstance(document.getElementById('calendarModal')).hide();
            });

            $('#myform').on('hidden.bs.modal', function() {
                table.ajax.reload(null, false);
            });

            $('#btnPrint').on('click', () => table.button(0).trigger());
            $('#btnPDF').on('click', () => table.button(1).trigger());
            $('#btnCSV').on('click', () => table.button(2).trigger());
            $('#btnColVis').on('click', () => table.button(3).trigger());
        });

        function viewAppointment(id) {
            alert('View clicked for ID: ' + id);
            // Load modal or redirect to view page here
        }
    </script>
</body>

</html>
