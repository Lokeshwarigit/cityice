<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mailing Page</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/mailing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mailing-custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .top_nav h4 {
            margin-top: 20px;
        }

        .top_nav p {
            margin-top: 15px;
        }

        /* ===== Base Styles ===== */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fc;
            font-size: 16px;
        }

        .containers {
            width: 100%;
            padding: 20px;
        }

        .top_nav {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            margin: 5px 0 15px 5px;
            width: 99%;
            height: 70px;
            position: relative;
        }

        .top_nav h4 {
            font-size: 20px;
            color: #222;
            position: absolute;
            top: 20px;
            left: 20px;
            margin: 0;
        }

        .top_nav p {
            font-size: 14px;
            color: #888;
            position: absolute;
            top: 45px;
            left: 20px;
            margin: 0;
        }

        .breadcrumb-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            height: 60px;
            width: 99%;
            margin: -10px 0 10px 5px;
        }

        .breadcrumb {
            color: grey;
            margin-left: 20px;
            margin-top: 15px;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb i {
            margin: 0 5px;
            color: #888;
            margin-top: 6px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-right: 10px;
        }

        .btn-outline {
            border: 1px solid #ccc;
            background-color: white;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
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
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .filter-row {
            margin-left: 800px;
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 8px;
        }

        .search-box {
            position: relative;
            width: 250px;
        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #999;
        }

        .search-input {
            width: 100%;
            padding: 8px 12px 8px 32px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
        }

        .filter-dropdown {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-dropdown select {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            background-color: white;
        }

        table {
            width: 99%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            width: 100px;
        }

        .container_two {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin: auto;
        }

        .container_two h4 {
            margin-left: 20px;
        }

        label {
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 14px;
            color: #333;
        }

        textarea {
            width: 95%;
            height: 400px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fdfdfd;
            resize: none;
            font-size: 14px;
            box-sizing: border-box;
        }

        .checkbox-container {
            background-color: #f8f8f8;
            padding: 20px 30px;
            border-radius: 8px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px 40px;
            width: 400px;
            height: auto;
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

        .form-section {
            clear: both;
            margin-top: 30px;
        }

        input[type="text"] {
            display: block;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
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
            border: 2px dashed #aaa;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            background-color: #eeeeee;
            font-size: 15px;
            font-weight: 500;
            color: #000;
        }

        .upload-box:hover {
            background-color: #ddd;
        }

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
        

        /* ===== Tablet (≤ 768px) ===== */
        @media (max-width: 768px) {

            .breadcrumb-buttons,
            .filter-row,
            .btn-group {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                width: 100%;
            }

            .top_nav {
                height: auto;
                padding: 10px;
            }

            .top_nav h4,
            .top_nav p {
                position: static;
                text-align: center;
                margin: 5px 0;
            }

            .search-box,
            .filter-dropdown select,
            .checkbox-container,
            textarea,
            .upload-box {
                width: 100%;
                margin: 0 auto;
            }

            .checkbox-container {
                grid-template-columns: 1fr;
                padding: 15px;
            }

            .note {
                margin-left: 0;
                text-align: center;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .btn-add,
            .send-button {
                width: 100%;
            }
        }

        /* ===== Mobile (≤ 576px) ===== */
        @media (max-width: 576px) {
            .breadcrumb {
                font-size: 14px;
                text-align: center;
                margin: 10px 0;
            }

            .btn-group {
                justify-content: center;
            }

            .search-box input,
            .filter-dropdown select {
                width: 100%;
            }

            .checkbox-container {
                padding: 10px;
                gap: 10px;
            }

            textarea {
                height: 250px;
                margin-left: 0;
                width: 100%;
            }

            .note {
                font-size: 13px;
                margin-left: 0;
            }

            .upload-box {
                width: 100%;
                max-width: 100%;
            }

            .send-button,
            .btn-add {
                width: 100%;
                margin-top: 10px;
            }

            .frequently-table table th,
            .frequently-table table td {
                font-size: 12px;
                word-break: break-word;
            }

            .modal-content {
                margin: 5px;
            }
        }
    </style>
</head>

<body style="background-color: whitesmoke; display: flex;">
    @include('layout/sidebarnew')

    <div class="containers">
        <!-- Page Header -->
        <div class="mailing_container">
            <div class="top_nav">
                <h4>Send Mailing Details here</h4>
                <p>Send Mail here!</p>
            </div>
        </div>

        <!-- Breadcrumb and Button Group -->
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
        <div class="container_two">
            <h4>Use the form below to Send Mail to members.</h4>
            <button class="btn-add">+ Add</button>
            <hr>

            <!-- Category Checkboxes -->
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

            <!-- Subject Form -->
            <div class="form-section">
                <h4>Selected Mailing list</h4>
                <label>Title</label>
                <input type="text" name="title" placeholder="Enter title">
                <label>Subject <span class="required">*</span></label>
                <input type="text" name="subject" placeholder="Enter subject">
            </div>
        </div>

        <!-- Frequently Added Image Links Table -->
        <div class="frequently-table">
            <h4>Frequently Added Image Links</h4>
            <table>
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
                            <td>⋮</td>
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
        <div class="modal fade" id="uploadModal1" tabindex="-1" aria-labelledby="uploadModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow-lg">
                    <!-- Updated to whitesmoke background -->
                    <div class="modal-header" style="background-color: whitesmoke; color: #000;">
                        <h5 class="modal-title" id="uploadModalLabel1">Upload Your File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
</body>

</html>
