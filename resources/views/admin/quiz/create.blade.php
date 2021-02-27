<x-app-layout>
    <x-slot name="header">Quiz Olustur</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action=" {{route('quizzes.store')}} ">
                @csrf
                <div class="form-group">
                    <label>Quiz Basligi</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label>Quiz Aciklama</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <input id="isFinished" type="checkbox" @if(old('finished_at')) checked @endif>
                    <label>Bitis tarihi olacak mi?</label>
                </div>
                <div id="finishedInput" @if(!old('finished_at')) style="display:none" @endif class="form-group">
                    <label>Bitis tarixi</label>
                    <input type="datetime-local" name="finished_at" class="form-control" value="{{ old('finished_at') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quiz olustur</button>
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