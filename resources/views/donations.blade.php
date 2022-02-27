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
        <h3> Welcome To PesaPal Donate</h3>
        <div class="row mt-10">
            <div style="width:800px; margin:0 auto;">
                <h4>Click here to send reminder emails: <a class="btn btn-primary"
                    href="{{ route('reminder-emails') }}">Reminder</a></h4><br>

                <h4>Click here to set Parameters: <a class="btn btn-primary"
                    href="{{ route('set-parameters') }}">Set Parameters</a></h4>
            </div>            
        </div>
    </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
