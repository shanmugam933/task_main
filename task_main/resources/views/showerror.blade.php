<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"> <b>Duplicate Value</b> </h5>
                    </div>
                    <div class="card-body">
                        <p> {{ explode(',',explode('Error: ',$errorMsg)[1])[0] }}</p>
                    </div>
                    <div class="card-footer text-right">
                        <a href="/show" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
