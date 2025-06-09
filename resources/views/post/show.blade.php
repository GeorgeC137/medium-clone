<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="mb-4 text-2xl text-white">{{ $post->title }}</h1>
                <!-- User Avatar Section -->
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />
                    <div>
                        <div x-data="followData(
                            '{{ $post->user->username }}',
                            {{ $post->user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                            {{ $post->user->followers()->count() }},
                            '{{ route('follow', $post->user->username) }}'
                        )" class="flex gap-2">
                            <a class="text-white hover:underline"
                                href="{{ route('profile.show', $post->user) }}">{{ $post->user->name }}</a>
                            &middot;
                            @if (auth()->check() && auth()->user()->id !== $post->user->id)
                                <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'"
                                    :class="following ? 'text-red-600' : 'text-emerald-500'"></button>
                            @endif
                        </div>
                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>
                <!-- Clap Section -->
                <x-clap-button />
                <!-- Content Section -->
                <div class="mt-8">
                    <img src="{{ $post->image ? $post->imageUrl() : 'https://flowbite.com/docs/images/blog/image-1.jpg' }}"
                        alt="{{ $post->title }}">
                    <div class="mt-4 text-white">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="mt-8">
                    <span class="px-4 py-2 rounded-xl bg-gray-200">
                        {{ $post->category->name }}
                    </span>
                </div>

                <x-clap-button />
            </div>
        </div>
    </div>
</x-app-layout>
