<div class="bg-white flex border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mb-8">
    <div class="p-5 flex-1">
        <a href="{{ route('post.show', ['username' => $post->user->username, 'post' => $post]) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
        </a>
        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ Str::words($post->content, 20) }}
        </div>

        <a href="{{ route('post.show', ['username' => $post->user->username, 'post' => $post]) }}" class="text-sm text-white flex gap-4">
            {{ $post->getCreatedAtDate() }}
            <span class="inline-flex gap-1 items-center">
                <x-like-button :fill="auth()->user()->hasClapped($post) ? 'currentColor' : 'none'" class="size-5" />
                {{ $post->claps_count ? $post->claps_count : 0 }}
            </span>
        </a>

    </div>
    <a href="{{ route('post.show', ['username' => $post->user->username, 'post' => $post]) }}">
        <img class="rounded-r-lg w-48 h-full max-h-64 object-cover" src="{{ $post->imageUrl() ? $post->imageUrl() : 'https://flowbite.com/docs/images/blog/image-1.jpg' }}"
            alt="" />
    </a>
</div>
