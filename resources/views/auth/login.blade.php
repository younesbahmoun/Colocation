<x-master title="Login">
    <div class="container w-75 my-2 p-5">
        <h3>Authentification</h3>
        {{--@if(session('login'))--}}
        @error('login')
            <x-alert type=danger>
                {{ $message }}
            </x-alert>
        @enderror
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="mb-3">
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
            <div class="d-grid">
                <button class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</x-master>