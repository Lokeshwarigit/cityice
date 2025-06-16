<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Table</title>
    <link rel="stylesheet" href="{{ asset('css/mailingnew.css') }}">
    

</head>

<body style="display: flex">
    @include('layout.sidebarnew')
    <div class="container">
        <div class="mailing_container">
            <div class="top_nav">
                <h4>Send Mailing Details here</h4>
                <p>Send Mail here!</p>
            </div>
        </div>

        <div class="breadcrumb-buttons">

            <div class="breadcrumb">
                <a href="#">Home</a> <i class="fa-solid fa-angles-right"></i> Dashboard
            </div>
            <div class="btn-group">
                <button class="btn-outline-mailinglist">Mailing list</button>
                <button class="btn-primary">Send Email</button>
                <button class="btn-outline-emailsend">Email sent</button>

            </div>
        </div>


        <div class="controls">
            <input type="text" id="searchInput" placeholder="Search by Mailing List..." />
            <select id="filterSelect">
                <option value="">All</option>
                <option value="Residential">Residential</option>
                <option value="Commercial">Commercial</option>
            </select>
        </div>

        <table id="dataTable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Mailing List</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- JS will populate this -->
            </tbody>


        </table>
        <div class="pagination" id="paginationControls"></div>

        <script>
            const data = [{
                    id: 1,
                    list: 'Residential'
                },
                {
                    id: 2,
                    list: 'Residential'
                },
                {
                    id: 3,
                    list: 'Commercial'
                },
                {
                    id: 4,
                    list: 'Residential'
                },
                {
                    id: 5,
                    list: 'Commercial'
                },
                {
                    id: 6,
                    list: 'Residential'
                },
                {
                    id: 7,
                    list: 'Residential'
                },
                {
                    id: 8,
                    list: 'Commercial'
                },
                {
                    id: 9,
                    list: 'Residential'
                },
                {
                    id: 10,
                    list: 'Commercial'
                },
                {
                    id: 11,
                    list: 'Residential'
                },
                {
                    id: 12,
                    list: 'Commercial'
                },
                {
                    id: 13,
                    list: 'Residential'
                },
                {
                    id: 14,
                    list: 'Commercial'
                },
                {
                    id: 15,
                    list: 'Residential'
                },
            ];

            const tableBody = document.getElementById('tableBody');
            const searchInput = document.getElementById('searchInput');
            const filterSelect = document.getElementById('filterSelect');
            const paginationControls = document.getElementById('paginationControls');

            let currentPage = 1;
            const rowsPerPage = 10;
            let filteredData = [...data];

            function renderTable(dataSlice) {
                tableBody.innerHTML = '';
                dataSlice.forEach((item, index) => {
                    const row = `
      <tr>
        <td>${String(index + 1 + (currentPage - 1) * rowsPerPage).padStart(2, '0')}</td>
        <td>${item.list}</td>
        <td class="actions">
          <div class="dropdown">
            <button class="dots-btn">⋮</button>
            <div class="dropdown-content">
              <button class="edit"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></i> </button>
              <button class="view"><i class="fa-solid fa-eye" style="color: #000205;"></i></button>
              <button class="delete"><i class="fa-solid fa-trash" style="color: #000205;"></i></button>
            </div>
          </div>
        </td>
      </tr>
    `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });

                // Add toggle event after rendering
                document.querySelectorAll('.dots-btn').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        closeAllDropdowns();
                        const dropdown = this.nextElementSibling;
                        dropdown.classList.toggle('show');
                    });
                });

                // Close dropdowns on outside click
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.dropdown')) {
                        closeAllDropdowns();
                    }
                });

            }

            function closeAllDropdowns() {
                document.querySelectorAll('.dropdown-content').forEach(drop => {
                    drop.classList.remove('show');
                });
            }


            function setupPagination() {
                paginationControls.innerHTML = '';
                const pageCount = Math.ceil(filteredData.length / rowsPerPage);

                const createBtn = (text, page) => {
                    const btn = document.createElement('button');
                    btn.innerText = text;
                    if (page === currentPage) btn.classList.add('active');
                    btn.addEventListener('click', () => {
                        currentPage = page;
                        updateTable();
                    });
                    return btn;
                };

                // Back button
                if (currentPage > 1) {
                    paginationControls.appendChild(createBtn('Back', currentPage - 1));
                }

                for (let i = 1; i <= pageCount; i++) {
                    paginationControls.appendChild(createBtn(i, i));
                }

                // Next button
                if (currentPage < pageCount) {
                    paginationControls.appendChild(createBtn('Next', currentPage + 1));
                }
            }

            function updateTable() {
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                renderTable(filteredData.slice(start, end));
                setupPagination();
            }

            function filterData() {
                const searchTerm = searchInput.value.toLowerCase();
                const filterValue = filterSelect.value;

                filteredData = data.filter(item => {
                    const matchesSearch = item.list.toLowerCase().includes(searchTerm);
                    const matchesFilter = !filterValue || item.list === filterValue;
                    return matchesSearch && matchesFilter;
                });

                currentPage = 1;
                updateTable();
            }

            searchInput.addEventListener('input', filterData);
            filterSelect.addEventListener('change', filterData);

            // Initial render
            filterData();
        </script>

    </div>

</body>

</html>
