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
        </tr>
        @forelse($inventory as $item)
        <tr>
            <td>{{ $item->code }}</td>
            <td>{{ $item-> name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->price }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No records found</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection