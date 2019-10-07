<div>
    <img src="{{ $message->embed('imgs/logo.jpg') }}">
    
    <h3>New Report for </h3>
        <table>
            <tr>
                Testing hml email
                <td>Month: </td>
                <td>...{{ $rapport->month??'' }}</td>
            <tr>
                <td>Year:</td>
                <td>..{{ $rapport->year??'' }}</td>
            </tr>   
               <!--  <td>{{ $rapport->Hours??'' }}</td>
                <td>{{ $rapport->Placements??'' }}</td>
                <td>{{ $rapport->Videos??'' }}</td>
                <td>{{ $rapport->Visits??'' }}</td>
                <td>{{ $rapport->Studies??'' }}</td>
                <td>{{ $rapport->Comments??'' }}</td> -->
            </tr>    
        </table>
</div>
