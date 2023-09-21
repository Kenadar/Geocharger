@section('list')
 
<ul>
    @foreach ($geodatas as $geodata) 
    
    <li><?= $geodata; ?></li>

    @endforeach
</ul>
@section