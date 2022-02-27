<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Donations</title>
</head>

<body>
    <div class="container">
        <h3>Set Parameters Form</h3>
        <form action="{{ route('set-parameters') }}" method="post">
            @csrf
            <div class="col-md-6 card" style="width:800px; margin:0 auto;">                
                <div class="card-body">
                    <legend></legend>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputFullname">CONSUMER_KEY</label>
                            <input type="text" name="consumer_key" class="form-control" id="last_name" value="" placeholder="" required>
                        </div>
                    </div><br>
                    
                    <div class="row">                        
                        <div class="form-group col-md-6">
                            <label for="exampleInputFullname">CONSUMER_SECRET</label>
                            <input type="text" name="consumer_secret" class="form-control" id="first_name" value="" placeholder="" required>
                        </div>
                       
                    </div><br>
                    
                    <div class="row form-group">
                        <button type="submit" id="btnSetParams" class="btn btn-primary btn-lg">
                            Set</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>