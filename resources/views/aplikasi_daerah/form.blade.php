@if (isset($muspida))
    {!! Form::hidden('id', $muspida->id) !!}
@endif
{!! Form::hidden('jenis', 'badan') !!}

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama', 'Nama Aplikasi Daerah:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama'))
        <span class="help-block">{{ $errors->first('nama') }}</span>
    @endif
</div>



@if ($errors->any())
    <div class="form-group {{ $errors->has('link') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('link', 'Link:', ['class' => 'control-label']) !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
    @if ($errors->has('link'))
        <span class="help-block">{{ $errors->first('link') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
