<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | KizumaScore</title>
    <style>
        :root {
            --primary: #1a1a2e;
            --secondary: #16213e;
            --accent: #f9c80e;
            --accent-light: #ffdf4d;
            --text: #e6e6e6;
            --text-light: #ffffff;
            --text-muted: #b3b3b3;
            --highlight: #0f3460;
            --border: #2a3a5a;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --error: #dc3545;
            --error-light: rgba(220, 53, 69, 0.2);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            margin: 0;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: var(--text);
            line-height: 1.6;
        }
        
        .login-wrapper {
            width: 100%;
            max-width: 420px;
            position: relative;
        }
        
        .login-container {
            background-color: rgba(26, 26, 46, 0.9);
            backdrop-filter: blur(8px);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            width: 100%;
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: var(--transition);
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.6);
        }
        
        .login-container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                rgba(22, 33, 62, 0.8),
                rgba(26, 26, 46, 0.9)
            ), url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            z-index: -1;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .logo h1 {
            color: var(--accent);
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .logo .football-icon {
            filter: drop-shadow(0 0 4px rgba(249, 200, 14, 0.6));
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .input-group {
            position: relative;
        }
        
        input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid var(--highlight);
            border-radius: 8px;
            background-color: rgba(15, 52, 96, 0.4);
            color: var(--text-light);
            font-size: 1rem;
            transition: var(--transition);
        }
        
        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(249, 200, 14, 0.3);
            background-color: rgba(15, 52, 96, 0.6);
        }
        
        input::placeholder {
            color: var(--text-muted);
            opacity: 0.8;
        }
        
        button {
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            color: var(--primary);
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.5rem;
            box-shadow: 0 4px 15px rgba(249, 200, 14, 0.3);
        }
        
        button:hover {
            background: linear-gradient(135deg, var(--accent-light), var(--accent));
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(249, 200, 14, 0.4);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .links {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
            text-align: center;
        }
        
        .links a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: 4px;
        }
        
        .links a:hover {
            color: var(--text-light);
            background-color: rgba(249, 200, 14, 0.1);
            text-decoration: none;
        }
        
        .admin-link {
            margin-top: 2rem;
            text-align: center;
        }
        
        .admin-link a {
            color: var(--text-muted);
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .admin-link a:hover {
            color: var(--accent);
        }
        
        /* Estilos para el mensaje de error */
        .error-message {
            background-color: var(--error-light);
            color: var(--text-light);
            border-left: 4px solid var(--error);
            padding: 12px 16px;
            margin-bottom: 1.5rem;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        .error-message::before {
            content: "⚠";
            font-size: 1.2rem;
            color: var(--error);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 1.5rem;
            }
            
            .login-container {
                padding: 2rem 1.5rem;
            }
            
            .logo h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="logo">
                <h1><span class="football-icon">⚽</span> KizumaScore</h1>
            </div>
            
            @if($errors->any())
                <div class="error-message">
                    Correo electrónico o contraseña incorrectos
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Iniciar Sesión</button>
            </form>
            
            <div class="links">
                <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
            </div>
        </div>
        
        <div class="admin-link">
            <a href="{{ route('admin.login') }}">Acceso administradores</a>
        </div>
    </div>
</body>
</html>