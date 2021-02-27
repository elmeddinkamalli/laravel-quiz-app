<x-app-layout>
    <x-slot name="header">{{$question->question}} duzenle</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action=" {{route('questions.update', [$question->quiz_id, $question->id])}} " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Sual</label>
                    <textarea name="question" rows="4" class="form-control">{{ $question->question }}</textarea>
                </div>
                <div class="form-group">
                    <label>Sekil</label>
                    @if($question->image)
                    <a href="{{asset($question->image)}}" target="_blank">
                        <img src="{{asset($question->image)}}" class="img-responsive" style="width:200px">
                    </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Cavab</label>
                            <textarea name="answer1" rows="2" class="form-control">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Cavab</label>
                            <textarea name="answer2" rows="2" class="form-control">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Cavab</label>
                            <textarea name="answer3" rows="2" class="form-control">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Cavab</label>
                            <textarea name="answer4" rows="2" class="form-control">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Dogru Cavab</label>
                    <select name="correct_answer" class="form-control">
                        <option @if($question->correct_answer==='answer1') selected @endif value="answer1">1. Cavab</option>
                        <option @if($question->correct_answer==='answer2') selected @endif value="answer2">2. Cavab</option>
                        <option @if($question->correct_answer==='answer3') selected @endif value="answer3">3. Cavab</option>
                        <option @if($question->correct_answer==='answer4') selected @endif value="answer4">4. Cavab</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Sual guncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>