@guest
    <a href="{{ route('register') }}">S'inscrire</a>
    <a href="{{ route('login') }}">Se connecter</a>

@endguest

@auth
    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.articles.index') }}">Liste des Articles</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>
    @else
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>
    @endif
@endauth