<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Register At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($users as $user)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            @if($user->hasRole('admin'))
            <td>Admin</td>
            @elseif($user->hasRole('sales'))
            <td>Sales</td>
            @elseif($user->hasRole('customer'))
            <td>Customer</td>
            @endif
            <td>{{ $user->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>