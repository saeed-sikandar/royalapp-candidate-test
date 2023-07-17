<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Author | ' .$author->first_name . ' ' . $author->last_name) }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-8xl">
                    @include('authors.partials.details-card')
                </div>
                <form method="POST" action="{{route('authors.destroy',[$author->id])}}">
                    @method('DELETE')
                    @csrf
                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete Author</button>
                </form>
            </div>


        </div>
    </div>


</x-app-layout>
