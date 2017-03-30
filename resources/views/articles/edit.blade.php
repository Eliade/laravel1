
@include('header')


            <h2>création d'un article</h2>

            {!! Form::model($article) !!}
            <div class="form-group">
                {{Form::label('nom article')}}
                {{Form::text('nom',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('slug')}}
                {{Form::text('slug',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('extrait')}}
                {{Form::text('extrait',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('contenu')}}
                {{Form::textarea('contenu',null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::submit('envoyer',['class' => 'btn-success btn'])}}
            </div>
            {!! Form::close() !!}

@include('footer')