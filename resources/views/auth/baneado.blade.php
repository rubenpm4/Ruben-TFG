@extends('layouts.app')

@section('content')
<div class="container baneado-container">
    <div class="baneado-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#E74C3C" viewBox="0 0 16 16" class="baneado-icon">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <h1 class="baneado-title">Cuenta suspendida</h1>
        <p class="baneado-text">Tu cuenta ha sido baneada. Por favor, contacta con el administrador si crees que es un error.</p>
        <a href="mailto:admin@kizumascore.com" class="baneado-contact">Contactar con soporte</a>
    </div>
</div>

<style>
    :root {
        --danger: #E74C3C;
        --danger-light: #FF6B6B;
        --text: #333;
    }

    .baneado-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 2rem;
    }

    .baneado-content {
        text-align: center;
        max-width: 500px;
        padding: 2rem;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .baneado-icon {
        margin-bottom: 1.5rem;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .baneado-title {
        color: var(--danger);
        margin-bottom: 1rem;
        font-size: 2rem;
    }

    .baneado-text {
        color: var(--text);
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
    }

    .baneado-contact {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background-color: var(--danger);
        color: white;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .baneado-contact:hover {
        background-color: var(--danger-light);
        transform: translateY(-2px);
    }
</style>
@endsection