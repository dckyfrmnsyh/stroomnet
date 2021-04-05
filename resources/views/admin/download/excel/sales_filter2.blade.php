<table class="table ">
    <thead>
        <tr>
            <th>#</th>
            <th>Sales</th>
            <th>Created Months</th>
            <th>Revenue Monthly</th>
            <th>Instalasi</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sales as $row)
        <tr>
        <td> </td>
        <td> {{$row->name}} </td>
        <td> {{$bulan1}} - {{$bulan2}} </td>
        <td > {{$revenue[$row->id]}} </td>
        <td > {{$instalasi[$row->id]}} </td>
        <td > {{$total[$row->id]}} </td></tr>
    @endforeach
    </tbody>
</table>