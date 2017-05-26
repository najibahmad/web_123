@if (isset($post))
    {!! Form::hidden('id', $post->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('title') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('title', 'Judul Halaman:', ['class' => 'control-label']) !!}
    {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
    @if ($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('category_id', 'Kategori Menu:', ['class' => 'control-label']) !!}
    @if(count($list_grup) > 0)
        {!! Form::select('category_id', $list_grup, null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Pilih Grup']) !!}
    @else
        <p>Tidak ada pilihan Grup, buat dulu ya...!</p>
    @endif
    @if ($errors->has('category_id'))
        <span class="help-block">{{ $errors->first('category_id') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('content') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('content', 'Konten Halaman:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', $post->content, ['class' => 'form-control textarea','id'=>'content']) !!}
    @if ($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
