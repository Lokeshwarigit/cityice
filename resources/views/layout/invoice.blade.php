<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: whitesmoke;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
        }

        .containers {
            width: 100%;
            padding: 10px 20px;
        }

        .top_nav {
            background-color: white;
            border-radius: 10px;
            height: 70px;
            padding: 10px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .breadcrumb-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            background-color: white;
            border-radius: 8px;
            padding: 0 20px;
            margin-bottom: 10px;
        }

        .breadcrumb-text {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
        }

        .breadcrumb-text a {
            color: black;
            text-decoration: none;
            font-weight: 500;
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: white;
            border: 1px solid #ced4da;
            padding: 6px 10px;
            border-radius: 6px;
            margin-left: auto;
            margin-right: 10px;
        }

        .search-box input {
            border: none;
            outline: none;
            background: transparent;
            margin-left: 8px;
            width: 200px;
        }

        .filter-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        #modal_calendra {
            background-color: blue;
            color: white;
            border: 1px solid #007bff;
            font-weight: 500;
        }

        table.dataTable thead th {
            background-color: #f8f9fa;
            color: #333;
        }

        table.dataTable tbody td {
            color: #333;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            display: none;
        }

        .btn.btn-outline-secondary.dropdown-toggle {
            background-color: white;
        }

        /* 🔻 FULL MEDIA QUERY RESPONSIVENESS */
        @media (max-width: 576px) {
            body {
                flex-direction: column;
            }

            .containers {
                padding: 10px;
            }

            .top_nav,
            .breadcrumb-buttons,
            .filter-row,
            .search-box,
            .dropdown,
            #showEntries,
            .d-flex.align-items-center.gap-2 {
                width: 100% !important;
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 10px;
                text-align: center;
            }

            .search-box input,
            #invoiceTable {
                width: 100% !important;
                font-size: 12px;
            }

            .search-box {
                justify-content: center;
            }

            .btn.btn-outline-secondary.dropdown-toggle {
                width: 100%;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .dataTables_wrapper .dataTables_paginate {
                text-align: center;
            }

            .breadcrumb-text {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
    @include('layout.sidebarnew')

    <div class="containers">
        <div class="top_nav">
            <h4>Invoice</h4>
            <p>Invoice details here</p>
        </div>

        <div class="breadcrumb-buttons">
            <div class="breadcrumb-text">
                <a href="#">Home</a>
                <i class="fa-solid fa-angles-right text-muted"></i>
                <span>Dashboard</span>
            </div>
            <button type="button" class="btn" id="modal_calendra" data-bs-toggle="modal"
                data-bs-target="#calendarModal">
                <i class="fa-solid fa-calendar-days me-1"></i>
            </button>
        </div>

        <div class="filter-row">
            <div class="search-box">
                <i class="fa fa-search text-muted"></i>
                <input type="text" id="searchBox" placeholder="Search" />
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
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>Servicing Date</th>
                        <th>Servicing By</th>
                        <th>Payment Mode</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Calendar Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="calendarModalLabel">Filter by Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fromDate" class="form-label">From</label>
                        <input type="date" id="fromDate" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="toDate" class="form-label">To</label>
                        <input type="date" id="toDate" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" id="resetDate">Reset</button>
                    <button type="button" class="btn btn-primary" id="searchDate">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#invoiceTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['print', 'copy', 'pdf', 'excel', 'csv', 'colvis'].map(type => ({
                    extend: type,
                    className: 'btn d-none'
                })),
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
              <button class="btn btn-sm btn-primary edit-btn" data-id="${row[0]}"><i class="fa fa-edit"></i></button>
              <button class="btn btn-sm btn-danger delete-btn" data-id="${row[0]}"><i class="fa fa-trash"></i></button>`;
                    }
                }]
            });

            $('#invoiceTable tbody').on('click', '.edit-btn', function() {
                alert('Edit ID: ' + $(this).data('id'));
            });

            $('#invoiceTable tbody').on('click', '.delete-btn', function() {
                if (confirm('Delete ID: ' + $(this).data('id') + '?')) {
                    alert('Deleted ID: ' + $(this).data('id'));
                }
            });

            $('#searchBox').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#showEntries').on('change', function() {
                table.page.len($(this).val() === "All" ? -1 : parseInt($(this).val())).draw();
            });

            $('#searchDate').click(function() {
                const fromDate = $('#fromDate').val();
                const toDate = $('#toDate').val();
                $.fn.dataTable.ext.search = [];
                if (fromDate && toDate) {
                    $.fn.dataTable.ext.search.push(function(settings, data) {
                        const date = new Date(data[2]);
                        return date >= new Date(fromDate) && date <= new Date(toDate);
                    });
                }
                table.draw();
                $('#calendarModal').modal('hide');
            });

            $('#resetDate').click(function() {
                $('#fromDate, #toDate').val('');
                $.fn.dataTable.ext.search = [];
                table.draw();
                $('#calendarModal').modal('hide');
            });
        });
    </script>
</body>
</html>
