@if (isset($dokumen))
    {!! Form::hidden('id', $dokumen->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('judul') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('judul', 'Judul Dokumen:', ['class' => 'control-label']) !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
    @if ($errors->has('judul'))
        <span class="help-block">{{ $errors->first('judul') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('konten') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('konten', 'Keterangan:', ['class' => 'control-label']) !!}
    {!! Form::textarea('konten', null, ['class' => 'form-control textarea','id'=>'konten', 'rows' => 2, 'cols' => 40]) !!}
    @if ($errors->has('konten'))
        <span class="help-block">{{ $errors->first('konten') }}</span>
    @endif
</div>


@if ($errors->any())
    <div class="form-group {{ $errors->has('link_download') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('link_download', 'Link Download:', ['class' => 'control-label']) !!}
    {!! Form::file('link_download', null, ['class' => 'form-control textarea','id'=>'link_download', 'rows' => 2, 'cols' => 40]) !!}
    @if ($errors->has('link_download'))
        <span class="help-block">{{ $errors->first('link_download') }}</span>
    @endif
</div>

<!-- Provinsi -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('kategori_dokumen_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('kategori_dokumen_id', 'Kategori Dokumen:', ['class' => 'control-label']) !!}
    @if(count($list_grup) > 0)
        {!! Form::select('kategori_dokumen_id', $list_grup, null, ['class' => 'form-control', 'id' => 'kategori_dokumen_id', 'placeholder' => 'Pilih Grup']) !!}
    @else
        <p>Tidak ada pilihan Grup, buat dulu ya...!</p>
    @endif
    @if ($errors->has('kategori_dokumen_id'))
        <span class="help-block">{{ $errors->first('kategori_dokumen_id') }}</span>
    @endif
</div>



<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
