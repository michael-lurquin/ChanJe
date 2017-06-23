<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        @if (Auth::check())
            Vous êtes <strong>{{ Auth::user()->fullName() }}</strong> et vous avez le rôle <strong>{{ Auth::user()->getRole() }}</strong>
        @endif
    </div>
</div>
