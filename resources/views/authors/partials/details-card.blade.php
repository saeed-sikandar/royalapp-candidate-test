<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Details') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    @php
        $birthday = new \Carbon\Carbon( $author->birthday);

    @endphp

    <div class="relative overflow-x-auto mt-4 flex">
        <ul class="w-56 mr-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">First Name: <span class="font-normal"> {{$author->first_name}} </span></li>
            <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">Last Name:  <span class="font-normal"> {{$author->last_name}} </span></li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Birthday:  <span class="font-normal"> {{$birthday->format('d M, Y')}} </span></li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Gender:  <span class="font-normal"> {{$author->gender}} </span></li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Place Of Birth:  <span class="font-normal"> {{$author->place_of_birth}} </span></li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Biography:  <span class="font-normal"> {{$author->biography}} </span></li>

        </ul
        <div class="max-w-2xl">
            @include('authors.partials.book-list')
        </div>
    </div>



</section>
