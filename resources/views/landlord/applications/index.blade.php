@foreach ($applications as $application)
<tr>
    <td>{{ $application->apartment->name }}</td>
    <td>{{ $application->tenant->name }}</td>
    <td>{{ $application->status }}</td>
    <td>
        @if ($application->status == 'pending')
            <form action="{{ route('landlord.acceptApplication', $application->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-success">Accept</button>
            </form>
            <form action="{{ route('landlord.denyApplication', $application->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-danger">Deny</button>
            </form>
        @endif
    </td>
</tr>
@endforeach
