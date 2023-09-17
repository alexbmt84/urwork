<div x-data="{ open: false }" @flash-message.window="open = true; setTimeout(() => open = false, 3000);" >

    <div x-show="open" x-cloak class="border-2 border-pink-500 text-pink-500 bg-pink-200 font-semibold px-1 py-2 rounded mb-3">
        Merci de vous connecter pour ajouter une offre à vos favoris.
    </div>

</div>
