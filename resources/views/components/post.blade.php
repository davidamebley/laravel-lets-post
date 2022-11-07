@props(['post' => $post])   <!-- Define our props (the vals we want to retrieve from the parent component) -->

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> 
    <span class="text-gray-500 text-sm">
        &bull;
         <a href="{{ route('posts.show', $post) }}">    <!-- Click this link to view a single post in a separate view -->
            {{ $post->created_at->diffForHumans() }}
        </a>
    </span>

    <p class="mb-2">{{ $post->body }}</p>

    <!-- Prevent unauth users from accessing -->
    <!-- @auth -->
    <!-- Delete a Post -->
    @can('delete', $post)   <!-- Delete by Cheking our created Policy first -->
        <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
            @csrf
            <!-- Use method spoofing here -->
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan
    <!-- @endauth -->

    <div class="flex items-center">
        <!-- Prevent unauth users from accessing -->
        @auth
            <!-- Check if post has been liked by user or not -->
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    <!-- Use method spoofing here -->
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth
        <!-- Add the Likes counter -->
        <span>{{ $post->likes->count() }}  {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>

</div>