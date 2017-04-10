@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/article/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-edit"></i> &nbsp;Articles de doctrine</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table" style="margin-bottom: 0px;" id="arrets">
                        <thead>
                        <tr>
                            <th class="col-sm-1">Action</th>
                            <th class="col-sm-6">Titre</th>
                            <th class="col-sm-2">Date de publication</th>
                            <th class="col-sm-1">Volume</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">
                        <?php setlocale(LC_ALL, 'fr_FR.UTF-8'); ?>

                            @if(!empty($articles))
                                @foreach($articles as $article)
                                    <tr>
                                        <td><a class="btn btn-sky btn-sm" href="{{ url('admin/article/'.$article->id) }}">éditer</a></td>
                                        <td><strong>{{ $article->titre }}</strong></td>
                                        <td>{{ $article->pub_date->formatLocalized('%d %B %Y') }}</td>
                                        <td>{{ $rjn[$article->volume_id] }}</td>
                                        <td>
                                            {!! Form::open(array('route' => array('admin.article.destroy', $article->id), 'method' => 'delete')) !!}
                                            <button data-action="arrêt {{ $article->designation }}" class="btn btn-danger btn-sm deleteAction">Supprimer</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="col-sm-1">Action</th>
                                <th class="col-sm-6">Titre</th>
                                <th class="col-sm-2">Date de publication</th>
                                <th class="col-sm-1">Volume</th>
                                <th class="col-sm-1"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@stop