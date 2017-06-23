<div class="panel panel-default" id="panel-role-edition">
    <div class="panel-heading">Ajouter un rôle</div>
    {!! Form::open(['action' => 'RoleController@store', 'data-url' => action('RoleController@store')]) !!}
        {{ method_field('POST') }}
        <div class="panel-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Nom', ['class' => 'control-label']) !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}

                @if ( $errors->has('name') )
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="panel-footer">
            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
            <button type="button" class="btn btn-default pull-right" id="btn-role-edition-cancel" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Annuler la modification">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </div>
    {!! Form::close() !!}
</div>

<div class="panel panel-default">
    <div class="panel-heading">Liste des rôles</div>
    {!! Form::open(['action' => 'RoleController@order']) !!}
        <div class="panel-body">
            <p>Liste des rôles triés par poids que vous pouvez réordonner en déplaçant l'icône qui se trouve à gauche de la ligne souhaitée.</p>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-sortable" style="margin-bottom:0" data-toggle="table">
                <thead>
                    <tr>
                        <th></th>
                        <th data-field="name" data-sortable="true">Nom</th>
                        <th data-field="created_at" data-sortable="true">Date de création</th>
                        <th data-field="updated_at" data-sortable="true">Date de modification</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td width="10" class="draggable">
                                <i class="fa fa-sort" aria-hidden="true"></i>
                            </td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at->format('d/m/Y à H:i') }}</td>
                            <td>{{ $role->updated_at->format('d/m/Y à H:i') }}</td>
                            <td>
                                <button type="button" data-url="{{ action('RoleController@update', $role) }}" data-name="{{ $role->name }}" class="btn btn-primary btn-role-edit" data-toggle="tooltip" data-placement="bottom" title="Modifier le rôle">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $role->id }}" data-placement="bottom" title="Supprimer le rôle">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                {!! Form::hidden('id[]', $role->id, ['class' => 'form-control', 'placeholder' => 'id']) !!}
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Confirmation de suppression</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Voulez-vous vraiment supprimer le rôle <strong>{{ $role->name }}</strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                        <a class="btn btn-danger" href="{{ action('RoleController@destroy', $role) }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Confirmer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td>Aucun rôle</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="panel-footer" id="table-sortable-save" style="display:none">
            {!! Form::submit('Enregistrer', ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>
