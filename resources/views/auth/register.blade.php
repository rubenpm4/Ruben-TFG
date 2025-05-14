<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | KizumaScore</title>
    <style>
        :root {
            --primary: #0f172a;
            --secondary: #1e293b;
            --accent: #facc15;
            --text: #f8fafc;
            --highlight: #3b82f6;
            --success: #22c55e;
            --error: #ef4444;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text);
        }

        .register-container {
            background-color: rgba(30, 41, 59, 0.95);
            padding: 3rem 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 480px;
            border: 1px solid var(--highlight);
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('https://images.unsplash.com/photo-1552667466-07770ae110d0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.07;
            z-index: -1;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--accent);
            font-size: 2.4rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        h1::after {
            content: "KizumaScore";
            display: block;
            font-size: 0.85rem;
            color: #cbd5e1;
            margin-top: 0.4rem;
            font-weight: normal;
            text-transform: none;
            letter-spacing: 2px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--highlight);
            border-radius: 8px;
            background-color: rgba(59, 130, 246, 0.15);
            color: var(--text);
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.3);
        }

        input.error {
            border-color: var(--error);
        }

        input.valid {
            border-color: var(--success);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .password-container, .username-container {
            position: relative;
        }

        .password-match, .username-status {
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: none;
        }

        .password-match.valid, .username-status.valid {
            color: var(--success);
            display: block;
        }

        .password-match.error, .username-status.error {
            color: var(--error);
            display: block;
        }

        button {
            background-color: var(--accent);
            color: var(--primary);
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #fde047;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(250, 204, 21, 0.4);
        }

        button:disabled {
            background-color: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #fde047;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 2rem 1.5rem;
                margin: 0 1rem;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Registro</h1>
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div class="username-container">
                <input type="text" name="name" id="username" placeholder="Nombre de usuario" required>
                <div id="username-status" class="username-status"></div>
                @error('name')
                    <div class="username-status error">{{ $message }}</div>
                @enderror
            </div>

            <input type="email" name="email" placeholder="Correo electrónico" required>

            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>

            <div class="password-container">
                <input type="password" name="password_confirmation" id="confirm_password" placeholder="Confirmar contraseña" required>
                <div id="password-match" class="password-match">¡Las contraseñas coinciden!</div>
            </div>

            <button type="submit" id="submitBtn" disabled>Registrarse</button>
        </form>
        <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
    </div>

    <script>
        const password = document.getElementById('password');
        const confirm_password = document.getElementById('confirm_password');
        const password_match = document.getElementById('password-match');
        const usernameInput = document.getElementById('username');
        const usernameStatus = document.getElementById('username-status');
        const submitBtn = document.getElementById('submitBtn');
        let usernameAvailable = false;

        function validatePassword() {
            const passwordsMatch = password.value === confirm_password.value && password.value !== '';

            if (password.value !== '' && confirm_password.value !== '') {
                if (passwordsMatch) {
                    password_match.classList.add('valid');
                    password_match.classList.remove('error');
                    password_match.textContent = '¡Las contraseñas coinciden!';
                } else {
                    password_match.classList.remove('valid');
                    password_match.classList.add('error');
                    password_match.textContent = 'Las contraseñas no coinciden';
                }
            } else {
                password_match.classList.remove('valid');
                password_match.classList.remove('error');
            }

            updateSubmitButton(); // ✅ Esto asegura que el botón se actualiza correctamente
        }

        function updateSubmitButton() {
            const passwordsMatch = password_match.classList.contains('valid');
            submitBtn.disabled = !(usernameAvailable && passwordsMatch);
        }

        usernameInput.addEventListener('input', function () {
            const username = this.value.trim();

            if (username.length < 3) {
                usernameStatus.textContent = 'El nombre de usuario debe tener al menos 3 caracteres';
                usernameStatus.classList.remove('valid');
                usernameStatus.classList.add('error');
                usernameAvailable = false;
                updateSubmitButton();
                return;
            }

            fetch(`/check-username?username=${encodeURIComponent(username)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.available) {
                        usernameStatus.textContent = 'Nombre de usuario disponible';
                        usernameStatus.classList.remove('error');
                        usernameStatus.classList.add('valid');
                        usernameAvailable = true;
                    } else {
                        usernameStatus.textContent = 'Este nombre de usuario ya está en uso';
                        usernameStatus.classList.remove('valid');
                        usernameStatus.classList.add('error');
                        usernameAvailable = false;
                    }
                    updateSubmitButton();
                })
                .catch(error => {
                    console.error('Error:', error);
                    usernameAvailable = false;
                    updateSubmitButton();
                });
        });

        password.addEventListener('input', validatePassword);
        confirm_password.addEventListener('input', validatePassword);

        document.getElementById('registerForm').addEventListener('submit', function (e) {
            if (!usernameAvailable) {
                e.preventDefault();
                usernameStatus.textContent = 'Por favor, elige un nombre de usuario disponible';
                usernameStatus.classList.remove('valid');
                usernameStatus.classList.add('error');
            }
        });
    </script>
</body>
</html>
