<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Donations</title>
</head>

<body>
    <div class="container">
        <h3>PesaPal Donate</h3>
        <div class="row mt-5">
            <div class="form" action="#">
                @csrf
                <div class="col-md-8 card">
                    <div class="card-header">
                        My Donation Page
                    </div>
                    <div class="card-body">
                        <legend>User Details</legend>
                        <div class="row">
                            <div class="form-group">
                            <label for="role_name">First Name:</label>
                            <input autocomplete="off" type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}" required>

                        </div>
                        </div>
                        
                        <legend>Donation Details</legend>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Amount</label>
                            <input type="number" class="form-control" id="bal_amount" name="bal_amount" value="0.00"
                                step="0.01" placeholder="" required>
                        </div><br>
                        <h6>Donation Schedules</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Default checked radio
                            </label>
                        </div><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Donate Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
