<div class="panel panel-default">
    <div class="panel-body" style="text-align: center;">
        Type de la diapo [{!!$elem[0]->type!!}] une image et un texte
        <br>
        @if ($elem[0]->title)
            Titre : {!! $elem[0]->title !!}
        @endif
        @if($elem[0]->img)
            <br>
            <div>
                Image associée à la diapo :
                {!! HTML::image($elem[0]->img, null, (['class' => 'img-responsive img-rounded', 'style'
                => 'max-height: 150px; margin-right: auto; margin-left: auto;'])) !!}
            </div>
            <br>
        @endif
        @if($elem[0]->data)
            <span>{!! $elem[0]->data!!}</span>
            <br>
        @endif
        @if($elem[0]->audio)
            <audio controls>
                <source src="{!! $elem[0]->audio !!}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        @endif
        <div>
            <a style="text-decoration: none;" class="btn btn-warning"
               href="{{ URL::action('DiapoAdminController@getEditDiapo', [$elem['id']]) }}">Éditer</a>
            <a style="text-decoration: none;" class="btn btn-danger"
               href="{{ URL::action('DiapoAdminController@getDeleteDiapo', [$elem['id']]) }}">Supprimer</a>
        </div>
    </div>
</div>