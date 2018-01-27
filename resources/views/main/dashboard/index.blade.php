@extends('main.layouts.main')


@section('style')
<style>
.product-click:hover{ cursor: pointer !important;  }
.product-click {border: 1px solid #F00 !important; }
</style>
@endsection

@section('content-wrapper')
	

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> @lang('main.home')
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> @lang('main.home')</a></li>
    
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-12 ">
            <!-- <img src="{{asset('public/img/logo/logo_residence_management_ver_1.png')}}" > -->
            <div class="" style="background: #ecf0f5;" >
        
                  <div class="box-header">
                    
                     <h3 class="box-title">
                       
                     </h3>
                    
                  </div>

                  <div class="box-body "  >
                    <div class="append-card">
                      @if(!auth()->user()->checkApprove())
                      <div class="box box-solid card " style="border-left: 5px solid #00c0ef;">
                          <div class="box-header">
                              <h3 class="box-title">
                                User  {{ getStatusText(Auth()->user()->checkStatusApprove()) }} . Please fill your data at  <a href="{{ url('/profile/show') }}" >Click</a> or Contact juristic person. <BR> สถานะผู้ใช้งาน {{ getStatusText(Auth()->user()->checkStatusApprove(),'TH') }} กรุณากรอกข้อมูลที่ <a href="{{ url('/profile/show') }}" >คลิก</a> หรือ ติดต่อนิติบุคคล 
                              </h3>
                              <br>
                          </div>
                      </div>
                      @endif
                    </div>
                  </div>
                  <!-- /.chat -->
                 

        </div>
          </div>
        </div>
		  
  
    </section>
    <!-- /.content -->

@endsection

@section('javascript')
	<script type="text/javascript">
		

	</script>
@endsection		
