<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Employes</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 3px;
    cursor: pointer;
}
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}
.text-success {
    color: #10c469;
}
.text-info {
    color: #62c9e8;
}
.text-warning {
    color: #FFC107;
}
.text-danger {
    color: #ff5b5b;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-fluid">
    <!-- Modal for importing data from Excel -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import from Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <!-- Form for uploading Excel file -->
                <form action="{{url("import")}}" method="POST" enctype="multipart/form-data">
                    <!-- Add any additional form fields here if needed -->
                    @csrf <!-- Add CSRF token for security -->
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
                </div>
            </div>
            </div>
        </div>


    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Employee <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">

                        <a href=" {{ route('logout') }} " class="btn btn-secondary"><i class="material-icons">&#xE8AC;</i><span>Logout</span></a>

                        <a href="#" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#importModal">
                            <i class="material-icons">&#xE2C3;</i> <span>Import from Excel</span>
                          </a>
                        <a href="{{url('export')}}"" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>
                        <a href="/registration" class="btn btn-secondary"><i class="material-icons">&#xE147;</i><span>Add new employe</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Employee_ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->Employee_ID }}</td>
                        <td><a href="#"><img src="{{asset('image/avatar.png')}}" width="50" height="50" class="avatar" alt="Avatar"></a></td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->empDOB }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->empGender }}</td>
                        <td>{{ $employee->empAddress }}</td>
                        <td>{{ $employee->country }}</td>
                        <td>{{ $employee->state }}</td>
                        <td>{{ $employee->city }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="edit/{{$employee->id}}" class="settings" title="Update" data-toggle="tooltip"><i class="material-icons">&#xE864;</i></a>
                                <a href="delete/{{$employee->id}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                                <a href="PDF/{{$employee->id}}" class="PDF" title="Print-PDF" data-toggle="tooltip"><i class="material-icons">&#xE2C4;</i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        // Add click event listener to the delete links
        $('.delete').click(function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the URL from the href attribute of the anchor link
        var url = $(this).attr('href');

        // Extract the id from the URL
        var id = url.split('/').pop();


            // Send DELETE request to the server
            $.ajax({
                url: '/delete/' + id, // Update with your actual URL
                type: 'GET',
                data: {id: id}, // Update with your actual data
                success: function(response) {
                    swal( "Employee record","Deleted Successfully!", "success");
                      setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                error: function(error) {
                    // alert('Error deleting employee: ' + error);
                    swal("Problem in deleting", "Cannot able to delete", "error");
                }
            });
        });




    });
    </script>

</html>
