<h1>mon article : {{$article->nom}}</h1>
<b>contenu:</b> {!! $article->contenu !!}
<br>
<b>extrait:</b> {{$article->extrait}}
<br>
<b>slug:</b> {{$article->slug}}

<h2>les tags de l'article</h2>
<ul>

    @foreach ($article->tags as $tag)
        <li>{{$tag->nom}}</li>
    @endforeach
</ul>
