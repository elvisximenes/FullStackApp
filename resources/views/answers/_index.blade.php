@if($answersCount > 0)

    <div class="col-md-12" v-cloak>
            <div class="card">
                    <div class="card-body">
                        <div class="card-title"><h3> {{ $answersCount }} Answers</h3></div>
                        @include('layouts._messages')
                        @foreach( $answers as $answer)
                            @include('answers._answer')
                        @endforeach
                    </div>
            
            </div>
        </div>

@endif
