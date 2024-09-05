<nav>
    <ul class="flex bg-slate-100">
        <li>
            <a @class([
                'font-bold' => request()->routeIs('home'),
                'block px-4 py-2 hover:bg-slate-200',
            ]) href="{{ route('home') }}">Home</a>
        </li>

        @auth
            <li>
                <a @class([
                    'font-bold' => request()->routeIs('guitars.index'),
                    'block px-4 py-2 hover:bg-slate-200',
                ]) href="{{ route('guitars.index') }}">
                    Gitar
                </a>
            </li>
            <li>
                <a @class([
                    'font-bold' => request()->routeIs('tags.index'),
                    'block px-4 py-2 hover:bg-slate-200',
                ]) href="{{ route('tags.index') }}">
                    Tag
                </a>
            </li>
        @endauth
        <li>
            @guest
                <a @class([
                    'font-bold' => request()->routeIs('login'),
                    'block px-4 py-2 hover:bg-slate-200',
                ]) href="{{ route('login') }}">Login</a>
            @endguest

        </li>
    </ul>
</nav>
