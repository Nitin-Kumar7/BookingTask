@extends('layouts.app')

@section('content')


</div class="table-responsive container">
    <div class="card mb-5">
        <div class="card-header bg-white border-0 d-flex align-items-center">
            <h4 class="card-title mb-0 flex-grow-1">Booking List</h4>
            <div class="ml-auto">
                <div class="form-check form-switch form-switch-right">
                    <a href="{{ route('bookings.create') }}">Add <i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <table id="bookingTable" class="table border border-0   mt-4">
            <thead class=" ">
                <tr>
                    <th>Booking Name</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr class="border-0">
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('bookings.edit', $booking->id) }}"><i
                                class="fa fa-pencil"></i> </a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i
                                    class="fa fa-trash"></i>  </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>

<script>
$(document).ready(function() {
    $('#bookingTable').DataTable({
        "order": [[1, 'desc']]
    });
});

</script>
@endsection