<x-app-layout>
    <div class="sm:max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

          <form method="POST" action="{{ route('comments.store')}}">
            @csrf

            <textarea
                name="message"
                placeholder="O que você está pensando?"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring
                focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2"/>
            <x-primary-button class="mt-4">Comentar</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($comments as $comment)
            <div class="p-6 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                    <path d="M20 2H4C2.9 2 2 2.9 2 4v14c0 1.1.9 2 2 2h4l4 4 4-4h4c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 16h-4.59L12 20.59 8.59 18H4V4h16v14z"/>
                  </svg>

                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $comment->user->name}}</span>
                            <small class="ml-2 text-sm text-gray-600"> {{ $comment->created_at->format('d/m/Y H:i') }} </small>

                            @unless ($comment->created_at->eq($comment->updated_at))
                                <small class="text-sm text-gray-600"> &middot; {{ __('Editado')}} </small>
                            @endunless

                        </div>

                        @if ($comment->user->is(auth()->user()))
                            <div class="flex">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg width="24" height="8" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="4" cy="4" r="2" fill="black" />
                                                <circle cx="12" cy="4" r="2" fill="black" />
                                                <circle cx="20" cy="4" r="2" fill="black" />
                                              </svg>
                                        </button>
                                    </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('comments.edit', $comment)">
                                        {{ __('Alterar')}}
                                    </x-dropdown-link>
                                </x-slot>
                                </x-dropdown>
                            </div>
                        @endif


                    </div>
                    <p class="mt-4 text-lg text-gray-900"> {{ $comment->message}}</p>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</x-app-layout>
