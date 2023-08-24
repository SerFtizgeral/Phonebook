@extends('phones.index')

@section('content')
<div>
    <table border="2">
        <tr>
            <th>fname</th>
            <th>lname</th>
            <th>address</th>
            <th>contact</th>
            <th>mmail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($phones as $phone)
        <tr>
            <td>{{ $phone->fname }}</td>
            <td>{{ $phone->lname }}</td>
            <td>{{ $phone->address }}</td>
            <td>{{ $phone->contact }}</td>
            <td>{{ $phone->mmail }}</td>
          
            <td>
                <a href="{{ route('phone.edit', ['phone' => $phone]) }}">Edit</a>
            </td>
            <td>
                <form method="post" action="{{ route('phone.delete', ['phone' => $phone]) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
