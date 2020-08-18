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
            @foreach($orders as $order)
            <div class="row" style="margin-top: 10px;border-style: double;">
                    {{-- from --}}
                    <div class="col-md-6" style="margin-top: 10px;margin-right: 0px;border-right:double; ">
                        <div class="row" style="font-weight: bold; ">
                            <div class="card" style="width: 100%; font-size: 20px; ">
                                <h4>From:</h4>
                                <div class="card-body" style="margin-left: 30px">
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-5">Name :</div>
                                        <div class="col-md-7">
                                                <p class="card-text">The Originals.LK</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-5">Address :</div>
                                        <div class="col-md-7">
                                                <p class="card-text">No. 178,</p>
                                                <p class="card-text">Koswatta road,</p>
                                                <p class="card-text">Nawala</p>
                                                <p class="card-text">Rajagiriya</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-md-5">Phone Number :</div>
                                        <div class="col-md-7">
                                            <p class="card-text">0777813081</p>
                                        </div>
                                    </div>

                                </div>
                                <div style="text-align: center;">
                                    <img src="images/newlogo.jpg" class="img-fluid" style="width:150px;" alt="Responsive image">
                                    <div style="font-size: 8px; font-weight: bold; margin-left: 38px;">www.Originals.com</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- to --}}
                <div class="col-md-6" style="margin-top: 10px;">
                    <div class="row" style="font-weight: bold;">
                        <div class="card" style="width: 100%; font-size: 20px;">
                            <h4>To:</h4>
                            <div class="card-body" style="margin-left: 30px">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">Name :</div>
                                    <div class="col-md-7">
                                            <p class="card-text">{{ $order->name }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">Address :</div>
                                    <div class="col-md-7">
                                        <textarea class="form-control" style="height: 160px; font-size: 20px; font-weight: bold; border: 0; margin-left: 0px;">{{ $order->Location_address }}</textarea>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">Order Number :</div>
                                    <div class="col-md-7">
                                            <p class="card-text">{{ $order->shipment_code }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">Phone Number :</div>
                                    <div class="col-md-7">
                                        <p class="card-text">{{ $order->telephone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
            @endforeach
        </div>
        <button class="btn btn-primary" style="margin-left: 500px; margin-top: 50px; margin-bottom: 100px" onClick="window.print()">Print Report</button>

    </body>
</html>



