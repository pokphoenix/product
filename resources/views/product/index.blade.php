@extends('main.layouts.main')


@section('style')
 <!-- Datatable -->
 
   <style type="text/css">
    tr:hover {cursor: pointer;}
  </style>
@endsection

@section('content-wrapper')
	

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <i class="fa fa-barcode"></i>{{ $title }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">{{ $title }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
       @include('layouts.error')

    	<div class="box">
           <div class="box-header">
              <h3 class="box-title"></h3>
               <a href=" {{ url($route.'/create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> new</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Active Status</th>
                  <th>Tool</th>
                  
                </tr>
                </thead>
                <tbody>
				
				@foreach ($tables as $key=>$table)
                <tr >
                  <td>{{ $key+1 }}</td>
                  <td>{{ $table['ProductName']}}</td>
                  <td>{{ $table['ProductDescription']}}</td>
                 
                  <td>{{ ($table['IsActive']) ? 'Active' : 'Non Active' }}</td>
                  <td>  
                      <a class="btn btn-default" style="float: left; margin-right: 5px;" href="{{ url($route.'/'.$table['ProductCode'].'/edit') }}" ><i class="fa fa-edit" ></i></a>
                      <a class="btn btn-default" style="float: left; margin-right: 5px;" href="{{ url($route.'/'.$table['ProductCode'].'/active') }}" ><i class="fa fa-{{ ($table['IsActive'])? 'close' : 'check' }}" title="set to {{ ($table['IsActive'])? 'non active' : 'active' }}" ></i></a>
                      <form class="del-form" method="post" action="{{ url($route.'/'.$table['ProductCode']) }}">
                        <input type="hidden" name="_method" value="delete" />
                        {!! csrf_field() !!}
                        <button type="button" class="btn btn-danger del-data" ><i class="fa fa-trash-o" ></i></button>
                      </form>
                  </td>
                
                </tr>
                @endforeach
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->

@endsection

@section('javascript')

<script src=" {{ url('bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
<script src="{{ url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
$(function () {
  $('#example1').DataTable({

     "order": [[ 0, "desc" ]]
  })

  $('.del-data').click(function(){
      console.log('click');
      if(confirm("delete it ?")){
         $(this).closest('.del-form').submit();
      }

  })

})
</script>
@endsection		
