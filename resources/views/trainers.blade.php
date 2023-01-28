@extends('layout')
@section('content')
<div class="row">
    <div class="col-3">
        <a href="/" type="button" class="btn btn-light">
            ← Back to Members
        </a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-8">
        <div class="card px-5 py-4">
            <h1 class="fw-bold mb-4">Trainers</h1>
            <hr>
            @foreach($trainers as $trainer)
            <tr>
                    <td>{{ $trainer->name }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->specialization }}</td>
                    <td>{{ $trainer->phone }}</td>
                    <td>
            @endforeach
        </div>
    </div>
</div>

@endsection