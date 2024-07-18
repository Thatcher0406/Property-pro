@foreach ($bookings as $booking)
<tr>
    <td>{{ $booking->apartment->name }}</td>
    <td>{{ $booking->tenant->name }}</td>
    <td>{{ $booking->date }}</td>
    <td>{{ $booking->time }}</td>
    <td>{{ $booking->status }}</td>
    <td>
        @if ($booking->status == 'pending')
            <form action="{{ route('landlord.confirmBooking', $booking->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Confirm Availability</button>
            </form>
        @endif
    </td>
</tr>
@endforeach
