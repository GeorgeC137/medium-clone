@props(['user'])

<div {{ $attributes }} x-data="{
    following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    followersCount: {{ $user->followers()->count() }},
    follow() {
        this.following = !this.following
        axios.post('{{ route('follow', $user->username) }}')
            .then(res => {
                console.log(res.data);
                this.followersCount = res.data.followersCount;
            })
            .catch((error) => {
                console.log(error);
            })
    }
}" class="w-[320px] border-l px-8 border-gray-900">{{ $slot }}</div>
