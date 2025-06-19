<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mailing</title>

    <!-- Bootstrap and Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Global Styling */
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            background-color: whitesmoke;
            display: flex;
        }

        .containers {
            width: 97%;
        }

        /* Top Navigation */
        .top_nav {
            background-color: white;
            border-radius: 10px;
            padding-left: 20px;
            height: 65px;
            margin: 8px;
        }

        .top_nav h4 {
            font-size: 20px;
            color: #222;
            margin: 0;
            padding-top: 5px;
        }

        .top_nav p {
            font-size: 14px;
            color: #888;
            margin: 0;
        }

        /* Breadcrumb and Buttons */
        .breadcrumb-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px 10px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            margin: 5px 8px 0 8px;
            height: 65px;
        }

        .breadcrumb {
            color: grey;
            padding-left: 12px;
            display: flex;
            align-items: center;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            padding-left: 10px;
        }

        .breadcrumb i {
            margin: 0 5px;
            color: #888;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn-outline {
            border: 1px solid #ccc;
            background-color: white;
            padding: 2px 8px;
            border-radius: 6px;
            color: #333;
            transition: 0.2s;
        }

        .btn-outline:hover {
            background-color: #f0f0f0;
        }

        .btn-primary {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        /* Filter & Search */
        .filter-row {
            display: flex;
            align-items: center;
            margin-left: 900px;
            margin-right: 20px;
            padding: 10px 0;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 10px 15px 10px 35px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9f9fc;
            color: #333;
            width: 180px;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #999;
            font-size: 14px;
        }

        .filter-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 10px;
        }

        .filter-dropdown select {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9fc;
            font-size: 14px;
        }

        /* Mailing Container */
        .container_two {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            /* margin: 20px auto; */
            margin-left: 8px;
        }

        .checkbox-container {
            background-color: #f8f8f8;
            padding: 20px 30px;
            border-radius: 8px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px 40px;
            width: 400px;
            height: 210px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        input[type="checkbox"] {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #bbb;
            border-radius: 4px;
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: #3f51b5;
            border-color: #3f51b5;
        }

        input[type="checkbox"]:checked::after {
            content: '✓';
            color: white;
            font-size: 14px;
        }

        label {
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }

        .form-section input[type="text"] {
            display: block;
            margin-top: 5px;
            border: none;
            border-bottom: 1px solid black;
        }

        .required {
            color: red;
        }

        .btn-add {
            float: right;
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: -35px;
        }

        /* File Upload Section */
        .upload-container {
            /* background: white; */
            border-radius: 10px;
            /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); */
            /* padding: 2rem; */
            /* width: 99%; */
            margin: 20px auto;
            /* margin-left: 8px; */
        }

        .upload-header {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .upload-instruction {
            text-align: center;
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .dropzone {
            border: 2px dashed #cbd5e0;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            background-color: #f0f4f8;
            transition: background-color 0.3s ease;
        }

        .dropzone:hover {
            background-color: #e8f0fe;
        }

        .btn-upload {
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-upload:hover {
            background-color: #2980b9;
        }

        input[type="file"] {
            display: none;
        }

        .required {
            color: red;
        }

        .btn-add {
            float: right;
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: -35px;
            width: 80px;
            height: 35px;
            display: flex;
            justify-content: center;
        }

        .upload-container {
            text-align: center;
            margin-top: 15px;
            width: 95%;
        }

        .upload-box,
        .upload-box-modal {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* border: 2px dashed #aaa; */
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            /* max-width: 400px;
            margin: 0 auto; */
            /* background-color: #eeeeee; */
            /* font-size: 15px;
            font-weight: 500;
            color: #000; */
        }

        /* .upload-box:hover {
            background-color: #ddd;
        } */

        input[type="file"] {
            display: none;
        }

        .note {
            margin-top: 10px;
            font-size: 12px;
            color: #444;
            max-width: 350px;
            margin-left: 400px;
        }

        .send-button {
            margin-top: 20px;
            width: 100px;
            height: 30px;
            border-radius: 8px;
            color: white;
            background-color: #189DE9;
        }

        #S_num,
        #ImageLinks,
        #Action {
            background-color: transparent;
            border: none;
        }

        .action-menu {
            position: absolute;
            top: 30px;
            right: 0;
            background: white;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 100;
            padding: 5px;
            min-width: 120px;
        }

        .action-menu button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: 6px 10px;
            font-size: 14px;
        }

        .action-menu button:hover {
            background-color: #f8f8f8;
        }

        .action-toggle {
            font-size: 18px;
            padding: 0 8px;
        }

        .mt-4 {
            /* margin-top: 1.5rem !important; */
        }

        .form-control {
            width: 99%;
            height: 500px;
        }
    </style>
</head>

<body>
    @include('layout/sidebarnew')

    <div class="containers">
        <!-- Header -->
        <div class="top_nav">
            <h4>Send Mailing Details here</h4>
            <p>Send Mail here!</p>
        </div>

        <!-- Breadcrumb and Buttons -->
        <div class="breadcrumb-buttons">
            <div class="breadcrumb">
                <a href="#">Home</a>
                <i class="fa-solid fa-angles-right"></i>
                Dashboard
            </div>
            <div class="btn-group">
                <button class="btn-outline">Mailing list</button>
                <button class="btn-primary">Send Email</button>
                <button class="btn-outline">Email sent</button>
            </div>
        </div>

        <!-- Search & Filter -->
        <div class="filter-row">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" class="search-input" placeholder="Search">
            </div>
            <div class="filter-dropdown">
                <label for="show_all">Show</label>
                <select id="show_all">
                    <option>All</option>
                    <option>Sent</option>
                    <option>Pending</option>
                </select>
            </div>
        </div>

        <!-- Mailing Form -->
        <div class="mailing_top">
            <div class="container_two">
                <h4>Use the form below to Send Mail to members.</h4>
                <button class="btn-add">+ Add</button>
                <hr>
                <div class="checkbox-container">
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Residential</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Database</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox" checked> <span>Companies</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Others</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Contract</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Admin</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Agents</span></label>
                    <label class="checkbox-wrapper"><input type="checkbox"> <span>Testing</span></label>
                </div>
                <hr>
                <div class="form-section">
                    <h4>Selected Mailing list</h4>
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Enter title">
                    <label>Subject <span class="required">*</span></label>
                    <input type="text" name="subject" placeholder="Enter subject">
                </div>
            </div>
            <!-- Frequently Added Image Links Table -->
            <div class="frequently-table" style="margin-left: 10px;">
                <h4>Frequently Added Image Links</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image Links</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 9; $i++)
                            <tr>
                                <td>{{ sprintf('%02d', $i) }}</td>
                                <td>
                                    <code style="color: grey">
                                        &lt;img
                                        src="http://cityclairecon.com.sg/staffportal/uploads/mail_images/happy-chinese-new-year-2023-year-of-the-rabbit-vector.jpg"&gt;
                                    </code>
                                </td>
                                <td style="position: relative;">
                                    <button class="btn btn-light btn-sm action-toggle" title="More Options">
                                        &#8942;
                                    </button>
                                    <div class="action-menu d-none">
                                        <button class="btn btn-sm" title="View">
                                            <i class="fa fa-eye text-primary"></i> View
                                        </button><br>
                                        <button class="btn btn-sm" title="Edit">
                                            <i class="fa fa-edit text-warning"></i> Edit
                                        </button><br>
                                        <button class="btn btn-sm" title="Delete">
                                            <i class="fa fa-trash text-danger"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <!-- Upload Button & Modal -->
            <div class="upload-container mt-4">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#uploadModal1">
                    <i class="fa-solid fa-cloud-arrow-up me-2"></i> Upload Image
                </button>
            </div>

            <!-- Upload Modal -->
            <div class="modal fade" id="uploadModal1" tabindex="-1" aria-labelledby="uploadModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg">
                        <!-- Updated to whitesmoke background -->
                        <div class="modal-header" style="background-color: whitesmoke; color: #000;">
                            <h5 class="modal-title" id="uploadModalLabel1">Upload Your File</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body text-center">
                            <p class="text-muted">Select an image or document to upload</p>
                            <label for="fileUpload1" class="upload-box-modal">
                                <i class="fa-solid fa-upload fa-2x" style="color: #000;"></i>
                                <p class="mt-2">Click to choose file</p>
                            </label>
                            <input type="file" id="fileUpload1" class="d-none" />
                            <div class="note mt-3" style="margin-left: 10px;">
                                (<strong>Max file size:</strong> 6 MB)<br />
                                Supported: <strong>.jpg</strong>, <strong>.jpeg</strong>, <strong>.png</strong>,
                                <strong>.docx</strong>, <strong>.doc</strong>, <strong>.excel</strong>,
                                <strong>.ppt</strong>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Textarea & Upload -->
            <div class="mt-4">
                <label for="text-inputs" class="form-label">Write your Text</label>
                <textarea id="text-inputs" class="form-control" style="width: 99%;" placeholder=""></textarea>
            </div>

            <!-- Second Upload Box -->
            <div class="upload-container mt-4">
                <label class="upload-box" for="fileUpload2">
                    <span class="upload-icon">📤</span> Upload Image
                </label>
                <input type="file" id="fileUpload2" />
                <div class="note">
                    (<strong>Max file size:</strong> 6 MB)<br />
                    Supported: <strong>.jpg</strong>, <strong>.jpeg</strong>, <strong>.png</strong>,
                    <strong>.docx</strong>, <strong>.doc</strong>, <strong>.excel</strong>, <strong>.ppt</strong>
                </div>
                <button class="send-button">Send</button>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toggles = document.querySelectorAll(".action-toggle");

                toggles.forEach(toggle => {
                    toggle.addEventListener("click", function(e) {
                        e.stopPropagation(); // prevent closing immediately
                        // Close all other menus
                        document.querySelectorAll(".action-menu").forEach(menu => {
                            menu.classList.add("d-none");
                        });
                        // Open this one
                        const menu = this.nextElementSibling;
                        menu.classList.toggle("d-none");
                    });
                });

                // Action Handlers
                document.querySelectorAll('.view-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        alert("Viewing record ID: " + id);
                    });
                });

                document.querySelectorAll('.edit-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        alert("Editing record ID: " + id);
                    });
                });

                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        if (confirm("Are you sure you want to delete ID: " + id + "?")) {
                            alert("Deleted ID: " + id);
                        }
                    });
                });

                // Close menus when clicking outside
                document.addEventListener("click", function(e) {
                    if (!e.target.closest(".action-menu") && !e.target.classList.contains("action-toggle")) {
                        document.querySelectorAll(".action-menu").forEach(menu => {
                            menu.classList.add("d-none");
                        });
                    }
                });
            });
        </script>
    </div>
    </div>
</body>

</html>
