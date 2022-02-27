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
        <h3>PesaPal Donate</h3>
        <form action="pesapal-iframe.php" method="post">
            <div class="col-md-8 card">
                <div class="card-header">
                    My Donation Page
                </div>
                <div class="card-body">
                    <legend>User Details</legend>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputFullname">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" value="" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputFullname">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" value="" placeholder="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputIdNumber">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phonenumber(254..)</label>
                                <input type="number" name="phonenumber" class="form-control" id="phone" value="" placeholder="eg. 254724401515">
                            </div>
                        </div>
                    </div>
                    <legend>Donation Details</legend>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="0.00" step="0.01" placeholder="" required>
                    </div><br>
                    <h6>Donation Schedules</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="donation_type" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            One-Off
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="donation_type" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Monthly
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="donation_type" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Annual
                        </label>
                    </div><br>
                    <input type="hidden" id="type" name="type" value="MERCHANT">
                    <input type="hidden" id="description" name="description" value="Order Description">
                    <input type="hidden" id="reference" name="reference" value="001">
                    <div class="form-group form-control">
                        <button type="submit" id="btnSendRequest" class="btn btn-primary btn-lg">
                            Donate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>