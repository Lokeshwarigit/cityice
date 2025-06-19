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

        .modal-content {
            background-color: whitesmoke;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin: auto;
        }

        .modal-title {
            font-weight: 600;
            font-size: 20px;
            color: #333;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #4A90E2;
            border: none;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .modal-content {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 14px;
            z-index: 1;
        }

        /* ===== Responsive for Tablets (max-width: 768px) ===== */
        @media (max-width: 768px) {

            .header,
            .breadcrumb-buttons,
            .filter-row {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 10px;
                padding: 10px !important;
            }

            .breadcrumb {
                font-size: 0.95rem;
            }

            .btn {
                width: 100%;
                font-size: 0.95rem;
            }

            .search-wrapper {
                width: 100%;
            }

            .search-wrapper .search-input {
                width: 100%;
                padding-left: 35px;
                height: 36px;
                font-size: 0.95rem;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table.dataTable {
                width: 100% !important;
                display: block;
            }

            .dt-buttons {
                flex-wrap: wrap;
                gap: 6px;
            }

            .modal-content {
                padding: 15px;
            }

            .modal-title,
            .form-label,
            .form-control,
            .btn {
                font-size: 0.95rem;
            }

            .form-control {
                height: 38px;
            }
        }

        /* ===== Responsive for Mobiles (max-width: 576px) ===== */
        @media (max-width: 576px) {
            .header h4 {
                font-size: 1.2rem;
            }

            .breadcrumb {
                font-size: 0.85rem;
            }

            .btn {
                width: 100%;
                font-size: 0.9rem;
            }

            .search-wrapper {
                width: 100%;
            }

            .search-wrapper .search-input {
                width: 100%;
                padding-left: 35px;
                font-size: 0.9rem;
                height: 34px;
            }

            .search-wrapper .search-icon {
                left: 10px;
                font-size: 0.9rem;
            }

            .filter-row label,
            select.form-select {
                font-size: 0.9rem;
                width: 100%;
            }

            .dropdown-menu {
                width: 100%;
            }

            .dropdown-menu a {
                font-size: 0.9rem;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table.dataTable {
                display: block;
                width: 100% !important;
            }

            .modal-content {
                padding: 10px;
            }

            .modal-title {
                font-size: 1rem;
            }

            .form-label,
            .form-control,
            .btn {
                font-size: 0.85rem;
            }

            .form-control {
                height: 34px;
            }

            .btn-close {
                font-size: 0.9rem;
            }

            .dt-buttons {
                flex-direction: column;
                gap: 6px;
            }

            @media (max-width: 768px) {
                .modal-dialog {
                    max-width: 95% !important;
                    margin: 1rem auto;
                }
            }

            @media (max-width: 576px) {
                .modal-dialog {
                    max-width: 100% !important;
                    margin: 1rem auto;
                }
            }
        }
    </style>
</head>

<body>
    @include('layout.sidebarnew')

    <div class="header-container w-100">
        <div class="header d-flex justify-content-between align-items-center p-3">
            <h4 class="ms-2 mb-3">History</h4>
        </div>

        <div class="breadcrumb-buttons d-flex justify-content-between align-items-center px-3">
            <div class="breadcrumb ms-2">
                <a href="{{ route('dashboard') }}">Home</a>
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

        <!-- Table -->
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

    <!-- Calendar Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="calendarModalLabel"> Filter by Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="calendarFilterForm">
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" required />
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" required />
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- New Appointment Modal -->
    <div class="modal fade" id="myform" tabindex="-1" aria-labelledby="newAppointmentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="newAppointmentLabel"> New Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="contact_no" class="form-label">Contact No</label>
                            <input type="tel" class="form-control" id="contact_no" name="contact_no" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="preferred_date" class="form-label">Preferred Date</label>
                            <input type="date" class="form-control" id="preferred_date" name="preferred_date"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="preferred_time" class="form-label">Preferred Time</label>
                            <input type="time" class="form-control" id="preferred_time" name="preferred_time"
                                required />
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success">Submit Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
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
                                <i class="fa fa-eye"></i></button>`;
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
                const modal = new bootstrap.Modal(document.getElementById('calendarModal'));
                modal.show();
            });
            F

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
        }
    </script>
</body>

</html>
