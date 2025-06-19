<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inventory</title>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('css/Inventory.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: whitesmoke;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            display: flex;
        }

        .containers {
            width: 97%;
            padding: 0 15px;
        }

        .top_nav,
        .breadcrumb-buttons {
            background-color: white;
            border-radius: 10px;
            padding: 15px 20px;
            margin: 10px 0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .top_nav h4,
        .top_nav p {
            margin-bottom: 0;
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 8px 12px 8px 35px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: #f9f9fc;
            /* width: 180px; */
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #999;
        }

        #productTable_filter,
        #productTable_length {
            display: none;
        }

        .custom-header th {
            background-color: #f1f1f1;
            color: #333;
            border-bottom: 1px solid #ccc;
        }

        #productTable tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #productTable tbody tr:hover {
            background-color: #eaeaea;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 10px;
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-low {
            background-color: #ffc107;
        }

        .status-available {
            background-color: #28a745;
        }

        .status-unavailable {
            background-color: #17a2b8;
        }

        /* Dropdown icon button style */
        .dropdown-toggle::after {
            display: none;
        }

        /* Action icons color */
        .dropdown-item.view-btn {
            color: #0d6efd;
            /* Bootstrap primary blue */
        }

        .dropdown-item.edit-btn {
            color: #000000;
            /* Black */
        }

        .dropdown-item.delete-btn {
            color: #dc3545;
            /* Bootstrap danger red */
        }

        /* Smaller dropdown button */
        .btn-sm.btn-link {
            font-size: 1.25rem;
            color: black;
        }

        #downloadDropdown.btn-outline-secondary-dropdown-toggle {
            background-color: white;
        }

        /* Base layout */
        .top-toolbar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding: 1rem 0;
        }

        .top-toolbar>* {
            flex: 1 1 auto;
        }

        .search-box {
            display: flex;
            align-items: center;
            /* padding: 6px 10px; */
            border: 1px solid #ced4da;
            border-radius: 6px;
            background: #fff;
        }

        .search-box i {
            margin-right: 8px;
            color: #aaa;
        }

        .search-input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
        }

        .entries-dropdown select,
        .download-button .btn {
            width: 100%;
        }

        /* Medium devices */
        @media (max-width: 768px) {
            .top-toolbar {
                flex-direction: column;
                align-items: stretch;
            }
        }

        /* Extra small devices */
        @media (max-width: 480px) {

            .search-input,
            .entries-dropdown select,
            .download-button .btn {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .containers {
                width: 100%;
                padding: 0 10px;
            }

            .top_nav h4 {
                font-size: 1.25rem;
            }

            .top_nav p {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.85rem;
            }

            .dropdown-menu {
                font-size: 0.85rem;
            }

            .status-badge {
                font-size: 0.75rem;
                padding: 4px 8px;
            }

            .search-input {
                font-size: 0.9rem;
            }

            #productTable th,
            #productTable td {
                padding: 8px 10px;
            }

            @media (max-width: 992px) {
                .filter-row {
                    /* flex-direction: column; */
                    align-items: stretch;
                    gap: 10px;
                }

                .breadcrumb-buttons {
                    /* flex-direction: column; */
                    align-items: flex-start;
                    gap: 10px;
                }

                .table-responsive {
                    overflow-x: auto;
                }

                #productTable {
                    font-size: 0.85rem;
                }

                .search-input {
                    width: 100%;
                }

                #showEntries {
                    width: 100%;
                }

                .dropdown-menu {
                    min-width: 100px;
                }

                .btn-sm.btn-link {
                    font-size: 1rem;
                }

                .modal-dialog {
                    width: 90%;
                    max-width: none;
                    margin: 1rem auto;
                }

                .breadcrumb {
                    element.style {
                        margin-left: 10px;
                        position: relative;
                        right: 116px;
                    }
                }
            }

        }
    </style>
</head>

