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
    </div>
</x-app-layout>
