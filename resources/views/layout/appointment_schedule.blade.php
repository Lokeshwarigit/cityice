<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appointment</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/appointment_schedule.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />

    <style>
        div.dt-button-collection {
            left: auto;
            right: 0 !important;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .profile-card {
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .profile-details {
            text-align: left;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: gray;
        }

        .search-input {
            padding-left: 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .header,
            .breadcrumb-buttons,
            .filter-row,
            .profile-card {
                flex-direction: column !important;
                align-items: flex-start !important;
                width: 100% !important;
            }

            .search-wrapper,
            .search-input,
            #showEntries,
            .dropdown .btn {
                width: 100% !important;
            }

            .search-wrapper {
                margin-bottom: 10px;
            }

            .profile-details {
                margin-top: 5px;
            }

            .table-wrapper {
                overflow-x: auto;
                width: 100%;
            }

            table.dataTable th,
            table.dataTable td {
                white-space: nowrap;
                font-size: 13px;
            }

            .header h4 {
                font-size: 18px;
            }

            .breadcrumb {
                font-size: 14px;
            }

            .profile-name {
                font-size: 14px;
            }

            .profile-email {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .header h4 {
                font-size: 16px;
            }

            .profile-card img {
                width: 40px;
                height: 40px;
            }

            .download-btn,
            .dropdown .btn {
                padding: 6px 8px;
                font-size: 12px;
            }

            .new-appointment-btn {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .search-wrapper {
                width: 100%;
            }
        }
    </style>
</head>

<body style="display: flex; background-color: lavender;">
    @include('layout.sidebarnew')

    <div class="header-container">

        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center p-3">
            <h4 class="ms-2 mt-1">Schedule</h4>
            <div class="profile-card d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Image" width="50"
                    class="rounded-circle me-2" />
                <div class="profile-details">
                    <div class="profile-name">Dinesh Kumar G.</div>
                    <div class="profile-email">dineshkumardextra@gmail.com</div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-buttons d-flex justify-content-between align-items-center px-3">
            <div class="breadcrumb ms-2">
                <a href="{{ route('dashboard') }}">Home</a>
                <i class="fa-solid fa-angles-right"></i> Dashboard
            </div>
        </div>

        <!-- Filter Controls -->
        <div class="filter-row d-flex justify-content-end align-items-center p-3 gap-3">
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
                    data-bs-toggle="dropdown" aria-expanded="false" style="background-color: white">
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

        <!-- Table Section -->
        <div class="table-wrapper pb-4">
            <table id="myTable" class="table table-striped display" style="width:99%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Request Date</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Scheduled Date</th>
                        <th>Scheduled Time</th>
                        <th>Services</th>
                        <th>Staff Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2025-06-10</td>
                        <td>John Doe</td>
                        <td>9876543210</td>
                        <td>john@example.com</td>
                        <td>123 Main St</td>
                        <td>2025-06-15</td>
                        <td>10:00 AM</td>
                        <td>Haircut</td>
                        <td>Confirmed</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item view-btn" href="#"><i
                                                class="fa-solid fa-eye me-2 text-primary"></i>View</a></li>
                                    <li><a class="dropdown-item edit-btn" href="#"><i
                                                class="fa-solid fa-pen-to-square me-2 text-warning"></i>Edit</a></li>
                                    <li><a class="dropdown-item delete-btn" href="#"><i
                                                class="fa-solid fa-trash me-2 text-danger"></i>Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
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

    <script>
        $(document).ready(function() {
            const table = $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        className: 'd-none'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'd-none'
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'd-none'
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
                const val = this.value === "All" ? -1 : parseInt(this.value);
                table.page.len(val).draw();
            });

            $('.search-input').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#btnPrint').on('click', () => table.button(0).trigger());
            $('#btnPDF').on('click', () => table.button(1).trigger());
            $('#btnCSV').on('click', () => table.button(2).trigger());
            $('#btnColVis').on('click', () => table.button(3).trigger());

            // Action dropdown handlers
            $(document).on('click', '.view-btn', function() {
                const name = $(this).closest('tr').find('td').eq(2).text();
                alert('Viewing: ' + name);
            });

            $(document).on('click', '.edit-btn', function() {
                const name = $(this).closest('tr').find('td').eq(2).text();
                alert('Editing: ' + name);
            });

            $(document).on('click', '.delete-btn', function() {
                const row = $(this).closest('tr');
                const name = row.find('td').eq(2).text();
                if (confirm('Delete ' + name + '?')) {
                    table.row(row).remove().draw();
                }
            });
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('appointments.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'request_date',
                        name: 'request_date'
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name'
                    },
                    {
                        data: 'contact_no',
                        name: 'contact_no'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'scheduled_date',
                        name: 'scheduled_date'
                    },
                    {
                        data: 'scheduled_time',
                        name: 'scheduled_time'
                    },
                    {
                        data: 'services',
                        name: 'services'
                    },
                    {
                        data: 'staff_remark',
                        name: 'staff_remark'
                    }
                ]
            });
        });
    </script>
</body>

</html>
