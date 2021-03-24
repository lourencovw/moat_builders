<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Album List') }}
        </h2>
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('albums.store') }}" class="flex items-center justify-around p-6 bg-gray-200 border-b border-t border-gray-200">
                    @csrf
                    <x-label for="artist" :value="__('Artist:')" />
                    <select name="artist" id="artist" class="block mt-1 w-full mx-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                        @foreach ($responseBody as $value)
                        <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>

                    <x-label for="album" :value="__('Album:')" />
                    <x-input id="album" class="block mt-1 w-full mx-2" type="album" name="album" :value="old('album')" equired autofocus />

                    <x-label for="year" :value="__('Year:')" />
                    <x-input id="year" class="block mt-1 w-full mx-2" type="year" name="year" :value="old('year')" quired autofocus />

                    <x-button style="font-size: 30px;">+</x-button>
                </form>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($albums as $album)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-around p-6 bg-white border-b border-t border-gray-200">
                    <div>Name: {{$album->album}}</div>
                    <div>Artist: {{$album->artist}}</div>
                    <div>Year: {{$album->year}}</div>

                    @if( Auth::user()->isAdmin())
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST">

                        @method('DELETE')
                        @csrf
                        <x-button style="font-size: 30px;">X</x-button>

                    </form>

                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>