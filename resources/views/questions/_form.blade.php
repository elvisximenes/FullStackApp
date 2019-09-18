@csrf
                        <div class="form-group">
                                <label for="question-title">Title</label>
                                <input type="text" name="title" value="{{ old('title', $question->title) }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">
                                @if ($errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group">
                                <label for="question-body">Body</label>
                                <textarea  name="body" id="question-body" rows="5"  class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">{{ old('body', $question->body) }}</textarea>
                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </div>
                                @endif
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">{{$button}} Question</label>
                        </div>