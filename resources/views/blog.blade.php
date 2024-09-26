<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-5xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/blogs" class="font-medium text-sm text-blue-600 hover:underline">&laquo; BACK</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="/blogs?author={{ $blog->author->username}}" rel="author" class="hover:underline text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author->name}}</a>
                                
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">
                                    <span class="bg-{{ $blog->category->color }}-200 text-primary-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        <a href="/blogs?category={{ $blog->category->slug}}" class="text-base text-gray-500 hover:underline">{{ $blog->category->name}}
                                        </a>
                                    </span>
                                    , 
                                    {{ $blog->created_at->diffForHumans() }}
                                </p>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $blog->created_at->format('j F Y') }}</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $blog['title'] }}</h1>
                </header>
                <p>{{ $blog['body'] }}</p>
            </article>
        </div>
    </main>
  
</x-layout>
