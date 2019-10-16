<div class="media post">
        @include('shared._vote',[
           'model' => $answer
        ])
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
                                        
                                        <div class="col-4">
                                            <user-info :model="{{ $answer }}" label="Answered"></user-info>
                                        </div>

                                        
                                </div>
                                
                            </div>
</div>