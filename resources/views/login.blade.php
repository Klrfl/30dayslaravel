<x-layout title="login">
    <header class="col-span-full">
        <h1 class="text-center">Login min</h1>
    </header>

    <form action="{{ route('login.authenticate') }}" method="POST"
        class="col-start-3 col-end-5 shadow-md p-4 rounded-lg form-control gap-4 bg-slate-800/50">
        @csrf

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="bg-red-400 text-red-100 px-4 py-2">{{ $error }}</p>
            @endforeach
        @endif

        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="input input-bordered" placeholder="email@email.kamu"
            value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="input input-bordered" placeholder="password kamu"
            required>

        <button type="submit" class="btn btn-primary">
            Login
        </button>
    </form>
</x-layout>
