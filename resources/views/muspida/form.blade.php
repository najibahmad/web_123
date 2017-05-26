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
    <div class="form-group {{ $errors->has('alamat_rumah') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('alamat_rumah', 'Alamat Rumah:', ['class' => 'control-label']) !!}
    {!! Form::textarea('alamat_rumah', null, ['class' => 'form-control textarea','id'=>'alamat_rumah', 'rows' => 2, 'cols' => 40]) !!}
    @if ($errors->has('alamat_rumah'))
        <span class="help-block">{{ $errors->first('alamat_rumah') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('alamat_kantor') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('alamat_kantor', 'Alamat Rumah:', ['class' => 'control-label']) !!}
    {!! Form::textarea('alamat_kantor', null, ['class' => 'form-control textarea','id'=>'alamat_kantor', 'rows' => 2, 'cols' => 40]) !!}
    @if ($errors->has('alamat_kantor'))
        <span class="help-block">{{ $errors->first('alamat_kantor') }}</span>
    @endif
</div>

<!-- Provinsi -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('grup_muspida_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('grup_muspida_id', 'Grup Muspida:', ['class' => 'control-label']) !!}
    @if(count($list_grup) > 0)
        {!! Form::select('grup_muspida_id', $list_grup, null, ['class' => 'form-control', 'id' => 'grup_muspida_id', 'placeholder' => 'Pilih Grup']) !!}
    @else
        <p>Tidak ada pilihan Grup Muspida, buat dulu ya...!</p>
    @endif
    @if ($errors->has('grup_muspida_id'))
        <span class="help-block">{{ $errors->first('grup_muspida_id') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
