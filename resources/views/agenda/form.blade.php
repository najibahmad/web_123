@if (isset($muspida))
    {!! Form::hidden('id', $muspida->id) !!}
@endif


@if ($errors->any())
    <div class="form-group {{ $errors->has('title') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('title', 'Nama Agenda:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    @if ($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>



@if ($errors->any())
    <div class="form-group {{ $errors->has('content') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('content', 'Keterangan:', ['class' => 'control-label']) !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
    @if ($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
    @endif
</div>


@if ($errors->any())
    <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('tanggal', 'Tanggal:', ['class' => 'control-label']) !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control', 'id'=>'tanggal']) !!}
    @if ($errors->has('tanggal'))
        <span class="help-block">{{ $errors->first('tanggal') }}</span>
    @endif
</div>




<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
