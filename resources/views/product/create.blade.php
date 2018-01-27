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
                    <label >Name</label>
                    <input type="text" maxlength="13"  class="form-control" id="product_name" name="product_name" placeholder="Name"  value="{{ isset($edit) ? $data['ProductName'] : old('ProductName') }}">
                  </div>
                
                  <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" id="product_description" name="product_description" placeholder="First Name" value="{{ isset($edit) ? $data['ProductDescription'] : old('ProductDescription') }}">
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

<script type="text/javascript">
$(function() {
    $("#signup-form").validate({
      rules: {
        product_name: {
          required: true,
          maxlength: 100
        },
        product_description: {
          required: true,
          maxlength: 100
        }
      },
      messages: {
        product_name:{
                  required: 'Wrong Product Name',
                  maxlength: 'Max length 100'
        }, 
        product_description:{
                  required: 'Wrong Product Description',
                  maxlength: 'Max length 100'
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
