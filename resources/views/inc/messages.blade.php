@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($error->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ $success }}
    </div>

@endif

@if (session('warning'))
    <div class="alert alert-warning">
        <strong>Warning!</strong> {{ $warning }}
    </div>

@endif

@if (session('danger'))
    <div class="alert alert-danger">
        <strong>Danger!</strong> {{ session('danger') }}
    </div>

@endif
