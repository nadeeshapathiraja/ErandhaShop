<div class="col-md-3">
    <nav class="navbar bg-light">
        <ul class="navbar-nav">

            <li role="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    Dashboard
                </a>
            </li><hr>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Location</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('zones') }}">Zone</a>
                    <a class="dropdown-item" href="{{ url('citys') }}">City</a>
                </div>
            </li><hr>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Product</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('categorys') }}">Category</a>
                    <a class="dropdown-item" href="{{ url('items') }}">Item</a>
                </div>
            </li><hr>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Third Party</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('deliverycompanys') }}">Delivery Company</a>
                    <a class="dropdown-item" href="{{ url('supplyers') }}">Supplyer Log</a>
                    <a class="dropdown-item" href="{{ url('clients') }}">Client Log</a>
                </div>
            </li><hr>

            <li role="nav-item">
                <a class="nav-link" href="{{ url('orders') }}">
                    Order Process
                </a>
            </li><hr>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Transaction</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('paymenttypes') }}">Order Transaction</a>
                    <a class="dropdown-item" href="{{ url('moneytransactions') }}">Money Transaction</a>
                    <a class="dropdown-item" href="{{ url('supplyer-cost') }}">Supplyer Transaction</a>
                    <a class="dropdown-item" href="{{ url('payments') }}">Payment Log</a>
                </div>
            </li><hr>

            <li role="nav-item">
                <a class="nav-link" href="{{ url('printSelect') }}">
                    Print Records
                </a>
            </li><hr>

        </ul>

    </nav>

</div>

