<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/email_send.css') }}">

</head>

<body style="display: flex">
    @include('layout.sidebarnew')
    <div class="container" style="width: 100%">
        <div class="top_nav">
            <h4>Send Mailing Details here</h4>
            <p>Send Mail here!</p>
        </div>

        <div class="breadcrumb-buttons">
            <div class="breadcrumb">
                <a href="#">Home</a> <i class="fa-solid fa-angles-right"></i> Dashboard
            </div>
            <div class="btn-group">
                <button class="btn-outline">Mailing list</button>
                <button class="btn-primary">Send Email</button>
                <button class="btn-outline">Email sent</button>
            </div>
        </div>
        <div class="filter-row">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Search" class="search-input" />
            </div>
            <div class="filter-dropdown">
                <label>Show</label>
                <select>
                    <option>All</option>
                    <option>Sent</option>
                    <option>Pending</option>
                </select>
            </div>
        </div>
        <table id="emailTable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Mail To</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Rows -->
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td>
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <td><button class="action-btn">⋮</button></td>
                </tr>
                <!-- Repeat rows as needed -->
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td>
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <td><button class="action-btn">⋮</button></td>
                </tr>
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td>
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <td><button class="action-btn">⋮</button></td>
                </tr>
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td> 
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <td><button class="action-btn">⋮</button></td>
                </tr>
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td>
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <td><button class="action-btn">⋮</button></td>
                </tr>
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td>
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <div></div>
                    <td><button class="action-btn">⋮</button>
                    
                    </td>
                </tr>
                <tr>
                    <td>200</td>
                    <td>Testing</td>
                    <td>sujithatestsmail</td>
                    <td>sujithatestsubject</td>
                    <td>04-04-25 6:11 PM</td>
                    <td><button class="action-btn">⋮</button></td>
                </tr>

                <!-- Add more rows if needed -->
            </tbody>
        </table>

        <!-- Pagination -->

        <ul class="pagination" id="pagination">
            <li><a href="#" class="disabled">‹ Back</a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#" class="disabled">...</a></li>
            <li><a href="#">25</a></li>
            <li><a href="#">Next ›</a></li>
        </ul>
    </div>
    <script>
        const rowsPerPage = 5; // Set how many rows you want per page
        const table = document.getElementById('emailTable');
        const tbody = table.querySelector('tbody');
        const pagination = document.getElementById('pagination');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        let currentPage = 1;

        function displayRows(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = index >= start && index < end ? '' : 'none';
            });
        }

        function createPagination() {
            pagination.innerHTML = '';

            // Previous
            const prev = document.createElement('li');
            prev.innerHTML = `<a href="#" ${currentPage === 1 ? 'class="disabled"' : ''}>‹ Back</a>`;
            prev.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            });
            pagination.appendChild(prev);

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement('li');
                li.innerHTML = `<a href="#" class="${i === currentPage ? 'active' : ''}">${i}</a>`;
                li.addEventListener('click', (e) => {
                    e.preventDefault();
                    currentPage = i;
                    updatePagination();
                });
                pagination.appendChild(li);
            }

            // Next
            const next = document.createElement('li');
            next.innerHTML = `<a href="#" ${currentPage === totalPages ? 'class="disabled"' : ''}>Next ›</a>`;
            next.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            });
            pagination.appendChild(next);
        }

        function updatePagination() {
            displayRows(currentPage);
            createPagination();
        }

        // Initialize
        updatePagination();
    </script>

</body>

</html>
