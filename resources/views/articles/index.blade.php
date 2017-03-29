@if(isset($totos))
<h1>liste des articles</h1>


<table>
    <thead>
     <tr>
         <td>id</td>
         <td>nom</td>
         <td>slug</td>

         <td>created</td>
         <td>modified</td>
     </tr>
    </thead>
    <tbody>
@foreach($totos as $toto)
    <tr>
        <td>{{$toto->id}}</td>
        <td>{{$toto->nom}}</td>
        <td>{{$toto->slug}}</td>

        <td>{{$toto->created_at}}</td>
        <td>{{$toto->updated_at or 'rien'}}</td>
    </tr>
@endforeach
    </tbody>
</table>
@else
    <h2>ceci est un index temporaire</h2>
@endif
