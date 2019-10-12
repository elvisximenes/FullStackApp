                            @can('accept', $model)
                                <a title="Mark this as best answer" 
                                    class=" {{$model->status}} mt-3"
                                    onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"
                                    >
                                    
                                    <i class="fas fa-check fa-lg"></i>
                                </a>
                                <form style="display:none;" id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="POST">
                                        @csrf
                                </form>
                            @else
                                @if($answer->is_best)
                                <a title="The owner have accepted this as best answer" 
                                    class=" {{$model->status}} mt-3">
                                    <i class="fas fa-check fa-lg"></i>
                                </a>
                                @endif
                            @endcan