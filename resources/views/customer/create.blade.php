@extends('main.layouts.main')


@section('style')
  <link rel="stylesheet" href="{{ url('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content-wrapper')
	

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li class="active"> {{ $title }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <!-- Main row -->
      <form  id="signup-form" role="form" method="POST" action="{{$action}}" enctype="multipart/form-data"  >
        {{ csrf_field() }}
        @if(isset($edit))
            {{ method_field('PUT') }}
        @endif
      <div class="row">
        <div class="col-sm-12">
           @include('layouts.error')
        </div>
      </div>

      <div class="row">
      	<div class="col-sm-6">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
                   
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
              
              <div class="box-body">
          
              
        
                <div class="col-sm-12">
                  
                  <div class="form-group">
                    <label >ID Card</label>
                    <input type="text" maxlength="13"  class="form-control" id="id_card" name="id_card" placeholder="ID Card"  value="{{ isset($edit) ? $data['IDCrad'] : old('IDCrad') }}">
                  </div>
                
                  <div class="form-group">
                    <label >First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ isset($edit) ? $data['FistName'] : old('FistName') }}">
                  </div>
                  <div class="form-group">
                    <label >Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ isset($edit) ? $data['LastName'] : old('LastName') }}">
                  </div>
                  <div class="form-group">
                    <label >Telephone</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="Telephone" value="{{ isset($edit) ? $data['Tel'] : old('Tel') }}">
                  </div>
                  <div class="form-group">
                    <label >Active</label>
                    <input type="checkbox" id="is_active" name="is_active" placeholder="Amount" @if(isset($edit) && ($data['IsActive'])) checked="" @endif >
                  </div>
                </div>
              </div>
             
            
          </div>
      	</div>
        

        <div class="col-sm-12" style="height: 50px;">

         

          
           <button type="submit" id="save" class="btn btn-primary">Save</button>
            <a href="{{ url($route) }}" id="cancel" class="btn btn-danger">Cancel</a>
          
        </div>
       
      </div>
      </form>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->

@endsection

@section('javascript')
<script type="text/javascript" src=" {{ url('plugins/jquery-validate/jquery.validate.min.js') }} "></script>

<script src=" {{ url('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">


$(function() {
    $("#signup-form").validate({
      rules: {
        first_name: "required",
        last_name: "required",
        id_card: {
          required: true,
          minlength: 13,
          maxlength: 13
        }
      },
      messages: {
        first_name: "Wrong firstname / ชื่อไม่ถูกต้อง",
        last_name: "Wrong lastname / นามสกุลไม่ถูกต้อง",
        id_card:{
                  required: 'Wrong ID card / เลขบัตรประชาชนไม่ถูกต้อง',
                  remote: 'ID card already exits / เลขบัตรประชาชนซ้ำในระบบ'
        },
      },
        highlight: function ( element, errorClass, validClass ) {
      
        $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
       
      },
      unhighlight: function ( element, errorClass, validClass ) {
        $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
       
      }
    });

  });
</script>

@endsection		
