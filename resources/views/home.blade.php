@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.menu')
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Create post</div>
                <post-create-component :user_id="{{ Auth::user()->id }}"></post-create-component>
            </div>
            <div class="card">
                <div class="card-header">List posts</div>
                <post-list-component :user_id="{{ Auth::user()->id }}"></post-list-component>
            </div>
        </div>
    </div>
</div>
@endsection
