@extends('layouts.app')

@section('content')

    <a href="{{ route('jobs.show', $job->id) }}">
        <h1 class="text-3xl text-green-500 mb-3 font-semibold">{{ $job-> title }}</h1>
    </a>

    <div class="px-4 py-4 mb-3 shadow-sm hover:shadow-md border-2 rounded border-gray-300">

        <p class="text-base font-semibold text-gray-700 mt-2">{{ $job->description }}</p>

        <span class="text-sm text-pink-400 font-bold">{{ number_format($job->price / 100, 2, ',', ' ') }} €</span>

    </div>

    <section x-data="{open: false}">

        <a href="#" class="text-green-500" @click="open = !open">
            Cliquez ici pour soumettre une candidature
        </a>

        <form x-show="open" x-cloak method="POST" action="{{ route('proposals.store', $job) }}">

            @csrf

            <textarea class="p-3 font-thin w-full max-w-md mt-3" name="content"></textarea>
            <button type="submit" class="block bg-green-700 text-white px-3 py-2 mt-3">Soumettre ma lettre de motivation</button>

        </form>

    </section>

@endsection
