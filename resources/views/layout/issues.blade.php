<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Issue</title>

    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: whitesmoke;
            display: flex;
        }

        .containers {
            width: 100%;
            padding: 0 15px;
        }

        .top_nav {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            margin: 5px auto 15px;
            width: 100%;
            height: 70px;
            position: relative;
        }

        .top_nav h4 {
            font-size: 20px;
            color: #222;
            margin: 0;
            position: absolute;
            left: 20px;
            top: 20px;
        }

        .top_nav p {
            font-size: 14px;
            color: #888;
            margin: 0;
            position: absolute;
            left: 20px;
            top: 45px;
        }

        .breadcrumb-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            width: 100%;
            height: 60px;
            border-radius: 8px;
            margin: 5px 0;
            padding: 0 10px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: 10px;
            margin-top: 10px;
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .filter-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* flex-wrap: wrap; */
            margin: 20px 0;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 0.4rem 0.8rem;
            min-width: 150px;
            margin-left: auto;
        }

        .search-icon {
            color: #aaa;
            margin-right: 0.5rem;
        }

        .search-input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 1rem;
            flex-grow: 1;
        }

        .dt-buttons.btn-group.flex-wrap {
            display: none;
        }

        #invoiceTable_filter.dataTables_filter {
            display: none;
        }

        /* === Responsive Media Queries === */

        /* Tablet and Below (max-width: 768px) */
        *===Responsive Media Queries===*/
        /* Tablet and Below (max-width: 768px) */
        @media (max-width: 768px) {

            /* Stack breadcrumb and button vertically */
            .breadcrumb-buttons {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            /* Stack filters vertically */
            .filter-row {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            /* Full width search box */
            .search-box {
                /* width: 100%; */

            }

            .search-input {
                width: 100%;


                /* Full width dropdown and entry selector */
                .d-flex.gap-2 {
                    flex-direction: column;
                    align-items: stretch;
                    width: 100%;
                }

                #showEntries,
                .dropdown .btn {
                    width: 100%;
                }

                /* Responsive table */
                .table-responsive {
                    overflow-x: auto;
                }

                /* Smaller font inside table for mobile */
                #invoiceTable {
                    font-size: 13px;
                }

                /* Modal responsiveness */
                .modal-dialog {
                    margin: 1rem;
                }

                .modal-content {
                    font-size: 14px;
                }

                .modal .form-label {
                    font-size: 13px;
                }
            }

            @media (max-width: 768px) {
                .filter-row {
                    flex-direction: column;
                    align-items: stretch;
                }

                .search-box {
                    width: 100%;
                }

                .d-flex.gap-2 {
                    flex-direction: column;
                    align-items: stretch;
                    width: 100%;
                }

                #showEntries,
                .dropdown-toggle {
                    width: 100%;
                }

                .dropdown-menu {
                    width: 100%;
                }
            }

            @media (max-width: 480px) {
                .search-input {
                    font-size: 0.9rem;
                }

                .dropdown-toggle {
                    font-size: 0.9rem;
                }

                label[for="showEntries"] {
                    font-size: 0.9rem;
                }

                /* RESPONSIVE FOR TABLETS (MEDIA COURIER) */
                @media (max-width: 768px) {
                    .filter-row {
                        flex-direction: column;
                        align-items: stretch;
                    }

                    .search-box {
                        width: 100%;
                    }

                    .d-flex.gap-2 {
                        flex-direction: column;
                        width: 100%;
                        align-items: stretch;
                    }

                    #showEntries,
                    .dropdown-toggle {
                        width: 100%;
                    }

                    .dropdown-menu {
                        width: 100%;
                    }
                }

                /* RESPONSIVE FOR SMALL DEVICES (MOBILE) */
                @media (max-width: 480px) {

                    .search-input,
                    .dropdown-toggle,
                    label[for="showEntries"] {
                        font-size: 0.9rem;
                    }

                    .filter-row {
                        gap: 10px;
                    }

                    .search-box {
                        padding: 5px 10px;
                    }
                }

                /* Optional: Adjust modal padding on mobile for better fit */
                @media (max-width: 480px) {
                    .modal-content {
                        padding: 10px;
                    }

                    .modal-header h5 {
                        font-size: 1rem;
                    }

                    .modal-body .form-label {
                        font-size: 0.9rem;
                    }

                    .modal-body .form-control {
                        font-size: 0.9rem;
                    }

                    .modal-footer button {
                        font-size: 0.9rem;
                    }
                }

                /* Base style: Ensure some margin for spacing */
                #btnAddNew {
                    white-space: nowrap;
                    margin-top: 10px;
                }

                /* Tablet View (Media Courier) */
                @media (max-width: 768px) {
                    #btnAddNew {
                        width: 100%;
                        text-align: center;
                        font-size: 1rem;
                        padding: 10px;
                    }
                }

                /* Mobile View */
                @media (max-width: 480px) {
                    #btnAddNew {
                        font-size: 0.95rem;
                        padding: 10px 14px;
                    }
                }
            }
    </style>
