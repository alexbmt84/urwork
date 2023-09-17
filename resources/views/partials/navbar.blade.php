<div class="flex flex-col md:flex-row justify-between items-center py-5">
    <div class="w-48 h-48 flex flex-col md:flex-row justify-between items-center">
        <a href="{{ route('jobs.index') }}" class=""><img src="{{ asset('img/logo.png') }}"></a>
    </div>
    <ul class="flex flex-col md:flex-row items-center mb-3 md:mb-0">
        @auth
            <livewire:search />
            <li class="md:mr-5 py-2 md:py-0 font-semibold"><a href="{{ route('jobs.index') }}" class="hover:text-green-400">Les missions</a></li>
            <li class="md:mr-5 py-2 md:py-0 font-semibold"><a href="{{ route('conversation.index') }}" class="hover:text-green-400">Mes conversations</a></li>
            <li class="md:mr-5 py-2 md:py-0 font-semibold"><a href="{{ route('home') }}" class="hover:text-green-400">Tableau de bord</a></li>
            <li class="md:mr-5 py-2 md:py-0 font-semibold"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="hover:text-green-400 ">Se déconnecter</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <li class="md:mr-5 py-2 md:py-0 font-semibold"><a href="{{ route('login') }}" class="hover:text-green-400">Se connecter</a></li>
            <li class="md:mr-5 py-2 md:py-0 font-semibold"><a href="{{ route('register') }}" class="hover:text-green-400">S'enregistrer</a></li>
        @endauth
    </ul>
</div>
