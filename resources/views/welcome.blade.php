<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- Boostrap 4 --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
              <img src="images/logo.jpg" alt="logo" style="width:50px;">
            </a>

            <!-- Links -->
            <ul class="navbar-nav">

              <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>

            </ul>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"></a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </nav>

        <div class="container" style="margin-top: 30px;">
            <div class="row">
                @include('admin.sidebar')

            {{-- content --}}

                <div class="col-md-9">
                    <div class="row">
                        @foreach($items as $item)
                        <div class="col-md-4">
                            <div class="card" style="margin-top: 10px;">
                                <div class="card-body" style="height:500px;">
                                    <form method="POST" action="Controllers.Admin.items" accept-charset="UTF-8" style="display:inline">
                                        <div style="height: 210px">
                                            <img src="{{asset('images/items/'.$item->id)}}" alt="Image" style="width: 200px;"/>
                                        </div>
                                        <div style="height: 50px;">
                                            <label style="color: blue " >{{ $item->name }}</label>
                                        </div>
                                        <div style="margin-bottom: auto; margin-top: 5px;">
                                            Item Code <input class="form-control" type="text" name="item_code" id="item_code" readonly value="{{ $item->product_code }}">
                                            Item Quantity <input class="form-control" type="text" name="quantity" id="quantity" readonly value="{{ $item->quantity}}">
                                            Item Price <input class="form-control" type="text" name="price" id="price" readonly value="{{ $item->selling_price}}">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $items->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>

    </body>
</html>