</head>

<body>
    @include('layout.sidebarnew')

    <div class="containers">
        <div class="top_nav">
            <h4>Issue Invoice</h4>
            <p>Issue details here</p>
        </div>

        <div class="breadcrumb-buttons">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a>
                <i class="fa-solid fa-angles-right mx-2"></i> Dashboard
            </div>
            <button class="btn btn-primary" id="btnAddNew" data-bs-toggle="modal" data-bs-target="#invoiceModal">
                <i class="fas fa-plus"></i> New Invoice
            </button>
        </div>

        <div class="filter-row">
            <div class="search-box">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="searchBox" class="search-input" placeholder="Search" />
            </div>

            <div class="d-flex align-items-center gap-2">
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
                        <li><a class="dropdown-item" href="#" id="btnCopy">Copy</a></li>
                        <li><a class="dropdown-item" href="#" id="btnPDF">PDF</a></li>
                        <li><a class="dropdown-item" href="#" id="btnExcel">Excel</a></li>
                        <li><a class="dropdown-item" href="#" id="btnCSV">CSV</a></li>
                        <li><a class="dropdown-item" href="#" id="btnColVis">Toggle Columns</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="invoiceTable" class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>App Date</th>
                        <th>App Time</th>
                        <th>Services</th>
                        <th>Staff Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="invoiceForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="invoiceModalLabel">New Invoice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-md-3">
                            <label class="form-label">No</label>
                            <input type="number" class="form-control" name="no" required>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact No</label>
                            <input type="text" class="form-control" name="contact" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">App Date</label>
                            <input type="date" class="form-control" name="app_date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">App Time</label>
                            <input type="time" class="form-control" name="app_time" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Services</label>
                            <input type="text" class="form-control" name="services" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Staff Remarks</label>
                            <input type="text" class="form-control" name="remarks">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            const table = $('#invoiceTable').DataTable({
                ajax: "{{ route('invoices.fetch') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'contact'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'app_date'
                    },
                    {
                        data: 'app_time'
                    },
                    {
                        data: 'services'
                    },
                    {
                        data: 'remarks'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item view-btn" href="#" data-id="${row.id}"><i class="fa fa-eye text-primary"></i> View</a></li>
                                        <li><a class="dropdown-item edit-btn" href="#" data-id="${row.id}"><i class="fa fa-pen text-warning"></i> Edit</a></li>
                                        <li><a class="dropdown-item delete-btn" href="#" data-id="${row.id}"><i class="fa fa-trash text-danger"></i> Delete</a></li>
                                    </ul>
                                </div>`;
                        }
                    }
                ],
                dom: 'Bfrtip',
                buttons: ['print', 'copy', 'csv', 'excel', 'pdf', 'colvis']
            });

            $('#searchBox').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#showEntries').on('change', function() {
                const value = this.value === 'All' ? -1 : parseInt(this.value);
                table.page.len(value).draw();
            });

            $('#invoiceForm').on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                $.post("{{ route('invoices.store') }}", formData, function() {
                    $('#invoiceModal').modal('hide');
                    $('#invoiceForm')[0].reset();
                    table.ajax.reload();
                });
            });

            $('#invoiceTable tbody').on('click', '.delete-btn', function() {
                const id = $(this).data('id');
                if (confirm('Are you sure?')) {
                    $.ajax({
                        url: `/invoice/${id}`,
                        type: 'DELETE',
                        success: function() {
                            table.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
