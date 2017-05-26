@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Update Halaman {{$judul}}

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">{{$judul}}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->

      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-12">
        <!-- Horizontal Form -->

        <!-- /.box -->
        <!-- general form elements disabled -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">{{$judul}}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            {!! Form::model(null,['method' => 'POST','url' => 'post']) !!}
              <!-- text input -->

              @if ($errors->any())
                  <div class="form-group {{ $errors->has('title') ? 'has-error' : 'has-success' }}">
              @else
                  <div class="form-group">
              @endif
                  {!! Form::label('title', 'Judul Halaman:', ['class' => 'control-label']) !!}
                  {!! Form::text('title', $judul, ['class' => 'form-control']) !!}
                  @if ($errors->has('title'))
                      <span class="help-block">{{ $errors->first('title') }}</span>
                  @endif
              </div>



              <div class="box">
                <div class="box-header">

                  <!-- tools box -->

                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                  <!-- textarea -->
                  @if ($errors->any())
                      <div class="form-group {{ $errors->has('content') ? 'has-error' : 'has-success' }}">
                  @else
                      <div class="form-group">
                  @endif
                      {!! Form::label('content', 'Konten Halaman:', ['class' => 'control-label']) !!}
                      {!! Form::textarea('content', null, ['class' => 'form-control textarea','id'=>'content']) !!}
                      @if ($errors->has('content'))
                          <span class="help-block">{{ $errors->first('content') }}</span>
                      @endif
                  </div>
                </div>
              </div>




              <div class="form-group">
                  {!! Form::submit("Update", ['class' => 'btn btn-primary form-control']) !!}
              </div>


            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')
<script type="text/javascript">
       $(document).ready(function() {
           $('#content').summernote({
             height:300,
           });
       });
   </script>
@endsection
