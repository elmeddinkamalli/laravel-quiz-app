<x-app-layout>
    <x-slot name="header">{{$quiz->title}} quizine aid suallar.</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{route('questions.create', $quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Sual Yarat</a>
                <h5 class="card-title">
                    <a href="{{route('quizzes.index', $quiz->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Quizlere Qayit</a>
                </h5>
            </h5>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                    <th scope="col">Sual</th>
                    <th scope="col">Sekil</th>
                    <th scope="col">1. Cavab</th>
                    <th scope="col">2. Cavab</th>
                    <th scope="col">3. Cavab</th>
                    <th scope="col">4. Cavab</th>
                    <th scope="col">Dogru Cavab</th>
                    <th scope="col" style="width:100px">Islemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>
                        @if($question->image)
                            <a href="{{ asset($question->image) }}" target="_blank" class="btn btn-sm btn-light">Sekle bax</a>
                        @endif
                        </td>
                        <td>{{ $question->answer1 }}</td>
                        <td>{{ $question->answer2 }}</td>
                        <td>{{ $question->answer3 }}</td>
                        <td>{{ $question->answer4 }}</td>
                        <td class="text-success">{{ substr($question->correct_answer, -1) }}. Cavab</td>
                        <td>
                            <a href="{{route('questions.edit', [$quiz->id, $question->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('questions.destroy', [$quiz->id, $question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>