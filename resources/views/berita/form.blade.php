@if (isset($post))
    {!! Form::hidden('id', $post->id) !!}
@endif


<!-- Provinsi -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('kategori_berita_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('kategori_berita_id', 'Kategori Berita:', ['class' => 'control-label']) !!}
    @if(count($list_grup) > 0)
        {!! Form::select('kategori_berita_id', $list_grup, null, ['class' => 'form-control', 'id' => 'kategori_berita_id', 'placeholder' => 'Pilih Kategori Berita']) !!}
    @else
        <p>Tidak ada pilihan, buat dulu ya...!</p>
    @endif
    @if ($errors->has('kategori_berita_id'))
        <span class="help-block">{{ $errors->first('kategori_berita_id') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('title') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('title', 'Judul Berita:', ['class' => 'control-label']) !!}
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
    {!! Form::label('content', 'Konten Berita:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control textarea','id'=>'content']) !!}
    @if ($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
    @endif
</div>




<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
