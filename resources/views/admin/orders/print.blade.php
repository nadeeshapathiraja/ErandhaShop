<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="row" style="margin-top: 10px;">
                @foreach($orders as $order)
                    <div class="col-md-6" style="margin-top: 10px;">
                        <div class="card" style="border-style: double; width: 490px; height: 365px;">

                            <div class="card-body" style="border-style: double; width: 490px; height: 365px;">


                                <div style="font-size: 25px; font-weight: bold;">{{ $order->name }}</div></br>
                                <textarea class="form-control" style="height: 140px; font-size: 25px; font-weight: bold; border: 0;">{{ $order->Location_address }}</textarea>
                                <div style="font-size: 25px; font-weight: bold;">{{ $order->telephone }}</div>
                                <div style="text-align: center">
                                    <img src="images/newlogo.jpg" class="img-fluid" style="width:150px;" alt="Responsive image">
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <button class="btn btn-primary" style="margin-left: 500px; margin-top: 50px; margin-bottom: 100px" onClick="window.print()">Print Report</button>

    </body>
</html>



