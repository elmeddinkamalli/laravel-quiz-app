<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tutdugum yer
                            <span class="badge badge-success badge-pill">#{{$quiz->my_rank}}</span>
                        </li>
                        @endif
                        @if($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Topladigin xal
                            <span class="badge badge-primary badge-pill">{{$quiz->my_result->point}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dogru / Yanlis sayisi
                            <div class="float-right">
                                <span class="badge badge-success badge-pill">{{$quiz->my_result->correct}} Dogru</span>
                                <span class="badge badge-danger badge-pill">{{$quiz->my_result->wrong}} Yanlis</span>
                            </div>
                        </li>
                        @endif
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son isrirak tarixi
                            <span title="{{$quiz->finished_at}}" class="badge badge-secondary badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sual sayisi
                            <span class="badge badge-secondary badge-pill">{{$quiz->questions_count}}</span>
                        </li>
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Istirakci sayisi
                            <span class="badge badge-warning badge-pill">{{$quiz->details['join_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama xal
                            <span class="badge badge-light badge-pill">{{$quiz->details['average']}}</span>
                        </li>
                        @endif
                    </ul>
                    @if(count($quiz->topTen)>0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Ilk 10</h5>
                            <ul class="list-group">
                            @foreach($quiz->topTen as $result)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="h5">{{$loop->iteration}}. </strong>
                                    <img style="object-fit:cover" class="w-8 h-8 rounded-full" src="{{$result->user->profile_photo_url}}" alt="progile pic">
                                    <span @if(auth()->user()->id == $result->user_id) class="text-danger" @endif>{{$result->user->name}}</span> <span class="badge badge-success badge-pill">{{$result->point}}</span>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                {{$quiz->description}}
                @if($quiz->my_result)
                <a href="{{route('quiz.join', $quiz->slug)}}" class="btn btn-warning btn-block btn-sm">Quizi gor</a>
                @elseif($quiz->finished_at>now())
                <a href="{{route('quiz.join', $quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Quize Katil</a>
                @endif
                </div>
            </div>
            </p>
        </div>
    </div>
</x-app-layout>