<body>
    @include('layout.sidebarnew')
    <div class="containers">
        <div class="top_nav">
            <h4>Inventory</h4>
            <p>Inventory product details here</p>
        </div>

        <div class="breadcrumb-buttons d-flex justify-content-between align-items-center">
            <div class="breadcrumb" style="margin-left: 10px">
                <a href="{{ route('dashboard') }}">Home</a>
                <i class="fa-solid fa-angles-right mx-2" style="margin-top: 5px;"></i> Dashboard
            </div>
            <button class="btn btn-primary" id="btnAddNew"><i class="fas fa-plus"></i> New product</button>
        </div>

        <div class="filter-row d-flex justify-content-end align-items-center gap-3 my-3">
            <div class="search-box">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="searchBox" class="search-input" placeholder="Search" />
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

        <div class="table-responsive">
            <table id="productTable" class="table table-bordered table-striped">
                <thead class="custom-header">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        @php
                            $statusClass = '';
                            if ($product->status == 'Low stock') {
                                $statusClass = 'status-low';
                            } elseif ($product->status == 'Available') {
                                $statusClass = 'status-available';
                            } elseif ($product->status == 'Not Available') {
                                $statusClass = 'status-unavailable';
                            }
                        @endphp
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->Brand }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>${{ $product->price }}</td>
                            <td><span class="status-badge {{ $statusClass }}">{{ $product->status }}</span></td>
                            <td>
                                <!-- Three dots dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-link p-1 dropdown-toggle" type="button"
                                        id="dropdownMenuButton{{ $product->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false" style="color: black;">
                                        <i class="fa fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $product->id }}">
                                        <li><a class="dropdown-item view-btn" href="#"
                                                data-id="{{ $product->id }}"><i class="fa fa-eye me-2"></i>View</a>
                                        </li>
                                        <li><a class="dropdown-item edit-btn" href="#"
                                                data-id="{{ $product->id }}"><i class="fa fa-pen me-2"></i>Edit</a>
                                        </li>
                                        <li><a class="dropdown-item delete-btn" href="#"
                                                data-id="{{ $product->id }}"><i
                                                    class="fa fa-trash me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="productForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editRowIndex" />
                        <div class="mb-3">
                            <label>ID</label>
                            <input type="text" class="form-control" id="productId" required />
                        </div>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" id="productName" required />
                        </div>
                        <div class="mb-3">
                            <label>Brand</label>
                            <input type="text" class="form-control" id="productBrand" required />
                        </div>
                        <div class="mb-3">
                            <label>Qty</label>
                            <input type="number" class="form-control" id="productQty" required />
                        </div>
                        <div class="mb-3">
                            <label>Price</label>
                            <input type="number" class="form-control" id="productPrice" required />
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-select" id="productStatus" required>
                                <option value="">Select</option>
                                <option value="Low stock">Low Stock</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            const table = $('#productTable').DataTable({
                "lengthChange": false
            });

            // Custom search box
            $('#searchBox').on('keyup', function() {
                table.search(this.value).draw();
            });

            // Custom entries selector
            $('#showEntries').on('change', function() {
                let val = $(this).val();
                if (val === 'All') {
                    table.page.len(-1).draw();
                } else {
                    table.page.len(parseInt(val)).draw();
                }
            });

            // Add New Product
            $('#btnAddNew').click(function() {
                $('#productForm')[0].reset();
                $('#editRowIndex').val('');
                $('#productModal').modal('show');
            });

            // Handle View button click
            $('#productTable tbody').on('click', 'a.view-btn', function(e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const rowData = table.row(row).data();

                alert(
                    `Product Details:\n\nID: ${rowData[0]}\nName: ${rowData[1]}\nBrand: ${rowData[2]}\nQuantity: ${rowData[3]}\nPrice: ${rowData[4]}\nStatus: ${$($(rowData[5])).text()}`
                );
            });

            // Handle Edit button click
            $('#productTable tbody').on('click', 'a.edit-btn', function(e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const rowData = table.row(row).data();

                $('#editRowIndex').val(table.row(row).index());
                $('#productId').val(rowData[0]);
                $('#productName').val(rowData[1]);
                $('#productBrand').val(rowData[2]);
                $('#productQty').val(rowData[3]);
                $('#productPrice').val(rowData[4].replace('$', ''));
                $('#productStatus').val($($(rowData[5])).text().trim());
                $('#productModal').modal('show');
            });

            // Handle Delete button click
            $('#productTable tbody').on('click', 'a.delete-btn', function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete this product?')) {
                    table.row($(this).closest('tr')).remove().draw();
                }
            });

            // Submit form (Add or Edit product)
            $('#productForm').submit(function(e) {
                e.preventDefault();

                let id = $('#productId').val();
                let name = $('#productName').val();
                let brand = $('#productBrand').val();
                let qty = $('#productQty').val();
                let price = $('#productPrice').val();
                let status = $('#productStatus').val();

                if (!id || !name || !brand || !qty || !price || !status) {
                    alert('Please fill all fields.');
                    return;
                }

                let statusClass = '';
                if (status === 'Low stock') statusClass = 'status-low';
                else if (status === 'Available') statusClass = 'status-available';
                else if (status === 'Not Available') statusClass = 'status-unavailable';

                let statusHtml = `<span class="status-badge ${statusClass}">${status}</span>`;

                let actionHtml = `
                    <div class="dropdown">
                        <button class="btn btn-sm btn-link p-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            <i class="fa fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item view-btn" href="#"><i class="fa fa-eye me-2"></i>View</a></li>
                            <li><a class="dropdown-item edit-btn" href="#"><i class="fa fa-pen me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item delete-btn" href="#"><i class="fa fa-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                `;

                let editRowIndex = $('#editRowIndex').val();

                if (editRowIndex === '') {
                    // Add new row
                    table.row.add([
                        id,
                        name,
                        brand,
                        qty,
                        `$${price}`,
                        statusHtml,
                        actionHtml
                    ]).draw(false);
                } else {
                    // Update existing row
                    table.row(parseInt(editRowIndex)).data([
                        id,
                        name,
                        brand,
                        qty,
                        `$${price}`,
                        statusHtml,
                        actionHtml
                    ]).draw(false);
                }

                $('#productModal').modal('hide');
            });
        });
    </script>
</body>

</html>
