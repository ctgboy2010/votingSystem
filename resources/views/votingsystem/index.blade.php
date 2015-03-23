@extends('voting')

@section('content')

    <h1 class="text-center">Result Of Voting</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td><strong>Symbol of Candidate</strong></td>
            <td><strong>Name of Candidate</strong></td>
            <td><strong>Status</strong></td>
            <td><strong>No of Votes</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach($candidates as $key => $value)
            <tr>
                <td>{{ $value->symbol }}</td>
                <td>{{ $value->candidateName }}</td>
                <td>
                    @if($maxValue > $value->cast)
                        Looser
                    @else
                        @if(($value->cast == $maxValue) && $totalMaxValue<=1)
                            Winner
                        @else{{--if(($value->cast == $maxValue) && $totalMaxValue>1)--}}
                            Tie
                        @endif
                    @endif
                </td>
                <td>{{ $value->cast }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection