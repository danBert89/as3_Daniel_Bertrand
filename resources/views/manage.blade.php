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
            <td> <a href="/manage/edit/{{ $item->code }}"><button>Edit</button></a> ||
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
    @if(!$showCreateForm)
    <a href="/manage/create"> <button>Create New Item </button></a>
    @endif

    @if($showCreateForm)
    <h2>Create An Item</h2>
    <form action="/manage/insert" method="post">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" required><br>
        <label for="price">Price:</label><br>
        <input type="text" name="price" required><br>
        <input type="submit" value="Create Item">
        @csrf
    </form>
    @endif

    @if($showEditForm && isset($editingItem))
    <h2>Edit An Item</h2>
    <form action="/manage/edit" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="code" value="{{ $editingItem->code }}">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="{{ $editingItem->name }}" required><br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" value="{{ $editingItem->description }}" required><br>
        <label for="price">Price:</label><br>
        <input type="text" name="price" value="{{ $editingItem->price }}" required><br>
        <input type="submit" value="Update Item">
    </form>
    @endif
</div>
</div>

@endsection