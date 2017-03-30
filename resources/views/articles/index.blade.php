@include('header')


@if(isset($totos))
<h1>liste des articles</h1>


<table class="table table-bordered">
    <thead>
     <tr>
         <td>id</td>

         <td>slug</td>
         <td>created</td>
         <td>modified</td>
         <td>voir</td>
         <td>editer</td>
         <td>supprimer</td>
     </tr>
    </thead>
    <tbody>
@foreach($totos as $toto)
    <tr>
        <td>{{$toto->id}}</td>

        <td>{{$toto->slug}}</td>
        <td>{{$toto->created_at}}</td>
        <td>{{$toto->updated_at or 'rien'}}</td>
        <td><a href="{{ route('voirBySlug',['slug'=>$toto->slug]) }}" class="btn btn-success">voir</a></td>
        <td><a href="{{ route('editerArticle',['id'=>$toto->id]) }}" class="btn btn-primary">editer</a></td>
        <td>
            {{ Form::open(['route' => ['destroy', $toto->id], 'method' => 'delete']) }}
            {{Form::submit('supprimer',['id' => 'btn_ajax','class'=>'btn btn-danger'])}}
            {{ Form::close() }}
        </td>
    </tr>
@endforeach
    </tbody>
</table>
@else
    <h2>ceci est un index temporaire</h2>
@endif

@include('footer')