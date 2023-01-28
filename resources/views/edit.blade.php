<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ config('app.name', 'project name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
<div class="container p-5 m-5">


<form method="POST" action="{{ route('updatemembers') }}"> 
    @csrf


    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>  

        
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>

        <br>
        <label for="membership_type" class="form-label">Membership Type</label>
            <select id="membership_type" name="membership_type" required onchange="setExpiration()">
                <option selected="Choose.."></option>
                <option value="student">Student</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
            </select>
        <br>
        <label for="membership_expiration" class="form-label">Membership Expiration</label>
        <input type="date" class="form-control" id="membership_expiration" name="membership_expiration" required>

        <input type="hidden" name="id" value="{{ $member->id }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
</body>
<script>
    function setExpiration() {
        var membershipType = document.getElementById("membership_type").value;
        var expirationDate = document.getElementById("membership_expiration");
        if (membershipType == "student") {
            expirationDate.value = "2024-01-28";
        } else if (membershipType == "monthly") {
            expirationDate.value = "2024-02-28";
        } else if (membershipType == "yearly") {
            expirationDate.value = "2024-01-28";
        }
    }
</script>