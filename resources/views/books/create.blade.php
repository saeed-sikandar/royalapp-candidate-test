<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-2 sm:p-8 h-screen bg-white shadow sm:rounded-lg">
                @if ($errors->any())


                <div class="max-w-2xl">
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Danger</span>
                        <div>
                          <span class="font-medium">Ensure that these requirements are met:</span>
                            <ul class="mt-1.5 ml-4 list-disc list-inside">
                                @foreach ($errors->all() as $error )
                                    <li>{{ $error}}</li>

                                @endforeach
                          </ul>
                        </div>
                      </div>
                </div>
                @endif
                <div class="max-w-5xl">
                    <div class="p-4 max-h-5xl mt-4 bg-white rounded shadow">
                        <form method="POST" action="{{route('books.store')}}">
                            @csrf
                          <div class="mb-6">
                            <label for="title" class="block text-gray-800 font-bold">Title:</label>
                            <input type="text" name="title" id="title" placeholder="Book Title" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                          </div>
                          <div class="mb-6">
                            <label for="release_date" class="block text-gray-800 font-bold">Release Date:</label>
                            <input type="date" name="release_date" id="release_date" placeholder="Book Release Date" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                          </div>
                          <div class="mb-6">
                            <label for="isbn" class="block text-gray-800 font-bold">ISBN:</label>
                            <input type="text" name="isbn" id="isbn" placeholder="Book ISBN" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                          </div>
                          <div class="mb-6">
                            <label for="pages" class="block text-gray-800 font-bold">Pages:</label>
                            <input type="number" name="number_of_pages" id="number_of_pages" placeholder="Book Total Pages" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                          </div>
                          <div class="mb-6">
                            <label for="format" class="block text-gray-800 font-bold">Format:</label>
                            <input type="text" name="format" id="format" placeholder="Book Format" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                          </div>
                          <div class="mb-6">
                            <label for="authors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                            <select name="author" id="authors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a author</option>
                                @foreach ($authors->items as $author)
                                    <option value="{{$author->id}}">{{ $author->first_name . ' '. $author->last_name}}</option>

                                @endforeach
                            </select>
                         </div>
                          <div class="mb-6">
                            <label for="Description" class="block text-gray-800 font-bold">Description:</label>
                            <textarea name="description" id="" cols="80" rows="5"></textarea>
                         </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Book</button>
                          </div>
                        </form>
                      </div>
                </div>
            </div>


        </div>
    </div>


</x-app-layout>
