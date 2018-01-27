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
                    <label >Customer</label>
                    <select class="select2 form-control " id="customer_id" name="customer_id" >
                      <option value=""></option>
                        @if(isset($customers))
                          @foreach($customers as $customer)
                          <option value="{{ $customer['CustomerCode'] }}" @if(isset($edit)&&$data['CustomerCode']==$customer['CustomerCode']) selected=""  @endif > {{ $customer['FistName']." ".$customer['LastName'] }}</option>
                          @endforeach
                        @endif
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label >Product</label>
                    <select class="select2 form-control " id="product_id" name="product_id" >
                      <option value=""></option>
                        @if(isset($products))
                          @foreach($products as $product)
                          <option value="{{ $product['ProductCode'] }}" @if(isset($edit)&&$data['ProductCode']==$product['ProductCode']) selected=""  @endif > {{ $product['ProductName'] }}</option>
                          @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="{{ isset($edit) ? $data['QTY'] : old('QTY') }}">
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

         

          
           <button type="button" id="save" class="btn btn-primary">Save</button>
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


  $("#save").on("click",function(){
      $("#approve").val(false);
      $("#signup-form").submit();
  })
  $("#save_approve").on("click",function(){
      $("#approve").val(true);
      $("#signup-form").submit();
  })

$(function() {
    $("#signup-form").validate({
      rules: {
        customer_id: "required",
        product_id: "required",
        amount: {
          required: true
        
        }
      },
      messages: {
        customer_id: "Please select customer",
        product_id: "Please select product",
        amount:{
                  required: 'Wrong amount',
                 
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
