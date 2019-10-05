@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h2>{{$question->title}}</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to Question</a>
                            </div>
                        </div>                 
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="this question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class='votes-count'>123</span>
                            <a title="this question is useful" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Click to mark as favorite question (Click again to undo)" class="favorite favorited mt-2">
                                <i class="fas fa-star fa-2x"></i>
                            </a>
                            <span class='favorite-count'>1234</span>
                            </div>
                            <div class="media-body">
                                <p>{{ $question->body }}</p>
                                <div class='float-right'>
                                    <span class="text-muted">
                                        Created {{ $question->created_date}}
                                    </span>
                                    <div class="media mt-2">
                                        <a href="" class="pr-2">
                                            <img src="{{ $question->user->avatar}}">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
        @include ('answers._index', [
            'answers' => $question->answers,
            'answersCount' => $question->answers_count   
        ])

        @include('answers._create')
    </div>
        
</div>