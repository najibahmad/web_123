@if (isset($muspida))
    {!! Form::hidden('id', $muspida->id) !!}
@endif
{!! Form::hidden('jenis', 'badan') !!}

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_kecamatan') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_kecamatan', 'Nama Kecamatan:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_kecamatan', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_kecamatan'))
        <span class="help-block">{{ $errors->first('nama_kecamatan') }}</span>
    @endif
</div>



@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_pimpinan') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_pimpinan', 'Nama Pimpinan:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_pimpinan', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_pimpinan'))
        <span class="help-block">{{ $errors->first('nama_pimpinan') }}</span>
    @endif
</div>





@if ($errors->any())
      <div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('alamat', 'Alamat:', ['class' => 'control-label']) !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control textarea','id'=>'alamat', 'rows' => 2, 'cols' => 40]) !!}
    @if ($errors->has('alamat'))
        <span class="help-block">{{ $errors->first('alamat') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @if ($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('faks') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('faks', 'Faks:', ['class' => 'control-label']) !!}
    {!! Form::text('faks', null, ['class' => 'form-control']) !!}
    @if ($errors->has('faks'))
        <span class="help-block">{{ $errors->first('faks') }}</span>
    @endif
</div>


@if ($errors->any())
    <div class="form-group {{ $errors->has('website') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
    @if ($errors->has('website'))
        <span class="help-block">{{ $errors->first('website') }}</span>
    @endif
</div>





<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
