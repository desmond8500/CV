







<li class="nav-item {{ Request::is('skills*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('skills.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Skills</span>
    </a>
</li>
<li class="nav-item {{ Request::is('interets*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('interets.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Interets</span>
    </a>
</li>

<li class="nav-item {{ Request::is('formations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('formations.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Formations</span>
    </a>
</li>
<li class="nav-item {{ Request::is('competences*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('competences.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Competences</span>
    </a>
</li>
<li class="nav-item {{ Request::is('etatCivils*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('etatCivils.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Etat  Civils</span>
    </a>
</li>
<li class="nav-item {{ Request::is('langues*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('langues.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Langues</span>
    </a>
</li>
<li class="nav-item {{ Request::is('taches*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('taches.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Taches</span>
    </a>
</li>
<li class="nav-item {{ Request::is('exptasks*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('exptasks.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Exptasks</span>
    </a>
</li>
