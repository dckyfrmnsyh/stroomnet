<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Transactions</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true"> <i class="menu-icon fa fa-shopping-cart"></i>Orders</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li><i class="fa fa-list"></i>
                            <a href="{{ route('pages.order') }}"> Order New</a>
                        </li>
                        <li><i class="fa fa-list"></i>
                            <a href="{{ route('pages.order2') }}"> Order Upgrade</a>
                        </li>
                        <li><i class="fa fa-list"></i>
                            <a href="{{ route('pages.order3') }}"> Order Downgrade</a>
                        </li>
                        <li><i class="fa fa-list"></i>
                            <a href="{{ route('pages.order4') }}"> Order Relokasi</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
