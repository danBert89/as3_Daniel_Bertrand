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
            <td colspan="5">No records found</td>
        </tr>
        @endforelse
    </table>
    <br>
    @if(!$showForm)
    <a href="/manage/create">Create New Item</a>
    @endif

    @if($showForm)
    <h2>Create An Item</h2>
    <form action="/manage/insert" method="post">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" required><br>
        <label for="price">Price:</label><br>
        <input type="text" name="price" required><br>
        <input type="submit" value="Create Item">
    </form>
    @endif
</div>
</div>

@endsection