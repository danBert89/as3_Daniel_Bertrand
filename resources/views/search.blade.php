@extends('layout')
@section("content")

<div id="content">
    <br>
    <h2>Inventory</h2>
    <br>
    <br>

    @if($showNoSearch)
    <form method="GET" action="search/results">

        <label for="low" style="margin-bottom: 5px;">Low:</label>
        <input type="number" name="low">

        <label for="high" style="margin-bottom: 5px;">High:</label>
        <input type="number" name="high">

        <label for="term" style="margin-bottom: 5px;">Search:</label>
        <input type="text" name="term">

        <input type="submit" value="Search" style="width: 200px; margin-top: 10px;">
        @csrf
    </form>
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

    @endif
    @if($showSearch)

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


    @endif


</div>

@endsection