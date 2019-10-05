<div class="row mt-4">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                        <div class="card-title"><h3> {{ $answersCount }} Answers</h3></div>
                        @include('layouts._messages')
                        @foreach( $answers as $answer)
                        <hr>
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a title="this answer is useful" class="vote-up"><i class="fas fa-caret-up fa-2x"></i></a>
                                <span class='votes-count'>123</span>
                                <a title="this quesanswertion is useful" class="vote-down off"><i class="fas fa-caret-down fa-2x"></i></a>
                                <a title="Mark this as best answer" class=" {{$answer->status}} mt-3"><i class="fas fa-check fa-lg"></i></a>
                                <span class='favorite-count'>1234</span>
                            </div>
                            <div class="media-body">
                                {{ $answer->body }}
                                <div class="row">
                                        <div class="col-4">
                                            <div class="ml-auto">
                                                @can ('update',$answer)
                                                    <a  class="btn btn-sm btn-outline-info" href="{{ route('questions.answers.edit', [$question->id,$answer->id]) }}">Edit</a>
                                                @endcan
                                                @can ('delete',$answer)
                                                    <form class="form-delete" method="post" action="{{ route('questions.answers.destroy',[$question->id,$answer->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class='col-4'>
                                            <span class="text-muted">Answered {{ $answer->created_date}}</span>
                                            <div class="media mt-3">
                                                <a href="" class="pr-2"><img src="{{ $answer->user->avatar}}"></a>
                                                <div class="media-body mt-1">
                                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                                </div>
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