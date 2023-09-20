@if ($errors->any())
    <div class="alert alert-warning alert-dismissible">
        <h5><i class="icon fas fa-exclamation-triangle"></i> Peringantan!</h5>
        
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </div>
@endif
@if (Session::get('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif