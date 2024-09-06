<nav class="navbar shadow-md">
    <ul class="menu menu-horizontal">
        <li>
            <a @class([
                'font-bold' => request()->routeIs('home'),
            ]) href="{{ route('home') }}">Home</a>
        </li>

        @auth
            <li>
                <a @class([
                    'font-bold' => request()->routeIs('guitars.index'),
                ]) href="{{ route('guitars.index') }}">
                    Gitar
                </a>
            </li>
            <li>
                <a @class([
                    'font-bold' => request()->routeIs('tags.index'),
                ]) href="{{ route('tags.index') }}">
                    Tag
                </a>
            </li>
        @endauth
        <li>
            @guest
                <a @class([
                    'font-bold' => request()->routeIs('login'),
                ]) href="{{ route('login') }}">Login</a>
            @endguest

        </li>
    </ul>
</nav>
