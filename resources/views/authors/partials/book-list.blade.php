<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Title
            </th>
            <th scope="col" class="px-6 py-3">
                Release Date
            </th>

            <th scope="col" class="px-6 py-3">
                ISBN
            </th>
            <th scope="col" class="px-6 py-3">
                Format
            </th>

            <th scope="col" class="px-6 py-3">No of Pages</th>
            <th scope="col" class="px-6 py-3">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
                @foreach ($author->books as $book )

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    </th> --}}
                    <td class="px-6 py-4">
                        {{$book->title}}
                    </td>
                    @php
                        $release_date = new \Carbon\Carbon( $book->release_date);

                    @endphp
                    <td class="px-6 py-4">
                        {{$release_date->format('d M, Y')}}
                    </td>

                    <td class="px-6 py-4">
                        {{$book->isbn}}
                    </td>

                    <td class="px-6 py-4">
                        {!! $book->format !!}
                    </td>
                    <td class="px-6 py-4">
                        {{$book->number_of_pages }}
                    </td>
                    <td class="px-6 py-4">
                        {{-- <a href="{{route('books.destroy', [$book->id])}}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</a> --}}
                        <form method="POST" action="{{route('books.destroy',[$book->id])}}">
                            @method('DELETE')
                            @csrf
                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                     Delete
                                </span>
                             </button>

                        </form>
                    </td>
                </tr>
                @endforeach

    </tbody>
</table>
