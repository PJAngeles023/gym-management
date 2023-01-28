@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Membership Type</th>
                <th>Membership Expiration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->membership_type }}</td>
                    <td>{{ $member->membership_expiration }}</td>
                    <td>
                        <a href="{{ route('edit', $member->id) }}">Edit</a>
                        <form action="{{ route('destroy', $member->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('create') }}">Add new Member</a>
@endsection