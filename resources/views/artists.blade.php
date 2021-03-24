<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artist List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($data as $artist)
                <div class="flex justify-around p-6 bg-white border-b border-t border-gray-200">
                    <div>Name: {{$artist[0]["name"]}}</div>
                    <div>Twitter: {{$artist[0]["twitter"]}}</div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>