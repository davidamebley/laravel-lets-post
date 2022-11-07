@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <!-- Iterate through Posts and display them -->
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post=$post/>     <!-- Pass a prop to the {Post component} -->
                @endforeach

                <!-- Output pagination links -->
                {{ $posts->links() }}
            @else
                <p>{{ $user->name }} does not have any posts to show</p>
            @endif
        </div>
    </div>
@endsection