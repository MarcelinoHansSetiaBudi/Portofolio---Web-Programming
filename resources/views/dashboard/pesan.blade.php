@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li> 
        @endforeach
    </ul>
    </div>
@endif

@if (Session::has('Success'))
    <div class="alert alert-success">
        {{ Session::get('Success') }}
    </div>
    
@endif