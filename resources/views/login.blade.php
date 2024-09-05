<x-layout title="login">
    <header class="col-span-full">
        <h1 class="text-center">Login min</h1>
    </header>

    <form action="{{ route('login.authenticate') }}" method="POST"
        class="outline outline-slate-200 p-4 rounded-lg col-start-3 col-end-5 flex flex-col gap-4">
        @csrf

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="bg-red-400 text-red-100 px-4 py-2">{{ $error }}</p>
            @endforeach
        @endif

        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="email@email.kamu"
            value="{{ old('email') }}" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password kamu" required>

        <button type="submit" class="block bg-blue-500 px-4 py-2 text-gray-100">
            Login
        </button>
    </form>
</x-layout>
