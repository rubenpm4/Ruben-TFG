@extends('layouts.app')

@section('content')
<div class="edit-profile-container">
    <div class="edit-profile-header">
        <h1 class="edit-profile-title">Editar Perfil</h1>
        <p class="edit-profile-subtitle">Personaliza tu información en KizumaScore</p>
    </div>

    @if(session('success'))
    <div class="alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data" class="edit-profile-form">
        @csrf

        <div class="form-section">
            <h2 class="section-title">Información Básica</h2>
            
            <div class="form-group">
                <label class="form-label">Biografía</label>
                <textarea name="bio" rows="4" class="form-textarea" placeholder="Cuéntanos sobre tu pasión por el fútbol...">{{ old('bio', $usuario->bio) }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">Foto de Perfil</h2>
            
            <div class="avatar-upload">
                <div class="avatar-preview">
                    @if($usuario->foto_perfil)
                        <img src="{{ asset('storage/' . $usuario->foto_perfil) }}" alt="Foto de perfil actual" class="current-avatar">
                    @else
                        <div class="default-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <div class="upload-controls">
                    <label class="file-upload-btn">
                        <input type="file" name="foto_perfil" accept="image/*" class="file-input">
                        <span>Seleccionar imagen</span>
                    </label>
                    <p class="file-hint">Formatos: JPG, PNG. Máx. 2MB</p>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">Preferencias de Fútbol</h2>
            
            <div class="form-group">
                <label class="form-label">Equipo Favorito</label>
                <select name="equipo_favorito" class="form-select">
                    <option value="">Selecciona tu equipo</option>
                    
                    <!-- Primera División 2024/25 -->
                    <option value="Alavés" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Alavés' ? 'selected' : '' }}>Deportivo Alavés</option>
                    <option value="Athletic" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Athletic' ? 'selected' : '' }}>Athletic Club</option>
                    <option value="Atlético" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Atlético' ? 'selected' : '' }}>Atlético de Madrid</option>
                    <option value="Barcelona" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Barcelona' ? 'selected' : '' }}>FC Barcelona</option>
                    <option value="Betis" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Betis' ? 'selected' : '' }}>Real Betis</option>
                    <option value="Celta" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Celta' ? 'selected' : '' }}>RC Celta</option>
                    <option value="Getafe" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Getafe' ? 'selected' : '' }}>Getafe CF</option>
                    <option value="Girona" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Girona' ? 'selected' : '' }}>Girona FC</option>
                    <option value="Las Palmas" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Las Palmas' ? 'selected' : '' }}>UD Las Palmas</option>
                    <option value="Leganés" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Leganés' ? 'selected' : '' }}>CD Leganés</option>
                    <option value="Mallorca" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Mallorca' ? 'selected' : '' }}>RCD Mallorca</option>
                    <option value="Osasuna" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Osasuna' ? 'selected' : '' }}>CA Osasuna</option>
                    <option value="Rayo Vallecano" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Rayo Vallecano' ? 'selected' : '' }}>Rayo Vallecano</option>
                    <option value="Real Madrid" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Real Madrid' ? 'selected' : '' }}>Real Madrid</option>
                    <option value="Real Sociedad" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Real Sociedad' ? 'selected' : '' }}>Real Sociedad</option>
                    <option value="Sevilla" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Sevilla' ? 'selected' : '' }}>Sevilla FC</option>
                    <option value="Valencia" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Valencia' ? 'selected' : '' }}>Valencia CF</option>
                    <option value="Valladolid" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Valladolid' ? 'selected' : '' }}>Real Valladolid</option>
                    <option value="Villarreal" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Villarreal' ? 'selected' : '' }}>Villarreal CF</option>
                    <option value="Espanyol" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Espanyol' ? 'selected' : '' }}>RCD Espanyol</option>

                    <!-- Segunda División 2024/25 -->
                    <option value="Albacete" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Albacete' ? 'selected' : '' }}>Albacete</option>
                    <option value="Sporting" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Sporting' ? 'selected' : '' }}>Sporting de Gijón</option>
                    <option value="Castellón" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Castellón' ? 'selected' : '' }}>CD Castellón</option>
                    <option value="Almería" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Almería' ? 'selected' : '' }}>UD Almería</option>
                    <option value="Deportivo" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Deportivo' ? 'selected' : '' }}>RC Deportivo</option>
                    <option value="Burgos" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Burgos' ? 'selected' : '' }}>Burgos CF</option>
                    <option value="Cartagena" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Cartagena' ? 'selected' : '' }}>FC Cartagena</option>
                    <option value="Eibar" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Eibar' ? 'selected' : '' }}>SD Eibar</option>
                    <option value="Eldense" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Eldense' ? 'selected' : '' }}>CD Eldense</option>
                    <option value="Elche" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Elche' ? 'selected' : '' }}>Elche CF</option>
                    <option value="Ferrol" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Ferrol' ? 'selected' : '' }}>Racing Ferrol</option>
                    <option value="Granada" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Granada' ? 'selected' : '' }}>Granada CF</option>
                    <option value="Huesca" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Huesca' ? 'selected' : '' }}>SD Huesca</option>
                    <option value="Levante" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Levante' ? 'selected' : '' }}>Levante UD</option>
                    <option value="Mirandés" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Mirandés' ? 'selected' : '' }}>CD Mirandés</option>
                    <option value="Oviedo" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Oviedo' ? 'selected' : '' }}>Real Oviedo</option>
                    <option value="Racing" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Racing' ? 'selected' : '' }}>Racing de Santander</option>
                    <option value="Tenerife" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Tenerife' ? 'selected' : '' }}>CD Tenerife</option>
                    <option value="Córdoba" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Córdoba' ? 'selected' : '' }}>Córdoba CF</option>
                    <option value="Zaragoza" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Zaragoza' ? 'selected' : '' }}>Real Zaragoza</option>
                    <option value="Cádiz" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Cádiz' ? 'selected' : '' }}>Cádiz CF</option>
                    <option value="Málaga" {{ old('equipo_favorito', $usuario->equipo_favorito) == 'Málaga' ? 'selected' : '' }}>Málaga</option>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="save-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                </svg>
                Guardar Cambios
            </button>
        </div>
    </form>
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

    .edit-profile-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
        color: var(--text);
    }

    .edit-profile-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .edit-profile-title {
        font-size: 2.2rem;
        color: var(--accent);
        margin-bottom: 0.5rem;
    }

    .edit-profile-subtitle {
        font-size: 1rem;
        opacity: 0.8;
        margin-top: 0;
    }

    .alert-success {
        background-color: rgba(75, 181, 67, 0.2);
        border-left: 4px solid var(--success);
        padding: 1rem;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin-bottom: 2rem;
    }

    .alert-success svg {
        width: 20px;
        height: 20px;
        fill: var(--success);
    }

    .edit-profile-form {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .form-section {
        margin-bottom: 2.5rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid var(--highlight);
    }

    .form-section:last-child {
        border-bottom: none;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 1.3rem;
        color: var(--accent);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title::before {
        content: "";
        display: block;
        width: 8px;
        height: 8px;
        background-color: var(--accent);
        border-radius: 50%;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .form-textarea {
        width: 90%;
        padding: 1rem;
        background-color: var(--input-bg);
        border: 1px solid var(--highlight);
        border-radius: 6px;
        color: var(--text);
        font-family: inherit;
        resize: vertical;
        min-height: 120px;
        transition: all 0.3s ease;
    }

    .form-textarea:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
    }

    .avatar-upload {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        align-items: center;
    }

    .avatar-preview {
        position: relative;
    }

    .current-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--accent);
    }

    .default-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: var(--input-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px dashed var(--highlight);
    }

    .default-avatar svg {
        width: 50px;
        height: 50px;
        opacity: 0.5;
    }

    .upload-controls {
        flex: 1;
        min-width: 200px;
    }

    .file-upload-btn {
        display: inline-block;
        background-color: var(--accent);
        color: var(--primary);
        padding: 0.8rem 1.5rem;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 0.5rem;
    }

    .file-upload-btn:hover {
        background-color: #e6c200;
        transform: translateY(-2px);
    }

    .file-input {
        display: none;
    }

    .file-hint {
        font-size: 0.85rem;
        opacity: 0.7;
        margin-top: 0;
    }

    .form-select {
        width: 100%;
        padding: 0.8rem 1rem;
        background-color: var(--input-bg);
        border: 1px solid var(--highlight);
        border-radius: 6px;
        color: var(--text);
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
    }

    .position-options {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 1rem;
    }

    .position-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        background-color: var(--input-bg);
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .position-option:hover {
        border-color: var(--accent);
    }

    .position-option input {
        display: none;
    }

    .position-option input:checked + .position-icon {
        transform: scale(1.2);
        text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
    }

    .position-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .position-name {
        font-size: 0.9rem;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 2rem;
    }

    .save-btn {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        background-color: var(--accent);
        color: var(--primary);
        border: none;
        padding: 1rem 2rem;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .save-btn svg {
        width: 20px;
        height: 20px;
        fill: var(--primary);
    }

    .save-btn:hover {
        background-color: #e6c200;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
    }

    @media (max-width: 600px) {
        .avatar-upload {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .position-options {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .form-actions {
            justify-content: center;
        }
    }
</style>

<script>
    // Preview de la imagen seleccionada
    document.querySelector('.file-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const preview = document.querySelector('.current-avatar') || document.querySelector('.default-avatar');
                if (preview) {
                    if (preview.classList.contains('default-avatar')) {
                        preview.innerHTML = `<img src="${event.target.result}" class="current-avatar" alt="Preview">`;
                    } else {
                        preview.src = event.target.result;
                    }
                }
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
