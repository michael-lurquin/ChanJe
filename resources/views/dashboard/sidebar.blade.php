<div class="list-group fa-ul">
    @role('Administrateur')
        <a href="{{ route('roles') }}" class="list-group-item {{ Route::is('roles')? 'active': '' }}">
            <i class="fa-fw fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;Gestion des rôles
        </a>
        <a href="#" class="list-group-item">
            <i class="fa-fw fa fa-lock" aria-hidden="true"></i>&nbsp;Gestion des permissions
        </a>
    @endrole
</div>
