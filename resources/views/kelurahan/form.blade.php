@if (isset($muspida))
    {!! Form::hidden('id', $muspida->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_kelurahan') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_kelurahan', 'Nama Kelurahan:', ['class' => 'control-label']) !!}
    {!! Form::text('nama_kelurahan', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_kelurahan'))
        <span class="help-block">{{ $errors->first('nama_kelurahan') }}</span>
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
    <div class="form-group {{ $errors->has('kecamatan_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('kecamatan_id', 'Kecamatan:', ['class' => 'control-label']) !!}
    @if(count($list_kec) > 0)
        {!! Form::select('kecamatan_id', $list_kec, null, ['class' => 'form-control', 'id' => 'grup_muspida_id', 'placeholder' => 'Pilih Grup']) !!}
    @else
        <p>Tidak ada pilihan Grup Muspida, buat dulu ya...!</p>
    @endif
    @if ($errors->has('kecamatan_id'))
        <span class="help-block">{{ $errors->first('kecamatan_id') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
