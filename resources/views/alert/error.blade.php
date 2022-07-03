@if ($errors->any())
    <div class="alert alert-danger col-md-12">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{$item}}</li>    
            @endforeach
        </ul>    
    </div>    
@endif