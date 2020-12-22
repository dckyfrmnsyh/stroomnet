<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            
                <li class="">
                    <a href="{{ route('order') }}"><i class="menu-icon fa fa-shopping-cart"></i>Order </a>
                </li>

                @if(auth()->user()->hasRole('admin'))
                <li class="">
                    <a href="{{route('order.all')}}"><i class="menu-icon fa fa-shopping-cart"></i>All Order </a>
                </li>
                @endif

                <li class="">
                    <a href="{{ route('customer') }}"><i class="menu-icon fa fa-user"></i>Customer </a>
                </li>

                @if(auth()->user()->hasRole('admin'))
                <li class="">
                    <a href="{{ route('user') }}"><i class="menu-icon fa fa-users"></i>User </a>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
