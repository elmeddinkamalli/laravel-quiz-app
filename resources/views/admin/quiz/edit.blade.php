<x-app-layout>
    <x-slot name="header">Quiz Guncelle</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action=" {{route('quizzes.update', $quiz->id)}} ">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Quiz Basligi</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>
                <div class="form-group">
                    <label>Quiz Aciklama</label>
                    <textarea name="description" rows="4" class="form-control">{{ $quiz->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Quiz durumu</label>
                    <select name="status" class="form-control">
                        <option @if($quiz->questions_count<4) disabled @endif @if($quiz->status==='publish') selected @endif value="publish">Aktiv</option>
                        <option @if($quiz->status==='passive') selected @endif value="passive">Pasif</option>
                        <option @if($quiz->status==='draft') selected @endif value="draft">Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <input id="isFinished" type="checkbox" @if($quiz->finished_at) checked @endif>
                    <label>Bitis tarihi olacak mi?</label>
                </div>
                <div id="finishedInput" @if(!$quiz->finished_at) style="display:none" @endif class="form-group">
                    <label>Bitis tarixi</label>
                    <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz Guncelle</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>