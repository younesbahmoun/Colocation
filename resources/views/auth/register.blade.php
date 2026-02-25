<x-master title="Register">
    <div class="container w-75 my-2 p-5">
        <h3>Authentification</h3>
        @error('login')
            <x-alert type=danger>
                {{ $message }}
            </x-alert>
        @enderror
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3">
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
                    @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
</x-master>