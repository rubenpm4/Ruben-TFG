<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KizumaScore - La red social futbolera</title>
    <style>
        :root {
            --primary: #121212;
            --secondary: #1E1E1E;
            --accent: #FFD700;
            --text: #F5F5F5;
            --highlight: #2A2A2A;
            --success: #4BB543;
            --danger: #E74C3C;
            --info: #3498db;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--primary);
            color: var(--text);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .navbar {
            background-color: var(--secondary);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            border-bottom: 3px solid var(--accent);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .welcome-message {
            font-size: 1.1rem;
            font-weight: 500;
            margin-right: 1rem;
        }
        
        .welcome-message span {
            color: var(--accent);
            font-weight: bold;
        }
        
        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }
        
        .profile-btn {
            background-color: rgba(255, 215, 0, 0.1);
            color: var(--accent);
            border-color: var(--accent);
        }
        
        .profile-btn:hover {
            background-color: rgba(255, 215, 0, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(255, 215, 0, 0.2);
        }
        
        .edit-btn {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--info);
            border-color: var(--info);
        }
        
        .edit-btn:hover {
            background-color: rgba(52, 152, 219, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.2);
        }
        
        .logout-btn {
            background-color: transparent;
            color: var(--text);
            border: 2px solid var(--danger);
        }
        
        .logout-btn:hover {
            background-color: var(--danger);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--accent);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo::before {
            content: "⚽";
            font-size: 1.5rem;
        }
        
        main {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            
            .user-info {
                width: 100%;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.8rem;
            }
            
            .welcome-message {
                width: 100%;
                text-align: center;
                margin-right: 0;
                margin-bottom: 0.5rem;
            }
            
            .nav-btn {
                flex: 1;
                justify-content: center;
                min-width: 120px;
            }
            
            main {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('inicio') }}" class="logo">KizumaScore</a>
        
        @auth
        <div class="user-info">
            <p class="welcome-message">Hola, <span>{{ auth()->user()->name }}</span></p>

            <!-- Botón Ver Perfil Público -->
            <a href="{{ route('usuarios.show', auth()->user()->id) }}" class="nav-btn profile-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                Mi Perfil
            </a>

            <!-- Botón Editar Perfil -->
            <a href="{{ route('perfil.edit') }}" class="nav-btn edit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
                Editar
            </a>

            <!-- Botón Cerrar Sesión -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="nav-btn logout-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    Salir
                </button>
            </form>
        </div>
        @endauth
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>