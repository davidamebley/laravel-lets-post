@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        <h1 class="text-2xl font-medium mb-4">Dashboard</h1>    
        <p>Hi
            @if (auth()->user())
                {{auth()->user()->name}}.
            @else
                visitor.
            @endif
            We we're still building your dashboard.  What exciting ideas 
            <br />do you have on what to see here? 
        
        <br /><br />
        <span class="mt-20"> Share with us in the <a class="text-blue-500" href="{{ route('posts') }}" >Post</a> section!</span>

        </p>
        </div>
    </div>
@endsection