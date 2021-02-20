<table class="table table-sm" aria-label="room details table">
    <tbody>
    <tr>
        <th scope="row">Room Name</th>
        <td>{{$room->room_name}}</td>
    </tr>
    <tr>
        <th scope="row">Room Capacity</th>
        <td>{{$room->room_capacity}}</td>
    </tr>
    </tbody>
</table>
<div class="mb-3">
    <strong>Room Photos</strong><br>
    <div class="row">
        @foreach($room_photos as $data)
            <div class="col-md-3 mb-1">
                <img class="img-thumbnail mb-1"
                     src="{{ $data->secure_url }}"
                     alt="room photo">
            </div>
        @endforeach
    </div>
</div>
