@extends('layout')
@section("content")

<div id="content">

    <h2>Student Records</h2>
    <table>
        <tr>
            <th>code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Edit | Delete</th>
        </tr>
        @forelse($inventory as $item)
        <tr>
            <td>{{ $item->code }}</td>
            <td>{{ $item-> name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->price }}</td>
            <td> <a href="http://localhost:8000/edit/{{ $item->code }}">Edit</a> |
                <form method="POST" action="{{ url('/manage/delete/'.$item->code) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No records found</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection