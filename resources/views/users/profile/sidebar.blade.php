<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"></div>
    <div class="list-group list-group-flush">
        <div class="text-center" style="margin-bottom:20px;">
            <img src="{{asset('images/pt.png')}}" width="100" alt="" loading="lazy"
                style="border-radius:50%;margin-bottom:15px;">
            @if($count_fb != 0)
            <h4>{{$data->nama_customer}}</h4>
            <p>{{$data->email_perusahaan}}</p>
            @endif
        </div>
        @if($count_fb == 0)
        <a href="{{route('users.createfb')}}" class="list-group-item list-group-item-action bg-light text-center"><i class="fa fa-plus"></i>
            Create FB</a>
        @else
        <a href="{{route('users.showfb')}}" class="list-group-item list-group-item-action bg-light text-center"><i class="fa fa-eye"></i>
            Preview FB</a>
        <a href="{{route('users.downfb')}}" target="_blank" class="list-group-item list-group-item-action bg-light text-center"><i class="fa fa-download"></i>
            Download FB</a>
        <a href="{{route('users.editfb')}}" class="list-group-item list-group-item-action bg-light text-center"><i class="fa fa-edit"></i> Edit
            FB</a>
        @endif

        <div class="list-group-item list-group-item-action bg-light d-flex flex-column-reverse">
            <a class="btn btn-danger" style="margin-top:30vh" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-btn fa-sign-out" style="margin-right:10px;"></i>
                {{ __('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    </div>
</div>