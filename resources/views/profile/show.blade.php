<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl text-white">
                            {{ $user->name }}
                        </h1>
                        <div class="mt-8">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post" />
                            @empty
                                <div class="text-center py-16">
                                    <p class="text-gray-300 font-medium">No posts available.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <x-follow-container :user="$user">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3 class="text-white mt-2">{{ $user->name }}</h3>
                        <p class="text-gray-300"><span x-text="followersCount"></span> followers</p>
                        <p class="text-gray-300">{{ $user->bio }}</p>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button @click="follow()" x-text="following ? 'Unfollow' : 'Follow'" class="px-4 py-2 text-white rounded-full" :class="following ? 'bg-red-600' : 'bg-emerald-700'">
                                </button>
                            </div>
                        @endif
                    </x-follow-container>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
