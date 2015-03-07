@extends('voting')

@section('content')
    <h1>Voter Entry</h1>

    {!! Form::open(array('url' => 'voting')) !!}

    <div class="form-group">
        {!! Form::label('voterName', 'Voter Name') !!}
        {!! Form::text('voterName', Input::old('voterName'), array('class' => 'form-control')) !!}

    </div>

    <div class="form-group">
        {!! Form::label('voterId', 'Voter ID') !!}
        {!! Form::text('voterId', Input::old('voterId'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Save', array('class' => 'btn btn-primary pull-right')) !!}

    {!! Form::close() !!}
@endsection