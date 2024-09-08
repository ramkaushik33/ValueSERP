<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Search Form</h4>
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('search.handle') }}" method="POST">
                    @csrf
                    @for ($i = 0; $i < 5; $i++)
                        <div>
                            <label for="query{{ $i }}">Search Query {{ $i + 1 }}:</label>
                            <input type="text" name="queries[]" id="query{{ $i }}">
                        </div>
                    @endfor
                    <button type="submit">Search</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
