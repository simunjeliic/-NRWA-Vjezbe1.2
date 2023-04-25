<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Grupa 5</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Početna <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('city.index') }}">City</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('country.index') }}">Country</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">Roles</a>
        </li>
    </div>
</nav>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of cities</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('city.create') }}">Add new city</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country Code</th>
                <th>District</th>
                <th>Population</th>
                <th width="230px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($city as $city)
            <tr>
                <td>{{ $city->ID }}</td>
                <td>{{ $city->Name }}</td>
                <td>{{ $city->CountryCode }}</td>
                <td>{{ $city->District }}</td>
                <td>{{ $city->Population }}</td>
                <td>
                    <form action="{{ route('city.destroy',$city->ID) }}" method="Post">
                        <a class="btn btn-primary"href="{{ route('city.edit',$city->ID) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
</div>
</body>
</html>