@props(['post'])

@auth
    <div x-data="{
        count: {{ $post->claps()->count() }},
        hasClappeed: {{ auth()->user()->hasClapped($post) ? 'true' : 'false' }},
        clap() {
            axios.post('{{ route('clap', $post) }}')
                .then((res) => {
                    this.hasClappeed = !this.hasClappeed;
                    this.count = res.data.clapsCount;
                })
                .catch((err) => {
                    console.log(err)
                })
        }
    }" class="mt-8 border-t p-4 border-gray-900 border-b">
        <button @click="clap()" class="text-gray-200 flex gap-2">
            <template x-if="hasClappeed">
                <x-like-button fill="currentColor" />
            </template>

            <template x-if="!hasClappeed">
                <x-like-button fill="none" />
            </template>


            <span x-text="count"></span>
        </button>
    </div>
@endauth
