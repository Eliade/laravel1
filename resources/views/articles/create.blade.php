<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">



    <h2>création d'un article</h2>

    {!! Form::open() !!}
        <div class="form-group">
        {{Form::label('nom article')}}
        {{Form::text('nom','',['class' => 'form-control'])}}
        </div>
        <div class="form-group">
        {{Form::label('extrait')}}
        {{Form::text('extrait','',['class' => 'form-control'])}}
        </div>
        <div class="form-group">
        {{Form::label('contenu')}}
        {{Form::textarea('contenu','',['class' => 'form-control'])}}
        </div>
        <div class="form-group">
        {{Form::submit('envoyer',['class' => 'btn-success btn'])}}
        </div>
    {!! Form::close() !!}
            </div>
        </div>
    </div>

    </body>
</html>