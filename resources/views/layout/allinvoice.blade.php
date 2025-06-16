<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Invoices</title>

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
      background-color: white;
      border-radius: 8px;
      padding: 0 20px;
      margin-bottom: 10px;
    }

    .breadcrumb-text a {
      color: black;
      text-decoration: none;
      font-weight: 500;
    }

    .filter-row {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      margin-bottom: 10px;
    }

    .search-box {
      display: flex;
      align-items: center;
      background-color: white;
      border: 1px solid #ced4da;
      padding: 6px 10px;
      border-radius: 6px;
      margin-right: 10px;
    }

    .search-box input {
      border: none;
      outline: none;
      background: transparent;
      margin-left: 8px;
      width: 200px;
    }

    .search-box label {
      margin-top: 5px;
    }

    .date-sidebar {
      position: fixed;
      top: 0;
      right: -320px;
      width: 300px;
      height: 100%;
      background: #fff;
      box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
      transition: right 0.3s ease-in-out;
      z-index: 1050;
    }

    .date-sidebar.active {
      right: 0;
    }

    table.dataTable thead th {
      background-color: #f8f9fa;
    }

    table .btn {
      padding: 2px 8px;
      font-size: 12px;
    }

    .dataTables_wrapper div.dataTables_filter {
      display: none;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .filter-row {
        flex-direction: column;
        align-items: stretch;
      }

      .search-box input {
        width: 100%;
      }

      .search-box {
        margin-right: 0;
      }

      .date-sidebar {
        width: 100%;
        right: -100%;
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
        <i class="fa-solid fa-angles-right text-muted mx-1"></i>
        <span>Dashboard</span>
      </div>
      <button type="button" class="btn" id="toggleSidebar">
        <i class="fa-solid fa-calendar-days me-1"></i>
      </button>
    </div>

    <div class="filter-row">
      <div class="search-box">
        <i class="fa fa-search search-icon"></i>
        <input type="text" id="searchBox" placeholder="Search" />
      </div>

      <label for="showEntries" style="margin-top: 5px;">Entries</label>
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
        <tbody>
          <tr>
            <td>1</td>
            <td>INV-001</td>
            <td>2025-06-10</td>
            <td>John Doe</td>
            <td>1234567890</td>
            <td>Chennai</td>
            <td>2025-06-12</td>
            <td>Technician A</td>
            <td>Cash</td>
            <td>
              <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary">View</button>
                <button class="btn btn-sm btn-success">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Sidebar Filter -->
  <div id="calendarSidebar" class="date-sidebar">
    <button type="button" class="btn-close" id="closeSidebar"></button>
    <h5>Filter by Date</h5>
    <div class="mb-3">
      <label for="fromDate" class="form-label">From Date</label>
      <input type="date" id="fromDate" class="form-control" />
    </div>
    <div class="mb-3">
      <label for="toDate" class="form-label">To Date</label>
      <input type="date" id="toDate" class="form-control" />
    </div>
    <div class="d-grid gap-2">
      <button type="button" class="btn btn-primary" id="searchDate">Search</button>
      <button type="button" class="btn btn-secondary" id="resetDate">Reset</button>
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

  <!-- DataTables Setup -->
  <script>
    $(document).ready(function () {
      let table = $('#invoiceTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          { extend: 'print', className: 'btn d-none' },
          { extend: 'copy', className: 'btn d-none' },
          { extend: 'pdf', className: 'btn d-none' },
          { extend: 'excel', className: 'btn d-none' },
          { extend: 'csv', className: 'btn d-none' },
          { extend: 'colvis', className: 'btn d-none' }
        ]
      });

      $('#btnPrint').click(() => table.button(0).trigger());
      $('#btnCopy').click(() => table.button(1).trigger());
      $('#btnPDF').click(() => table.button(2).trigger());
      $('#btnExcel').click(() => table.button(3).trigger());
      $('#btnCSV').click(() => table.button(4).trigger());
      $('#btnColVis').click(() => table.button(5).trigger());

      $('#searchBox').on('keyup', function () {
        table.search(this.value).draw();
      });

      $('#showEntries').on('change', function () {
        table.page.len(this.value === "All" ? -1 : parseInt(this.value)).draw();
      });

      $('#toggleSidebar').click(() => $('#calendarSidebar').addClass('active'));
      $('#closeSidebar').click(() => $('#calendarSidebar').removeClass('active'));

      $('#searchDate').click(function () {
        const from = $('#fromDate').val(), to = $('#toDate').val();
        $.fn.dataTable.ext.search = [];
        if (from && to) {
          $.fn.dataTable.ext.search.push((settings, data) => {
            const date = new Date(data[2]);
            return date >= new Date(from) && date <= new Date(to);
          });
        }
        table.draw();
        $('#calendarSidebar').removeClass('active');
      });

      $('#resetDate').click(function () {
        $('#fromDate, #toDate').val('');
        $.fn.dataTable.ext.search = [];
        table.draw();
        $('#calendarSidebar').removeClass('active');
      });
    });
  </script>
</body>

</html>
