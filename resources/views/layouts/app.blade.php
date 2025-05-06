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
            --notification: #e74c3c;
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
            padding: 1rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
            border-bottom: 3px solid var(--accent);
            position: relative;
            z-index: 1000;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .welcome-message {
            font-size: 1.1rem;
            font-weight: 500;
            margin-right: 1.5rem;
            position: relative;
            padding-right: 1.5rem;
        }
        
        .welcome-message span {
            color: var(--accent);
            font-weight: bold;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.3);
        }
        
        .welcome-message::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 60%;
            width: 1px;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            cursor: pointer;
            border: 2px solid transparent;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .profile-btn {
            background-color: rgba(255, 215, 0, 0.1);
            color: var(--accent);
            border-color: var(--accent);
        }
        
        .profile-btn:hover {
            background-color: rgba(255, 215, 0, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
        }
        
        .edit-btn {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--info);
            border-color: var(--info);
        }
        
        .edit-btn:hover {
            background-color: rgba(52, 152, 219, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.25);
        }
        
        .logout-btn {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--text);
            border: 2px solid var(--danger);
        }
        
        .logout-btn:hover {
            background-color: rgba(231, 76, 60, 0.25);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.25);
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--accent);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.03);
        }
        
        .logo::before {
            content: "⚽";
            font-size: 1.5rem;
        }

        /* Estilos mejorados para notificaciones */
        .notification-bell {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-right: 2rem;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .notification-bell:hover {
            background-color: rgba(255, 215, 0, 0.1);
        }

        .bell-icon {
            font-size: 1.4rem;
            color: var(--accent);
            transition: all 0.3s ease;
        }

        .notification-bell:hover .bell-icon {
            transform: rotate(15deg) scale(1.1);
        }

        .notification-count {
            position: absolute;
            top: -3px;
            right: -3px;
            background-color: var(--notification);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
            box-shadow: 0 0 0 2px var(--secondary);
        }

        .notifications-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background-color: var(--secondary);
            border: 1px solid var(--highlight);
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 350px;
            max-height: 500px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
            transform-origin: top right;
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.2s ease;
        }

        .notifications-dropdown.show-notifications {
            display: block;
            transform: scale(1);
            opacity: 1;
        }

        .notification-item {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--highlight);
            transition: all 0.2s ease;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item:hover {
            background-color: rgba(255, 215, 0, 0.05);
        }

        .notification-item.unread {
            background-color: rgba(255, 215, 0, 0.08);
            border-left: 3px solid var(--accent);
        }

        .notification-time {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .notification-time::before {
            content: "🕒";
            font-size: 0.6rem;
        }

        .text-accent {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .text-accent:hover {
            color: #ffea00;
            text-decoration: underline;
        }
        
        main {
            padding: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 1.2rem;
                padding: 1.2rem;
            }
            
            .user-info {
                width: 100%;
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }
            
            .welcome-message {
                width: 100%;
                text-align: center;
                margin-right: 0;
                margin-bottom: 0.5rem;
                padding-right: 0;
            }
            
            .welcome-message::after {
                display: none;
            }
            
            .nav-btn {
                flex: 1 1 45%;
                justify-content: center;
                min-width: 120px;
                padding: 0.7rem;
            }

            .notifications-dropdown {
                width: 280px;
                right: 50%;
                transform: translateX(50%) scale(0.95);
            }
            
            .notifications-dropdown.show-notifications {
                transform: translateX(50%) scale(1);
            }
            
            main {
                padding: 1.5rem;
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

            <div class="notification-bell" id="notificationBell">
                <svg class="bell-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
                @auth
                <span class="notification-count" id="notificationCounter">
                    {{ auth()->user()->notifications()->where('read', false)->count() }}
                </span>
                @endauth
                
                <div class="notifications-dropdown" id="notificationsDropdown">
                    @auth
                        @forelse(auth()->user()->notifications()->orderBy('created_at', 'desc')->take(10)->get() as $notification)
                            <div class="notification-item {{ $notification->read ? '' : 'unread' }}" data-id="{{ $notification->id }}">
                                @if($notification->type == 'like')
                                    @php $data = json_decode($notification->data) @endphp
                                    <div>
                                        <a href="{{ route('usuarios.show', $data->liker_id) }}" class="text-accent">{{ $data->liker_name }}</a> 
                                        le dio like a tu publicación
                                    </div>
                                @elseif($notification->type == 'comment')
                                    @php $data = json_decode($notification->data) @endphp
                                    <div>
                                        <a href="{{ route('usuarios.show', $data->commenter_id) }}" class="text-accent">{{ $data->commenter_name }}</a> 
                                        comentó tu publicación
                                    </div>
                                @elseif($notification->type == 'follow')
                                    @php $data = json_decode($notification->data) @endphp
                                    <div>
                                        <a href="{{ route('usuarios.show', $data->follower_id) }}" class="text-accent">{{ $data->follower_name }}</a> 
                                        comenzó a seguirte
                                    </div>
                                @endif
                                <div class="notification-time">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                        @empty
                            <div class="notification-item">
                                <div>No tienes notificaciones</div>
                            </div>
                        @endforelse
                    @endauth
                </div>
            </div>

            <a href="{{ route('usuarios.show', auth()->user()->id) }}" class="nav-btn profile-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                Mi Perfil
            </a>

            <a href="{{ route('perfil.edit') }}" class="nav-btn edit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
                Editar
            </a>

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

    <script>
        // Toggle del dropdown de notificaciones con animación
        document.getElementById('notificationBell').addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = document.getElementById('notificationsDropdown');
            const isShowing = dropdown.classList.contains('show-notifications');
            
            if (isShowing) {
                dropdown.classList.remove('show-notifications');
            } else {
                dropdown.classList.add('show-notifications');
                markNotificationsAsRead();
            }
        });

        // Cerrar el dropdown al hacer clic fuera
        document.addEventListener('click', function() {
            document.getElementById('notificationsDropdown').classList.remove('show-notifications');
        });

        // Evitar que el dropdown se cierre al hacer clic dentro
        document.getElementById('notificationsDropdown').addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Animación mejorada de la campana
        const bell = document.querySelector('.bell-icon');
        document.getElementById('notificationBell').addEventListener('mouseenter', function() {
            bell.style.transform = 'rotate(10deg) scale(1.1)';
            setTimeout(() => {
                bell.style.transform = 'rotate(-10deg) scale(1.1)';
            }, 150);
            setTimeout(() => {
                bell.style.transform = 'rotate(0) scale(1.1)';
            }, 300);
        });
        
        document.getElementById('notificationBell').addEventListener('mouseleave', function() {
            bell.style.transform = 'rotate(0) scale(1)';
        });

        // Marcar notificaciones como leídas
        function markNotificationsAsRead() {
            const unreadCount = parseInt(document.getElementById('notificationCounter').textContent);
            if (unreadCount === 0) return;
            
            fetch('{{ route("notifications.markAsRead") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('notificationCounter').textContent = '0';
                    document.querySelectorAll('.notification-item.unread').forEach(item => {
                        item.classList.remove('unread');
                    });
                }
            });
        }
    </script>
</body>
</html>