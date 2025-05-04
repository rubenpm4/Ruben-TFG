@extends('layouts.app')

@section('content')
<div class="home-container">
    <header class="welcome-header">
        <h1>⚽ Bienvenido a KizumaScore</h1>
        <p class="subtitle">La red social donde el fútbol une pasiones</p>
    </header>

    @auth
    <div class="new-post-card">
        <form action="{{ route('posts.store') }}" method="POST" class="post-form">
            @csrf
            <div class="form-group">
                <textarea name="contenido" placeholder="¿Qué partido te emocionó hoy? Comparte tus pensamientos futbolísticos..." 
                          rows="3" class="post-textarea" required></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="post-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.5.5 0 0 1-.928.086L7.5 12.5l-4.147 4.146a.5.5 0 0 1-.707-.707L6.5 11.5 1.228 6.886a.5.5 0 0 1 .086-.928L15.314.146a.5.5 0 0 1 .54.11z"/>
                    </svg>
                    Publicar
                </button>
            </div>
        </form>
    </div>
    @endauth

    <div class="posts-feed">
        @foreach($posts as $post)
        <div class="post-card">
            <div class="post-header">
                <div class="user-info">
                    @if($post->user->foto_perfil)
                        <img src="{{ asset('storage/' . $post->user->foto_perfil) }}" alt="{{ $post->user->name }}" class="user-avatar">
                    @else
                        <div class="default-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                        </div>
                    @endif
                    <div>
                        <a href="{{ route('usuarios.show', $post->user) }}" class="username">
                            <strong>{{ $post->user->name }}</strong>
                        </a>
                        <small class="post-time">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

            <div class="post-content">
                <p>{{ $post->contenido }}</p>
            </div>

            <div class="post-actions">
                @auth
                <form action="{{ route('posts.like', $post) }}" method="POST" class="like-form">
                    @csrf
                    <button type="submit" class="like-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="{{ $post->likes->contains('user_id', auth()->id()) ? 'red' : 'currentColor' }}" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                        <span>{{ $post->likes->count() }}</span>
                    </button>
                </form>
                @endauth
            </div>

            <div class="comments-section">
                <h4 class="comments-title">Comentarios</h4>

                @foreach($post->comentarios as $comentario)
                <div class="comment">
                    <div class="comment-header">
                        @if($comentario->user->foto_perfil)
                            <img src="{{ asset('storage/' . $comentario->user->foto_perfil) }}" alt="{{ $comentario->user->name }}" class="comment-avatar">
                        @else
                            <div class="default-avatar small">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                </svg>
                            </div>
                        @endif
                        <a href="{{ route('usuarios.show', $comentario->user) }}" class="comment-username">
                            <strong>{{ $comentario->user->name }}</strong>
                        </a>
                    </div>
                    <p class="comment-content">{{ $comentario->contenido }}</p>
                </div>
                @endforeach

                @auth
                <form action="{{ route('comentarios.store', $post) }}" method="POST" class="comment-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="contenido" placeholder="Escribe un comentario..." class="comment-input" required>
                        <button type="submit" class="comment-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.5.5 0 0 1-.928.086L7.5 12.5l-4.147 4.146a.5.5 0 0 1-.707-.707L6.5 11.5 1.228 6.886a.5.5 0 0 1 .086-.928L15.314.146a.5.5 0 0 1 .54.11z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                @endauth
            </div>
        </div>
        @endforeach
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
        --input-bg: #2A2A2A;
    }

    .home-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 1rem;
    }

    .welcome-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--highlight);
    }

    .welcome-header h1 {
        font-size: 2.2rem;
        color: var(--accent);
        margin-bottom: 0.5rem;
    }

    .subtitle {
        font-size: 1rem;
        opacity: 0.8;
        margin-top: 0;
    }

    .new-post-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-left: 4px solid var(--accent);
    }

    .post-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .post-textarea {
        width: 90%;
        padding: 1rem;
        background-color: var(--input-bg);
        border: 1px solid var(--highlight);
        border-radius: 8px;
        color: var(--text);
        font-family: inherit;
        resize: vertical;
        min-height: 100px;
        transition: all 0.3s ease;
    }

    .post-textarea:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
    }

    .post-btn {
        background-color: var(--accent);
        color: var(--primary);
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: fit-content;
    }

    .post-btn:hover {
        background-color: #e6c200;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
    }

    .posts-feed {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .post-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .post-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-avatar, .default-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .default-avatar {
        background-color: var(--input-bg);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .default-avatar.small {
        width: 30px;
        height: 30px;
    }

    .default-avatar svg {
        width: 20px;
        height: 20px;
        opacity: 0.7;
    }

    .username {
        display: block;
        font-size: 1rem;
    }

    .post-time {
        font-size: 0.8rem;
        opacity: 0.7;
    }

    .post-content {
        margin: 1rem 0;
        line-height: 1.6;
    }

    .post-actions {
        padding: 0.5rem 0;
        border-top: 1px solid var(--highlight);
        border-bottom: 1px solid var(--highlight);
        margin: 1rem 0;
    }

    .like-form {
        display: inline;
    }

    .like-btn {
        background: none;
        border: none;
        color: var(--text);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .like-btn:hover {
        background-color: rgba(255, 0, 0, 0.1);
    }

    .like-btn svg {
        transition: all 0.3s ease;
    }

    .like-btn:hover svg {
        transform: scale(1.2);
    }

    .comments-section {
        margin-top: 1rem;
    }

    .comments-title {
        font-size: 1rem;
        margin-bottom: 1rem;
        color: var(--accent);
    }

    .comment {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .comment-header {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 0.5rem;
    }

    .comment-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
    }

    .comment-username {
        font-size: 0.9rem;
    }

    .comment-content {
        font-size: 0.9rem;
        margin-left: 2.3rem;
        opacity: 0.9;
    }

    .comment-form {
        margin-top: 1.5rem;
    }

    .comment-input {
        width: 90%;
        padding: 0.8rem 1rem;
        background-color: var(--input-bg);
        border: 1px solid var(--highlight);
        border-radius: 20px;
        color: var(--text);
        font-size: 0.9rem;
    }

    .comment-input:focus {
        outline: none;
        border-color: var(--accent);
    }

    .comment-btn {
        background: none;
        border: none;
        color: var(--accent);
        cursor: pointer;
        margin-left: 0.5rem;
    }

    @media (max-width: 600px) {
        .home-container {
            padding: 0.5rem;
        }
        
        .welcome-header h1 {
            font-size: 1.8rem;
        }
        
        .new-post-card, .post-card {
            padding: 1rem;
        }
    }
</style>
@endsection