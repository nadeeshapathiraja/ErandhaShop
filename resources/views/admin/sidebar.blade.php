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
                    <a class="dropdown-item" href="zones">Zone</a>
                    <a class="dropdown-item" href="citys">City</a>
                </div>
            </li><hr>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Product</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="categorys">Category</a>
                    <a class="dropdown-item" href="items">Item</a>
                </div>
            </li><hr>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Third Party</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="deliverycompanys">Delivery Company</a>
                    <a class="dropdown-item" href="supplyers">Supplyer</a>
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
                    <a class="dropdown-item" href="paymenttypes">Payment Type</a>
                    <a class="dropdown-item" href="moneytransactions">Money Transaction</a>
                </div>
            </li><hr>

        </ul>

    </nav>

</div>
