@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        <h1 class="text-2xl font-medium mb-4">Home</h1>    
        <p>Hi
            @if (auth()->user())
                {{auth()->user()->name}}.
            @else
                visitor.
            @endif
            Did you know that there is something big coming up concerning our Home page?
        
        <br /><br />
        <span class="mt-20"> Visit the <a class="text-blue-500" href="{{ route('posts') }}" >Post</a> section and tell your friends how you feel.</span>

        </p>
        </div>
    </div>
@endsection