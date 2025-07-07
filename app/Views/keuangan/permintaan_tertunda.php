<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Tertunda</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        .card-body .fas {
            color: #007bff; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center"> <b> PILIH UNIT </b> </h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body text-center">
                        <i class="fas fa-warehouse fa-3x mb-3"></i>
                        <h5 class="card-title">Unit Gudang</h5>
                        <p class="card-text">Klik untuk melihat permintaan tertunda di Unit Gudang.</p>
                        <a href="keuangan/permintaan_gudang" class="btn btn-primary">Unit Gudang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body text-center">
                        <i class="fas fa-user-tie fa-3x mb-3"></i>
                        <h5 class="card-title">Unit HR Personalia</h5>
                        <p class="card-text">Klik untuk melihat permintaan tertunda di Unit HR Personalia.</p>
                        <a href="keuangan/permintaan_hr" class="btn btn-primary">Unit HR Personalia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
