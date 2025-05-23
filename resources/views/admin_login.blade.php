<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador | KizumaScore</title>
    <style>
        :root {
            --primary: #1a1a2e;
            --secondary: #16213e;
            --accent: #f9c80e;
            --accent-light: #ffdf4d;
            --text: #e6e6e6;
            --text-light: #ffffff;
            --highlight: #0f3460;
            --border: #2a3a5a;
            --danger: #e74c3c;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
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
            justify-content: center;
            align-items: center;
            color: var(--text);
            line-height: 1.6;
        }
        
        .admin-login-container {
            width: 100%;
            max-width: 420px;
            position: relative;
        }
        
        .admin-login {
            background: rgba(22, 33, 62, 0.9);
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
        
        .admin-login:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7);
        }
        
        .admin-login::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--danger));
            z-index: 2;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .admin-header h2 {
            color: var(--accent);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .admin-header h2::before,
        .admin-header h2::after {
            content: "⚙️";
            font-size: 1.2rem;
            opacity: 0.7;
        }
        
        .admin-header p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        
        .error {
            color: var(--danger);
            text-align: center;
            margin-bottom: 1.5rem;
            padding: 0.8rem;
            background-color: rgba(231, 76, 60, 0.1);
            border-radius: 6px;
            border-left: 3px solid var(--danger);
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .back-link {
            margin-top: 2rem;
            text-align: center;
        }
        
        .back-link a {
            color: var(--text-muted);
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--transition);
        }
        
        .back-link a:hover {
            color: var(--accent);
        }
        
        @media (max-width: 480px) {
            body {
                padding: 1.5rem;
            }
            
            .admin-login {
                padding: 2rem 1.5rem;
            }
            
            .admin-header h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-login-container">
        <div class="admin-login">
            <div class="admin-header">
                <h2>Acceso Administrador</h2>
                <p>Panel de control de KizumaScore</p>
            </div>
            
            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
            
            <form method="POST" action="{{ route('admin.auth') }}">
                @csrf
                <div class="input-group">
                    <input type="text" name="username" placeholder="Usuario administrador" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Acceder</button>
            </form>
            
            <div class="back-link">
                <a href="{{ route('login') }}">← Volver al login de usuarios</a>
            </div>
        </div>
    </div>
</body>
</html>
