@props(['user', 'size' => 'w-12 h-12'])

<img class="{{ $size }} rounded-full" src="{{ $user->imageUrl() ? $user->imageUrl() : 'https://picsum.photos/200' }}" alt="{{$user->name}}" />