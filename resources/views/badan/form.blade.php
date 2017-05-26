@if (isset($muspida))
    {!! Form::hidden('id', $muspida->id) !!}
@endif
{!! Form::hidden('jenis', 'badan') !!}

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama', 'Nama Badan dan Kantor:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama'))
        <span class="help-block">{{ $errors->first('nama') }}</span>
    @endif
</div>



@if ($errors->any())
    <div class="form-group {{ $errors->has('pimpinan') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('pimpinan', 'Pimpinan:', ['class' => 'control-label']) !!}
    {!! Form::text('pimpinan', null, ['class' => 'form-control']) !!}
    @if ($errors->has('pimpinan'))
        <span class="help-block">{{ $errors->first('pimpinan') }}</span>
    @endif
</div>


@if ($errors->any())
    <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('jabatan', 'Jabatan:', ['class' => 'control-label']) !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
    @if ($errors->has('jabatan'))
        <span class="help-block">{{ $errors->first('jabatan') }}</span>
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
    <div class="form-group {{ $errors->has('telp') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('telp', 'Telepon:', ['class' => 'control-label']) !!}
    {!! Form::text('telp', null, ['class' => 'form-control']) !!}
    @if ($errors->has('telp'))
        <span class="help-block">{{ $errors->first('telp') }}</span>
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

@if ($errors->any())
    <div class="form-group {{ $errors->has('post') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('post', 'Konten Halaman Dinas:', ['class' => 'control-label']) !!}
    {!! Form::textarea('post', null, ['class' => 'form-control textarea','id'=>'post']) !!}
    @if ($errors->has('post'))
        <span class="help-block">{{ $errors->first('post') }}</span>
    @endif
</div>




<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
