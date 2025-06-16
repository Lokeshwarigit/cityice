<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/appointment.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: lavender;
            display: flex;
        }

        .custom-modal {
            background-color: white !important;
            border-radius: 20px;
            max-width: 400px;
            margin: auto;
        }

        .input-bg {
            background-color: whitesmoke !important;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px;
        }
    </style>
</head>

<body>
    @include('layout.sidebarnew')

    <div class="header-container">
        <div class="header">
            <h4>Appointment</h4>
            <div class="profile-card">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile Image">
                <div class="profile-details">
                    <div class="profile-name">Dinesh kumar .G</div>
                    <div class="profile-email">dineshkumardextra@gmail.com</div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-buttons">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a>
                <i class="fa-solid fa-angles-right"></i>
                Dashboard
            </div>

            <div>
                <button type="button" class="btn btn-primary" id="modal_calendra"
                    style="margin-right:20px; margin-top: 15px;">
                    <i class="fa-solid fa-calendar-days"></i>
                </button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myform"
                    style="margin-top: 10px; margin-right:20px;">
                    <i class="fa-solid fa-plus"></i> New Appointment
                </button>
            </div>
        </div>

        <!-- Calendar Modal (move this OUTSIDE breadcrumb-buttons) -->
        <div class="modal" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4 text-center custom-modal">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title w-100 fw-bold" id="calendarModalLabel">Choose date & Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="position: absolute; right: 16px; top: 16px;"></button>
                    </div>
                    <form id="calendarFilterForm" class="w-100">
                        <div class="modal-body pt-3">
                            <div class="mb-3 text-start">
                                <select class="form-select input-bg" name="status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="All">All</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="Assigned">Assigned</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>

                            <div class="mb-3 text-start">
                                <input type="date" class="form-control input-bg" name="from_date" value="2025-01-01"
                                    required />
                            </div>

                            <div class="mb-3 text-start">
                                <input type="date" class="form-control input-bg" name="to_date" value="2025-08-30"
                                    required />
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal fade" id="myform" tabindex="-1" aria-labelledby="myformLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="myformLabel">Customer Request Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="sno" class="form-label">S.No</label>
                            <input type="number" class="form-control" id="sno" name="sno" required>
                        </div>

                        <div class="mb-3">
                            <label for="requestDate" class="form-label">Request Date</label>
                            <input type="date" class="form-control" id="requestDate" name="requestDate" required>
                        </div>

                        <div class="mb-3">
                            <label for="customerName" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" name="customerName" required>
                        </div>

                        <div class="mb-3">
                            <label for="contactNo" class="form-label">Contact No</label>
                            <input type="tel" class="form-control" id="contactNo" name="contactNo" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="preferredDate" class="form-label">Preferred Date</label>
                            <input type="date" class="form-control" id="preferredDate" name="preferredDate" required>
                        </div>

                        <div class="mb-3">
                            <label for="preferredTime" class="form-label">Preferred Time</label>
                            <input type="time" class="form-control" id="preferredTime" name="preferredTime" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- </div>
    </div> --}}
    <div class="filter-row">
        <!-- Search -->
        {{-- <div class="search-box">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" id="customSearch" placeholder="Search" class="search-input" />
        </div> --}}

        <!-- Entries + Download -->
        <div class="filter-controls">
            <div class="filter-dropdown">
                <label for="showEntries">Entries</label>
                <select id="showEntries">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>

            <!-- File input hidden -->
            <input type="file" id="fileInput" style="display: none;" />

            <!-- Download Button -->
            <button class="download-btn" onclick="document.getElementById('fileInput').click()">
                <i class="fa-solid fa-download"></i>
            </button>
        </div>
    </div>

    <!-- DATA TABLE -->
    <table id="myTable" class="display" style="width:100%">
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>374</td>
                <td>01-04-2025</td>
                <td>MIKA ITO</td>
                <td>92458658</td>
                <td>ito0416mika@gmail.com</td>
                <td>87 Hougang Avenue 2 #14-32</td>
                <td>01-02-2025</td>
                <td>09:00-09:30</td>
            </tr>
        </tbody>

    </table>
    {{-- </div> --}}




    <!-- Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const calendarModal = new bootstrap.Modal(document.getElementById('calendarModal'), {
                backdrop: false
            });

            document.getElementById("modal_calendra").addEventListener("click", function () {
                calendarModal.show();
            });

            document.getElementById('calendarFilterForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const status = this.status.value;
                const fromDate = this.from_date.value;
                const toDate = this.to_date.value;

                console.log("Status:", status);
                console.log("From:", fromDate);
                console.log("To:", toDate);

                calendarModal.hide();
            });

            $(document).ready(function () {
                const table = $('#myTable').DataTable({
                    ajax: "{{ route('appointments.list') }}",
                    columns: [
                        { data: 'sno' },
                        { data: 'request_date' },
                        { data: 'customer_name' },
                        { data: 'contact_no' },
                        { data: 'email' },
                        { data: 'address' },
                        { data: 'preferred_date' },
                        { data: 'preferred_time' }
                    ],
                    pageLength: 10,
                    lengthChange: false,
                    ordering: true
                });

                // Reload after modal submit
                $('#myform').on('hidden.bs.modal', function () {
                    table.ajax.reload(null, false);
                });

                $('#customSearch').on('keyup', function () {
                    table.search(this.value).draw();
                });

                $('#showEntries').on('change', function () {
                    table.page.len(this.value).draw();
                });
                document.addEventListener("DOMContentLoaded", function () {
                    const calendarModal = new bootstrap.Modal(document.getElementById('calendarModal'), {
                        backdrop: false
                    });

                    document.getElementById("modal_calendra").addEventListener("click", function () {
                        calendarModal.show();
                    });

                    document.getElementById('calendarFilterForm').addEventListener('submit', function (e) {
                        e.preventDefault();

                        const status = this.status.value;
                        const fromDate = this.from_date.value;
                        const toDate = this.to_date.value;

                        console.log("Status:", status);
                        console.log("From:", fromDate);
                        console.log("To:", toDate);

                        calendarModal.hide();
                    });
                });
            });
        });
    </script>
</body>