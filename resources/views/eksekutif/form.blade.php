@if (isset($muspida))
    {!! Form::hidden('id', $muspida->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama', 'Nama:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama'))
        <span class="help-block">{{ $errors->first('nama') }}</span>
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

<!-- Provinsi -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('grup_eksekutif_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('grup_eksekutif_id', 'Grup Muspida:', ['class' => 'control-label']) !!}
    @if(count($list_grup) > 0)
        {!! Form::select('grup_eksekutif_id', $list_grup, null, ['class' => 'form-control', 'id' => 'grup_muspida_id', 'placeholder' => 'Pilih Grup']) !!}
    @else
        <p>Tidak ada pilihan Grup Muspida, buat dulu ya...!</p>
    @endif
    @if ($errors->has('grup_eksekutif_id'))
        <span class="help-block">{{ $errors->first('grup_eksekutif_id') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
