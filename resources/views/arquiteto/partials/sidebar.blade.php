<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('arquiteto/dashboard') ? 'bg-primary-dark' : '' }}" 
                   href="{{ route('arquiteto.dashboard') }}">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>

            <!-- Cadastros -->
            <li class="nav-item mt-3">
                <span class="text-white-50 px-3 text-uppercase small fw-bold">Cadastros</span>
            </li>
            
            <!-- Usuários -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('arquiteto/usuarios*') ? 'bg-primary-dark' : '' }}" 
                   href="{{ route('arquiteto.usuarios.index') }}">
                    <i class="fas fa-users me-2"></i> Usuários
                </a>
            </li>

            <!-- Manutenções -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('arquiteto/manutencoes*') ? 'bg-primary-dark' : '' }}" 
                   href="{{ route('arquiteto.manutencoes.index') }}">
                    <i class="fas fa-wrench me-2"></i> Manutenções
                </a>
            </li>

            <!-- Filiais -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('arquiteto/filiais*') ? 'bg-primary-dark' : '' }}" 
                   href="{{ route('arquiteto.filiais.index') }}">
                    <i class="fas fa-building me-2"></i> Filiais
                </a>
            </li>

            <!-- Equipamentos -->
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('arquiteto/equipamentos*') ? 'bg-primary-dark' : '' }}" 
                   href="{{ route('arquiteto.equipamentos.index') }}">
                    <i class="fas fa-cogs me-2"></i> Equipamentos
                </a>
            </li>

            <!-- Relatórios -->
            <li class="nav-item mt-3">
                <a class="nav-link text-white {{ Request::is('arquiteto/relatorios*') ? 'bg-primary-dark' : '' }}" 
                   href="{{ route('arquiteto.relatorios.index') }}">
                    <i class="fas fa-chart-bar me-2"></i> Relatórios
                </a>
            </li>
        </ul>
    </div>
</nav>
