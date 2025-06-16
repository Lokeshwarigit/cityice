<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Appointment History</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/appointment_history.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />

    <style>
        body {
            display: flex;
            background-color: lavender;
        }

        .dt-button-collection {
            right: 0 !important;
        }

        .search-wrapper {
            position: relative;
        }

        .search-input {
            padding-left: 30px;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: gray;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .modal-content {
            border-radius: 1rem !important;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.2);
        }

        .modal-body input[type="date"] {
            position: relative;
        }

        .modal-body i.fa-calendar-days {
            pointer-events: none;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .breadcrumb-buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter-row {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .search-wrapper {
                width: 100%;
            }

            .search-input {
                width: 100%;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table.dataTable td {
                white-space: nowrap;
            }

            .modal-dialog {
                margin: 1rem auto;
                max-width: 95%;
            }

            .modal-content {
                padding: 1rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .form-control,
            .form-select {
                font-size: 0.9rem;
            }

            #showEntries {
                width: 100%;
            }

            .dropdown {
                width: 100%;
            }

            .dropdown-toggle {
                width: 100%;
                text-align: left;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    @include('layout.sidebarnew')

    <div class="header-container w-100">
        <div class="header d-flex justify-content-between align-items-center p-3">
            <h4 class="ms-2 mb-3">Appointment History</h4>
            <div class="profile-card d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile" width="50"
                    class="rounded-circle me-2">
                <div>
                    <div class="profile-name">Dinesh Kumar G.</div>
                    <div class="profile-email">dineshkumardextra@gmail.com</div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-buttons d-flex justify-content-between align-items-center px-3">
            <div class="breadcrumb ms-2">
                <a href="{{ route('dashboard') }}">Home</a>
                <i class="fa-solid fa-angles-right"></i> Dashboard
            </div>
            <div>
                <button type="button" class="btn btn-primary me-2 mt-2" data-bs-toggle="modal"
                    data-bs-target="#calendarModal">
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
                    <input type="text" placeholder="Search" class="form-control search-input" />
                </div>
                <label for="showEntries">Entries</label>
                <select id="showEntries" class="form-select w-auto">
                    <option value="All">All</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-download"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="btnPrint">Print</a></li>
                        <li><a class="dropdown-item" href="#" id="btnPDF">PDF</a></li>
                        <li><a class="dropdown-item" href="#" id="btnCSV">CSV</a></li>
                        <li><a class="dropdown-item" href="#" id="btnColVis">Toggle Columns</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="table-wrapper pb-4 px-3">
            <table id="myTable" class="table table-striped display nowrap" style="width:100%">
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
    {{-- 
    @include('modals.appointment_modal') --}}
    <!-- Calendar Filter Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow p-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 text-center fw-bold" id="calendarModalLabel">Choose date & Status</h5>
                </div>
                <form id="filterForm">
                    <div class="modal-body pt-3">
                        <div class="mb-3">
                            <select class="form-select rounded-3" id="statusFilter" name="status" required>
                                <option selected disabled>Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="date" class="form-control rounded-3 pe-5" id="startDate" name="start_date"
                                required>
                            <i
                                class="fa-solid fa-calendar-days position-absolute end-0 top-50 translate-middle-y me-3 text-muted"></i>
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="date" class="form-control rounded-3 pe-5" id="endDate" name="end_date"
                                required>
                            <i
                                class="fa-solid fa-calendar-days position-absolute end-0 top-50 translate-middle-y me-3 text-muted"></i>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center pt-0">
                        <button type="submit" class="btn btn-primary w-100 rounded-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- New Appointment Modal -->
    <div class="modal fade" id="myform" tabindex="-1" aria-labelledby="appointmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center fw-bold" id="appointmentModalLabel">New Appointment</h5>
                </div>
                <form id="appointmentForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">S.No</label>
                                <input type="number" class="form-control" name="s_no" id="s_no"
                                    placeholder="Auto" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Request Date</label>
                                <input type="date" class="form-control" name="request_date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact No</label>
                                <input type="text" class="form-control" name="contact_no" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="address" rows="2" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" class="form-control" name="preferred_date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Preferred Time</label>
                                <input type="time" class="form-control" name="preferred_time" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </div>
                </form>
            </div>
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
                ajax: {
                    url: "{{ route('appointmenthistory.list') }}",
                    data: function(d) {
                        d.status = $('#statusFilter').val();
                        d.start_date = $('#startDate').val();
                        d.end_date = $('#endDate').val();
                    }
                },
                columns: [{
                        data: null,
                        render: (data, type, row, meta) => 1001 + meta.row + meta.settings
                            ._iDisplayStart
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
                        render: row => `
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item view-appointment" href="#" data-id="${row.id}"><i class="fa fa-eye"></i> View</a></li>
                                </ul>
                            </div>`
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
                const val = $(this).val();
                table.page.len(val === 'All' ? -1 : parseInt(val)).draw();
            });

            $('.search-input').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#btnPrint').on('click', () => table.button(0).trigger());
            $('#btnPDF').on('click', () => table.button(1).trigger());
            $('#btnCSV').on('click', () => table.button(2).trigger());
            $('#btnColVis').on('click', () => table.button(3).trigger());

            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                $('#calendarModal').modal('hide');
                table.ajax.reload();
            });

            $('#appointmentForm').on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('appointmenthistory.store') }}",
                    method: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        $('#myform').modal('hide');
                        $('#appointmentForm')[0].reset();
                        table.ajax.reload(null, false);
                        alert('Appointment added successfully!');
                    },
                    error: function(xhr) {
                        alert('Failed to save appointment');
                        console.error(xhr.responseText);
                    }
                });
            });
            $('#myform').on('shown.bs.modal', function() {
                const baseSno = 1001; // or any desired start value
                const currentCount = $('#myTable').DataTable().data().count();
                $('#s_no').val(baseSno + currentCount);
            });
        });
    </script>
</body>

</html>
