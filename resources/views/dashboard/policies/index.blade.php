@extends('dashboard.index')
@section('title',' إدارة محاضر الجمعية العمومية  ')
@section('dashboard-content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">لوحة التحكم</a></li>
      <li class="breadcrumb-item active" aria-current="page"> إدارة محاضر الجمعية العمومية  </li>
    </ol>
    </nav>
    <div class="policies">
      <div class="h5"> إدارة محاضر الجمعية العمومية  </div>
      <div class="row " style="margin-bottom:15px">
        <div class="col">
          <form class="" action="" method="post">
            <input type="text" class="form-control" name="" value="">
          </form>
        </div>

        <div class="col offset-lg-8">
          {{-- <a type="button" class="btn  border border-dark " name="button">  <i class="fa fa-upload fa-lg"></i>  تصدير </a>
          <a type="button" class="btn   border border-dark" name="button"> <i class="fa fa-download fa-lg"></i> استيراد </a> --}}
              <!-- Button trigger modal Create New policies -->
          <button data-toggle="modal" data-target="#createpolicy" type="button" class="btn text-orange text-white " name="button">  <i class="fa fa-plus "></i> &nbsp;&nbsp; أنشاء </a>
        </div>

      </div>

      <!-- Modal -->
      <div class="modal fade" id="createpolicy" tabindex="-1" data-keyboard="false"  data-backdrop="static" aria-labelledby="createpolicyLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createpolicyLabel">أضافة  جديد </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form  id="user-create-form" enctype="multipart/form-data" method="post" action="{{route('policies.store')}}">
                @csrf
                @method('POST')
                <div class="form-row">
                  <div class="col">
                    <label class="label-control" for="policyTitle">العنوان</label>
                    <input id="inputpolicyTitle" type="text" name="policyTitle" class="form-control" placeholder=" أكتب العنوان  ">
                  </div>
                  
                </div>
                <div class="form-row">
                  <div class="col">
                    <label class="label-control" for="policyImage">  الصورة المميزة  </label>
                    <input type="file" class="form-control-file" name="policyImage" >
                  </div>
                  <div class="col">
                    <label class="label-control" for="policyFile">  ملف pdf</label>
                    <input type="file" class="form-control-file" name="policyFile" >
                  </div>
                </div>
                
              <div class="form-row">
                  <div class="col" style="margin-top:8%">
                    <div class="form-check">
                      <label class="form-check-label" for="policyStatus">
                        <input class="form-check-input" type="radio" name="policyStatus" id="policyStatus" value="1"  >
                        تفعيل
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label" for="policyStatus">
                        <input class="form-check-input" type="radio" name="policyStatus" id="policyStatus" value="0"  >
                        إلغاء تفعيل
                      </label>
                    </div>
                </div>

                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn main-color " data-dismiss="modal">الغاء</button>
              <button type="submit" class="btn text-orange text-white "> إضافة <i class="fa fa-plus"></i></button>
            </div>
                </form>
          </div>
        </div>
      </div>
      {{-- End Modal Create --}}
       {{-- Errors message --}}
      @include('includes.errors')
      {{-- success message --}}
      @include('includes.success')

      <table class="table table-hover table-bordered">
        <thead>
          <th>#</th>
          <th>العنوان </th>
          <th>  الصورة المميزة </th>
          <th>ملف  pdf</th>
          <th> الحالة</th>
          <th> أحداث  </th>
        </thead>
        <tbody>
        <?php $id=1; ?>
          @foreach ($allpolicies as $policy)
            <tr>
              <td> {{ $id++ }} </td>
              <td>{{$policy->policyTitle}}</td>
              <td>  <img style="max-width: 40px;max-height:40px" src="{{url( $policy->policyImage )}}" class="special-img" alt="">   </td>
               <td> <a target="_blank" href="{{ url($policy->policyFile)  }}"> <i class="fa fa-link" style=" color: #ff7612;"></i> فتح الملف</a> </td>
              <td class="@if ($policy->policyStatus==1) text-success  @else text-danger   @endif">
                @if ($policy->policyStatus==1)
                  تم التفعيل
                @else
                  غير مفعل
                @endif
              </td>
              <td>
                <form class="form-inline" action="{{route('policies.destroy',$policy->policyId) }}" method="post">
                  @csrf
                  @method("DELETE")
                  <a class="btn  btn-sm ml-1" href="{{route('policies.edit',$policy->policyId)}}" ><i class="fa fa-edit "></i></a>
                  <button   type="submit" class="btn  btn-sm  btn-project"><i class="fa fa-bank "></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="container">
    {{ $allpolicies->links() }}  
    </div>
@endsection
