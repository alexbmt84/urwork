@extends('layouts.app')

@section('content')

    <h1 class="text-3xl text-green-500 text-center font-semibold mb-10">Bienvenue <span class="text-pink-500 font-semibold">{{ auth()->user()->name }}</span> !</h1>

    <div class="flex flex-col md:flex-row mt-5 mb-5">

        <section class="text-gray-700 w-full mr-5 text-center px-4 py-4 shadow-sm hover:shadow-md border-2 rounded border-gray-300">

            <h2 class="text-xl my-2 text-gray-700 font-bold">
                <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg> Vos propositions ({{ auth()->user()->proposals->count() }})
            </h2>

            @foreach(auth()->user()->proposals as $proposal)

                <hr class="mt-10">

                @if($proposal->validated)

                    <div class="flex flex-col">

                        <a href="{{ route('jobs.show', $proposal->job->id) }}" class="text-green-600 font-bold text-xl mt-5">{{ $proposal->job->title }}</a>

                        <span class="mt-5 text-gray-800 font-bold">Votre message : <span class="font-medium text-gray-800">{{ $proposal->coverLetter->content }}</span></span>

                    </div>

                    <p class="mt-5 text-green-600">Félicitations ! <span class="text-pink-500 font-semibold">{{ $proposal->job->user->name }}</span> à validé votre candidature !</p>

                @else

                    <div class="flex flex-col">

                        <a href="{{ route('jobs.show', $proposal->job->id) }}" class="text-gray-800 font-bold text-xl mt-5">{{ $proposal->job->title }}</a>

                        <span class="mt-5 text-gray-800 font-bold">Votre message : <span class="font-medium text-gray-800">{{ $proposal->coverLetter->content }}</span></span>

                    </div>

                    <p class="mt-3"><span class="text-pink-500 font-semibold">{{ $proposal->job->user->name }}</span> n'a pas validé votre candidature pour le moment.</p>

                @endif

            @endforeach

        </section>

        <section class="text-gray-700 w-full mr-5 text-center px-4 py-4 shadow-sm hover:shadow-md border-2 rounded border-gray-300">

            <h2 class="text-xl my-2 text-gray-700 font-bold">
                <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg> Vos missions favorites ({{ auth()->user()->likes()->count() }})
            </h2>

            @foreach(auth()->user()->likes as $like)

                <hr class="mt-10">

                <div class="mb-3">
                    <a href="{{ route('jobs.show', $like->id) }}" class="block mt-5 text-green-600 font-bold text-xl">
                        {{ $like->title }}
                    </a>
                </div>

            @endforeach

        </section>

        <section class="text-gray-700 w-full mr-5 text-center px-4 py-4 shadow-sm hover:shadow-md border-2 rounded border-gray-300">

            <h2 class="text-xl my-2 text-gray-700 font-bold">
                <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                Vos missions ({{ auth()->user()->jobs()->count() }})
            </h2>

            @foreach(auth()->user()->jobs as $job)

                <hr class="mt-10">

                <div class="mb-3 mt-5">

                    <a href="{{ route('jobs.show', $job->id) }}" class="block text-green-600 font-bold text-xl">
                        {{ $job->title }} ({{ $job->proposals->count() }} @choice('proposition|propositions', $job->proposals)) :
                    </a>

                    <ul class="list-none ml-4">

                        @foreach($job->proposals as $proposal)

                            <li class="mt-2">• "{{ $proposal->coverLetter->content }}" par
                                <strong class="text-pink-500">
                                    {{ $proposal->user->name }}
                                </strong>
                            </li>

                            @if ($proposal->validated)

                                <span class="bg-white border border-green-500 text-xs p-1 mt-8 inline-block text-green-500 rounded">Déjà validé</span>

                            @else

                                <a href="{{ route('confirm.proposal', [$proposal->id])}}" class="bg-green-500 text-xs py-2 px-2 mt-8 mb-3 inline-block text-white hover:bg-green-200 hover:text-green-500 duration-200 transition rounded">Valider la proposition</a>

                            @endif

                        @endforeach

                    </ul>

                </div>

            @endforeach

        </section>

    </div>

@endsection
