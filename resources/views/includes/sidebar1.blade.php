<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::path() ==  'Admin/beranda' ? 'active' : ''  }}">
                    <a href="{{ route('beranda') }}"><i class="menu-icon fa fa-dashboard "></i>Beranda </a>
                </li>

                <li class="{{ Request::path() ==  'Admin/order' ? 'active' : ''  }}">
                    <a href="{{route('order.all')}}"><i class="menu-icon fa fa-shopping-cart"></i>Order </a>
                </li>

                <li class="{{ Request::path() ==  'Admin/sales/dashboard' ? 'active' : ''  }}">
                    <a href="{{ route('sales.dashboard') }}"><i class="menu-icon fa fa-money"></i>Sales Dashboard </a>
                </li>

                <li class="{{ Request::path() ==  'Admin/customer' ? 'active' : ''  }}">
                    <a href="{{ route('customer') }}"><i class="menu-icon fa fa-user"></i>Customer </a>
                </li>

                @if(auth()->user()->hasRole('admin'))
                <li class="{{ Request::path() ==  'Admin/data/edit' ? 'active' : ''  }}">
                    <a href="{{ route('data.icons') }}"><i class="menu-icon fa fa-briefcase"></i>Data Icon Plus </a>
                </li>
                <li class="{{ Request::path() ==  'Admin/user' ? 'active' : ''  }}">
                    <a href="{{ route('user') }}"><i class="menu-icon fa fa-users"></i>User </a>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
