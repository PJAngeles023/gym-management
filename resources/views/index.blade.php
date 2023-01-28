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
    <button type="button" data-bs-toggle="modal" data-bs-target="#memberModal" class="btn btn-primary btn-sm">Add member</button>
        <!-- Modal -->
        <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add a Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('createmembers') }}"> 
                        @csrf
                        
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>

                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                
                                <label for="membership-type" class="form-label">Membership Type</label>
                                <input type="text" class="form-control" id="membership-type" name="membership-type" required>

                                <label for="membership-expiration" class="form-label">Membership Expiration</label>
                                <input type="date" class="form-control" id="membership-expiration" name="membership-expiration" required>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection