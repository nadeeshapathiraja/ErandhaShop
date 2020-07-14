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
                    <div class="col-md-6" style="margin-top: 10px;margin-right: 0px;border-right:double ">
                        <div class="row" style="font-weight: bold;">
                            <h4>From:</h4>
                            <table class="table table-borderless">
                                <tbody>
                                  <tr>
                                    <td>Name:</td>
                                    <td>The Originals.LK</td>
                                  </tr>
                                  <tr>
                                    <td>Address:</td>
                                    <pre><td>
                                        No. 178,
                                        Koswatta road,
                                        Nawala
                                        Rajagiriya
                                    </td></pre>
                                  </tr>
                                  <tr>
                                    <td>Teliphone Number:</td>
                                    <td>0777813081</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                    {{-- to --}}
                    <div class="col-md-6" style="margin-top: 10px;">

                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8" style="font-size: 22px; font-weight: bold;">{{ $order->name }}</div>

                                    <div class="col-md-4"><input type="text" style="font-size: 22px; font-weight: bold;" class="form-control" value="{{ $order->shipment_code }}"> </div>
                                </div>
                                <textarea class="form-control" style="height: 145px; font-size: 22px; font-weight: bold; border: 0; margin-left: 0px;">
                                    {{ $order->Location_address }}
                                </textarea><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="font-size: 22px; font-weight: bold;" maxlength="10">{{ $order->telephone }}</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div style="text-align: left">
                                            <img src="images/newlogo.jpg" class="img-fluid" style="width:150px;" alt="Responsive image">
                                            <div style="font-size: 8px; font-weight: bold; margin-left: 38px;">www.Originals.com</div>
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



