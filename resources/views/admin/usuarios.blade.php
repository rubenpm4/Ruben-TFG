@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    {{-- Encabezado --}}
    <div class="dashboard-header">
        <h1>Panel de Administración</h1>
        <div class="dashboard-actions">
            <a href="{{ route('inicio') }}" class="btn-secondary">
                {{-- Icono volver --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Volver al inicio
            </a>

            {{-- Cerrar sesión --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    {{-- Icono logout --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    {{-- Advertencia de seguridad --}}
    <div class="security-warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <p>Esta área contiene información sensible. Acceso restringido solo a administradores autorizados.</p>
    </div>

    {{-- Tabla de usuarios --}}
    <div class="users-table-container">
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at }}</td>
                        <td>
                            @if ($usuario->baneado)
                                <span class="btn-banned">BANEADO</span>
                            @else
                                <form action="{{ route('admin.banear', $usuario->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-banear">Banear</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    :root {
        --primary: #0f0f15;
        --secondary: #1a1a2e;
        --accent: #FFD700;
        --accent-light: #FFE55C;
        --text: #F5F5F5;
        --text-light: #FFFFFF;
        --text-muted: #B3B3B3;
        --highlight: #2A2A2A;
        --border: #3D3D3D;
        --danger: #E74C3C;
        --danger-light: #FF6B6B;
        --warning: #F39C12;
        --warning-light: #FFC107;
        --success: #4BB543;
        --success-light: #6BCB63;
        --shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .admin-dashboard {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
        color: var(--text);
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border);
        position: relative;
    }

    .dashboard-header::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, var(--accent), transparent);
    }

    .dashboard-header h1 {
        font-size: 2rem;
        color: var(--accent);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .dashboard-header h1::before {
        content: '⚙️';
        font-size: 1.2rem;
    }

    .dashboard-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-secondary,
    .btn-logout,
    .btn-ban {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.7rem 1.2rem;
        border-radius: 6px;
        font-weight: 500;
        transition: var(--transition);
        font-size: 0.95rem;
        cursor: pointer;
    }

    .btn-secondary {
        background-color: var(--highlight);
        color: var(--text);
        border: 1px solid var(--accent);
        text-decoration: none;
    }

    .btn-secondary:hover {
        background-color: rgba(255, 215, 0, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 215, 0, 0.1);
    }

    .btn-logout {
        background-color: var(--danger);
        color: white;
        border: none;
    }

    .btn-logout:hover {
        background-color: var(--danger-light);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(231, 76, 60, 0.2);
    }

    .btn-ban {
        background-color: var(--danger);
        color: white;
        border: none;
    }

    .btn-ban:hover {
        background-color: var(--danger-light);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(231, 76, 60, 0.2);
    }

    .security-warning {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        background: linear-gradient(90deg, rgba(243, 156, 18, 0.1), transparent);
        border-left: 4px solid var(--warning);
        padding: 1.2rem;
        margin-bottom: 2.5rem;
        border-radius: 6px;
        animation: pulseWarning 2s infinite;
    }

    @keyframes pulseWarning {
        0% { border-left-color: var(--warning); }
        50% { border-left-color: var(--warning-light); }
        100% { border-left-color: var(--warning); }
    }

    .security-warning svg {
        flex-shrink: 0;
        color: var(--warning);
    }

    .security-warning p {
        margin: 0;
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    .users-table-container {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: var(--shadow);
        margin-bottom: 3rem;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
        background-color: var(--secondary);
    }

    .users-table th, 
    .users-table td {
        padding: 1.2rem;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }

    .users-table th {
        background-color: var(--primary);
        color: var(--accent);
        font-weight: 600;
        position: sticky;
        top: 0;
        white-space: nowrap;
    }

    .users-table tr:last-child td {
        border-bottom: none;
    }

    .users-table tr:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    .admin-user {
        background-color: rgba(75, 181, 67, 0.05);
    }

    .password-hash {
        font-family: monospace;
        font-size: 0.8rem;
        word-break: break-all;
        color: var(--text-muted);
    }

    .text-danger {
        color: var(--danger-light);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .admin-label {
        font-weight: 600;
        color: var(--success-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background-color: rgba(75, 181, 67, 0.2);
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1.5rem;
        }
        
        .dashboard-actions {
            width: 100%;
            flex-direction: column;
        }
        
        .btn-secondary,
        .btn-logout {
            width: 100%;
            justify-content: center;
        }
        
        .users-table th, 
        .users-table td {
            padding: 0.8rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .security-warning {
            flex-direction: column;
            gap: 0.8rem;
        }
        
        .security-warning svg {
            align-self: center;
        }
    }

    .btn-banear {
        background-color: var(--danger);
        color: var(--text-light);
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        font-size: 0.9rem;
        transition: var(--transition);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .btn-banear:hover {
        background-color: var(--danger-light);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(255, 107, 107, 0.3);
    }

    .btn-banned {
        display: inline-block;
        background-color: #555;
        color: var(--text-muted);
        padding: 0.4rem 0.9rem;
        border-radius: 5px;
        font-size: 0.85rem;
        font-weight: bold;
        letter-spacing: 0.5px;
    }
</style>
@endsection