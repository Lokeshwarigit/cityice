<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @include('layout.sidebarnew')


</head>


<body>
    <div class="container" style="width: -webkit-fill-available;">
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
        <div class="table-containe-div">
            <div class="table-container">
                <table>
                    <table>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Mailing List</th>
                                <th colspan="6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>07</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>08</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>09</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Residential</td>
                                <td colspan="6"><button class="button_bar">⋮</button></td>
                            </tr>
                            <tr class="pagination">
                                <td></td>
                                <td><i>&lt; Block</i></td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>…</td>
                                <td>25</td>
                                <td>Next &gt;</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>

    </div>



</body>

</html>