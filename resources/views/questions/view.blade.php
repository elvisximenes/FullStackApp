@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{$question->title}}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to Question</a>
                        </div>
                    </div>                 
                    

                </div>
                <div class="card-body">
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

            <div class="card">
                <div class="card-body">
                    <div class="card-title"><h3> {{ $question->answers_count }}</h3></div>
                    <hr>
                    @foreach( $question->answers as $answer)
                    <div class="media">
                        <div class="media-body">
                            {{ $answer->body }}
                            <div class='float-right'>
                                <span class="text-muted">
                                    Answered {{ $answer->created_date}}
                                </span>
                                <div class="media mt-2">
                                    <a href="" class="pr-2">
                                        <img src="{{ $answer->user->avatar}}">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>