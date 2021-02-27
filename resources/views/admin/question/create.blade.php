<x-app-layout>
    <x-slot name="header">{{$quiz->title}} icin yeni sual yarat</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action=" {{route('questions.store', $quiz->id)}} " enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Sual</label>
                    <textarea name="question" rows="4" class="form-control">{{ old('question') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Sekil</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Cavab</label>
                            <textarea name="answer1" rows="2" class="form-control">{{ old('answer1') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Cavab</label>
                            <textarea name="answer2" rows="2" class="form-control">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Cavab</label>
                            <textarea name="answer3" rows="2" class="form-control">{{ old('answer3') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Cavab</label>
                            <textarea name="answer4" rows="2" class="form-control">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>DOgru Cavab</label>
                    <select name="correct_answer" class="form-control">
                        <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1. Cavab</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. Cavab</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. Cavab</option>
                        <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. Cavab</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Sual olustur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>