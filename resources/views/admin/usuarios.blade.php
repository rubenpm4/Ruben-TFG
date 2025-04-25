@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <div class="admin-header">
        <h1>Panel de Administración</h1>
        <div class="admin-actions">
            <a href="{{ route('inicio') }}" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Volver al inicio
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    <div class="security-warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <p>Esta área contiene información sensible. Acceso restringido solo a administradores autorizados.</p>
    </div>

    <div class="users-table-container">
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Contraseña (Hash)</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr class="{{ $usuario->email === '159paradas@gmail.com' ? 'admin-user' : '' }}">
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td class="password-hash">{{ $usuario->password }}</td>
                    <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    :root {
        --primary: #121212;
        --secondary: #1E1E1E;
        --accent: #FFD700;
        --text: #F5F5F5;
        --highlight: #2A2A2A;
        --danger: #E74C3C;
        --warning: #f39c12;
        --success: #4BB543;
    }

    .admin-dashboard {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
        color: var(--text);
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--highlight);
    }

    .admin-header h1 {
        font-size: 1.8rem;
        color: var(--accent);
        margin: 0;
    }

    .admin-actions {
        display: flex;
        gap: 1rem;
    }

    .btn-secondary, .btn-logout {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-secondary {
        background-color: var(--highlight);
        color: var(--text);
        border: 1px solid var(--accent);
    }

    .btn-secondary:hover {
        background-color: rgba(255, 215, 0, 0.1);
    }

    .btn-logout {
        background-color: var(--danger);
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-logout:hover {
        background-color: #c0392b;
    }

    .security-warning {
        display: flex;
        align-items: center;
        gap: 1rem;
        background-color: rgba(243, 156, 18, 0.1);
        border-left: 4px solid var(--warning);
        padding: 1rem;
        margin-bottom: 2rem;
        border-radius: 4px;
    }

    .security-warning svg {
        flex-shrink: 0;
        color: var(--warning);
    }

    .security-warning p {
        margin: 0;
        font-size: 0.9rem;
    }

    .users-table-container {
        overflow-x: auto;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .users-table th, .users-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid var(--highlight);
    }

    .users-table th {
        background-color: var(--secondary);
        color: var(--accent);
        font-weight: bold;
        position: sticky;
        top: 0;
    }

    .users-table tr:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .admin-user {
        background-color: rgba(75, 181, 67, 0.1);
    }

    .password-hash {
        font-family: monospace;
        font-size: 0.8rem;
        word-break: break-all;
    }

    @media (max-width: 768px) {
        .admin-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .admin-actions {
            width: 100%;
            flex-direction: column;
        }
        
        .btn-secondary, .btn-logout {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection