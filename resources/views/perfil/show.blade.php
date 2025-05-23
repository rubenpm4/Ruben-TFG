@extends('layouts.app')

@section('content')
<div class="profile-container">
    <!-- Header del perfil -->
    <div class="profile-header">
        <div class="profile-avatar-container">
            <img src="{{ $usuario->foto_perfil ? asset('storage/' . $usuario->foto_perfil) : 'https://via.placeholder.com/150/1a1a2e/e6e6e6?text=KS' }}" 
                 class="profile-avatar" 
                 alt="Foto de perfil de {{ $usuario->name }}">
            @if(auth()->id() !== $usuario->id)
                <form action="{{ auth()->user()->estaSiguiendo($usuario) ? route('usuarios.dejar', $usuario) : route('usuarios.seguir', $usuario) }}" 
                      method="POST"
                      class="follow-form">
                    @csrf
                    @if(auth()->user()->estaSiguiendo($usuario))
                        @method('DELETE')
                        <button type="submit" class="follow-btn unfollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M10.146 5.146a.5.5 0 0 1 .708 0L12 6.293l1.146-1.147a.5.5 0 0 1 .708.708L12.707 7l1.147 1.146a.5.5 0 0 1-.708.708L12 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L11.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Dejar de seguir
                        </button>
                    @else
                        <button type="submit" class="follow-btn follow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            Seguir
                        </button>
                    @endif
                </form>
            @endif
        </div>
        
        <div class="profile-info">
            <h1 class="profile-name">{{ $usuario->name }}</h1>
            
            @if($usuario->equipo_favorito)
            <div class="favorite-team">
                <span class="team-name">{{ $usuario->equipo_favorito }}</span>
            </div>
            @endif
            
            <p class="profile-bio">{{ $usuario->bio ?? 'Este usuario no ha escrito una biografía todavía.' }}</p>
        </div>
    </div>

    <!-- Estadísticas simplificadas -->
    <div class="profile-stats">
        <div class="stat-item">
            <span class="stat-number">{{ $seguidores }}</span>
            <span class="stat-label">Seguidores</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $seguidos }}</span>
            <span class="stat-label">Seguidos</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $publicaciones->count() }}</span>
            <span class="stat-label">Publicaciones</span>
        </div>
    </div>

    <!-- Pestañas de navegación -->
    <div class="tabs-container">
        <div class="tabs">
            <button class="tab-btn active" data-tab="posts">Publicaciones</button>
            <button class="tab-btn" data-tab="followers">Seguidores</button>
            <button class="tab-btn" data-tab="following">Seguidos</button>
        </div>
        
        <!-- Contenido de las pestañas -->
        <div class="tab-content active" id="posts-tab">
            @forelse ($publicaciones as $post)
            <div class="post-card">
                <p class="post-content">{{ $post->contenido }}</p>
                <div class="post-footer">
                    <button class="like-btn">👍 {{ $post->likes_count }}</button>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <img src="{{ asset('images/empty-posts.svg') }}" alt="Sin publicaciones">
                <p>Este usuario aún no ha publicado nada.</p>
            </div>
            @endforelse
        </div>
        
        <div class="tab-content" id="followers-tab">
            @if($seguidoresLista->count() > 0)
                @foreach($seguidoresLista as $seguidor)
                <div class="user-card">
                    <div class="user-info">
                        <img src="{{ $seguidor->foto_perfil ? asset('storage/' . $seguidor->foto_perfil) : 'https://via.placeholder.com/50/1a1a2e/e6e6e6?text=KS' }}" 
                             class="user-avatar" 
                             alt="Foto de {{ $seguidor->name }}">
                        <div>
                            <h4>{{ $seguidor->name }}</h4>
                            <p>{{ $seguidor->bio ?? 'Sin biografía' }}</p>
                        </div>
                    </div>
                    @if(auth()->id() !== $seguidor->id)
                    <form action="{{ auth()->user()->estaSiguiendo($seguidor) ? route('usuarios.dejar', $seguidor) : route('usuarios.seguir', $seguidor) }}" method="POST">
                        @csrf
                        @if(auth()->user()->estaSiguiendo($seguidor))
                            @method('DELETE')
                            <button type="submit" class="small-follow-btn unfollow">
                                Dejar de seguir
                            </button>
                        @else
                            <button type="submit" class="small-follow-btn follow">
                                Seguir
                            </button>
                        @endif
                    </form>
                    @endif
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <img src="{{ asset('images/empty-users.svg') }}" alt="Sin seguidores">
                    <p>Este usuario no tiene seguidores todavía.</p>
                </div>
            @endif
        </div>
        
        <div class="tab-content" id="following-tab">
            @if($seguidosLista->count() > 0)
                @foreach($seguidosLista as $seguido)
                <div class="user-card">
                    <div class="user-info">
                        <img src="{{ $seguido->foto_perfil ? asset('storage/' . $seguido->foto_perfil) : 'https://via.placeholder.com/50/1a1a2e/e6e6e6?text=KS' }}" 
                             class="user-avatar" 
                             alt="Foto de {{ $seguido->name }}">
                        <div>
                            <h4>{{ $seguido->name }}</h4>
                            <p>{{ $seguido->bio ?? 'Sin biografía' }}</p>
                        </div>
                    </div>
                    @if(auth()->id() !== $seguido->id)
                    <form action="{{ auth()->user()->estaSiguiendo($seguido) ? route('usuarios.dejar', $seguido) : route('usuarios.seguir', $seguido) }}" method="POST">
                        @csrf
                        @if(auth()->user()->estaSiguiendo($seguido))
                            @method('DELETE')
                            <button type="submit" class="small-follow-btn unfollow">
                                Dejar de seguir
                            </button>
                        @else
                            <button type="submit" class="small-follow-btn follow">
                                Seguir
                            </button>
                        @endif
                    </form>
                    @endif
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <img src="{{ asset('images/empty-users.svg') }}" alt="Sin seguidos">
                    <p>Este usuario no sigue a nadie todavía.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #121212;
        --secondary: #1E1E1E;
        --accent: #FFD700;
        --text: #F5F5F5;
        --highlight: #2A2A2A;
        --success: #4BB543;
        --danger: #E74C3C;
        --card-bg: #1E1E1E;
        --real-madrid-blue: #00529F;
        --real-madrid-gold: #FFD700;
    }

    .profile-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
        color: var(--text);
    }

    .profile-header {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        align-items: center;
        padding: 1.5rem;
        background-color: var(--card-bg);
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        border-left: 4px solid var(--accent);
    }

    .profile-avatar-container {
        position: relative;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--accent);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .follow-form {
        position: absolute;
        top: 60px;
        right: -550px;
    }

    .follow-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        border: none;
        font-size: 0.9rem;
    }

    .follow-btn.follow {
        background-color: var(--accent);
        color: var(--primary);
    }

    .follow-btn.follow:hover {
        background-color: #e6c200;
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
    }

    .follow-btn.unfollow {
        background-color: var(--danger);
        color: white;
    }

    .follow-btn.unfollow:hover {
        background-color: #c0392b;
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
    }

    .follow-btn svg {
        transition: transform 0.3s ease;
    }

    .follow-btn:hover svg {
        transform: scale(1.2);
    }

    .profile-info {
        flex: 1;
        min-width: 250px;
    }

    .profile-name {
        font-size: 2rem;
        margin: 0 0 0.5rem 0;
        color: var(--accent);
    }

    .favorite-team {
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        padding: 0.4rem 1rem;
        background: rgba(0, 82, 159, 0.1);
        border-radius: 20px;
        display: inline-block;
        color: var(--accent);
    }

    .favorite-team:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 82, 159, 0.2);
    }

    .profile-bio {
        margin: 0;
        line-height: 1.6;
        opacity: 0.9;
    }

    .profile-stats {
        display: flex;
        justify-content: space-around;
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 1.5rem;
        margin: 1.5rem 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .stat-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--accent);
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.8;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Estilos para las pestañas */
    .tabs-container {
        margin-top: 2rem;
    }

    .tabs {
        display: flex;
        border-bottom: 1px solid var(--highlight);
        margin-bottom: 1.5rem;
    }

    .tab-btn {
        padding: 0.8rem 1.5rem;
        background: none;
        border: none;
        color: var(--text);
        font-size: 1rem;
        cursor: pointer;
        position: relative;
        opacity: 0.7;
        transition: all 0.3s ease;
    }

    .tab-btn:hover {
        opacity: 1;
    }

    .tab-btn.active {
        opacity: 1;
        color: var(--accent);
    }

    .tab-btn.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: var(--accent);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    /* Estilos para las tarjetas de usuario */
    .user-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--card-bg);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--accent);
    }

    .user-info h4 {
        margin: 0 0 0.3rem 0;
        color: var(--accent);
    }

    .user-info p {
        margin: 0;
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .small-follow-btn {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .small-follow-btn.follow {
        background-color: var(--accent);
        color: var(--primary);
    }

    .small-follow-btn.unfollow {
        background-color: var(--danger);
        color: white;
    }

    .small-follow-btn:hover {
        transform: translateY(-1px);
    }

    /* Estilos para las publicaciones (mantenidos del código anterior) */
    .post-card {
        background-color: var(--card-bg);
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .post-card:hover {
        transform: translateY(-3px);
    }

    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .post-time {
        font-size: 0.8rem;
        opacity: 0.7;
    }

    .post-actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        background: none;
        border: none;
        cursor: pointer;
        opacity: 0.7;
        transition: opacity 0.3s ease;
        font-size: 1rem;
    }

    .action-btn:hover {
        opacity: 1;
    }

    .post-content {
        margin: 0 0 1.5rem 0;
        line-height: 1.6;
    }

    .post-footer {
        display: flex;
        gap: 1rem;
    }

    .like-btn, .comment-btn {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        background: none;
        border: none;
        color: var(--text);
        cursor: pointer;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .like-btn:hover, .comment-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .empty-state {
        text-align: center;
        padding: 3rem 0;
        opacity: 0.7;
    }

    .empty-state img {
        width: 150px;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    @media (max-width: 600px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
        }

        .follow-form {
            position: relative;
            top: auto;
            right: auto;
            margin-top: 1rem;
            display: flex;
            justify-content: center;
        }

        .favorite-team {
            margin: 0 auto 1rem auto;
        }

        .profile-stats {
            flex-wrap: wrap;
            gap: 1rem;
        }

        .stat-item {
            width: 45%;
        }

        .tabs {
            justify-content: space-around;
        }

        .tab-btn {
            padding: 0.8rem 0.5rem;
            font-size: 0.9rem;
        }

        .user-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .small-follow-btn {
            width: 100%;
            padding: 0.6rem;
        }
    }
</style>

<script>
    // Animación para los botones de seguir/dejar de seguir
    document.querySelectorAll('.follow-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.querySelector('svg').style.transform = 'scale(1.2)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.querySelector('svg').style.transform = 'scale(1)';
        });
    });

    // Funcionalidad para las pestañas
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remover clase active de todos los botones y contenidos
            document.querySelectorAll('.tab-btn').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            // Añadir clase active al botón clickeado
            this.classList.add('active');
            
            // Mostrar el contenido correspondiente
            const tabId = this.getAttribute('data-tab');
            document.getElementById(`${tabId}-tab`).classList.add('active');
        });
    });
</script>
@endsection
