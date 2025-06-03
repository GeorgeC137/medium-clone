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
                    <div class="w-[320px] border-l px-8 border-gray-900">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3 class="text-white mt-2">{{ $user->name }}</h3>
                        <p class="text-gray-300">8k followers</p>
                        <p class="text-gray-300">{{ $user->bio }}</p>
                        <div class="mt-4">
                            <button class="bg-emerald-700 px-4 py-2 text-white rounded-full">
                                Follow
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
