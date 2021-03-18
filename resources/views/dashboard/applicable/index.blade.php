@extends('dashboard.index')
@section('title','إدارة  ألمستفيدين المتقدمين')
@section('dashboard-content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">لوحة التحكم</a></li>
      <li class="breadcrumb-item active "  > <a href="{{route('applicable')}}"> إدارة المستفيدين المتقدمين  </a></li>
     </ol>
    </nav>
    <div class="users">

      <div class="row " style="margin-bottom:15px">
        <div class="col ">
          <form class="" action="" method="post">
            <input type="text" class="form-control" name="" value="">
          </form>
        </div>

        <div class="col ">
        <?php $_count =0 ?>
            @foreach ($allapplicable as $applicable)
            {{-- {{ ($applicable->count()) }} --}}
        <?php $_count =$applicable->count() ?>
            @endforeach
            @if ($_count > 0)
                
          <a class="btn  border border-dark ml-2 mt-2" href="{{ url("exportApplicable") }}">
          <i class="fa fa-download" aria-hidden="true"></i>
          تصدير</a>
  
            @endif
         </div>
      </div>


      <table class="table table-hover table-bordered table-responsive">
        <thead>
          <th>#</th>
          <th> الإسم </th>
          <th> إسم الاب </th>
          <th> إسم الجد </th>
          <th> الإسم الاخير </th>
          <th> ح إجتماعية </th>
          <th>ر . الهوية</th>
          <th>  الجنسية </th>
          <th>  الجنس </th>
          <th> الوظيفة </th>
          <th> جهة العمل </th>
          <th>السكن   </th>
          <th>ت الميلاد   </th>
          <th>الجوال   </th>
          <th>وقت التواصل   </th>
          <th> الايمل  </th>
          <th> أحداث  </th>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach ($allapplicable as $applicable)
            <tr>
              <td>   {{$applicable->payeeId}} </td>
              <td>{{  $applicable->firstName }}</td>
              <td>{{  $applicable->fatherName }}</td>
              <td>{{  $applicable->grandFatherName }}</td>
              <td>{{  $applicable->lastName }}</td>
               <td class="@if ($applicable->socialState == 'married') text-success  @else text-danger   @endif">
                @if ($applicable->socialState == 'married')
                <span class="  alert-success">
                  متزوج
                </span>
                @else
                    أعزب
                @endif
              </td>
              <td>{{  $applicable->ssnNumber }}</td>
              <td>{{  $applicable->natonality }}</td>

              <td>
              @if ($applicable->gender == "male")
                ذكر
              @else
                أنثى
              @endif</td>
              <td>{{  $applicable->jobTitle }}</td>
              <td>{{  $applicable->jobEmployer }}</td>
              <td>{{  $applicable->address }}</td>
              
              <td>{{  $applicable->birthDate }}</td>
              <td>{{  $applicable->phone }}</td>
              <td>{{  $applicable->bestContactTime }}</td>
              <td>{{  $applicable->email }}</td>
             
               <td>
                <form class="form-inline" action="{{route('destroy',$applicable->payeeId) }}" method="post">
                  @csrf
                  @method("DELETE")
                  <button   type="submit" class="btn  btn-sm  btn-project"><i class="fa fa-bank "></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    <div class="container">
        {{$allapplicable->links()}}
    </div>
    </div>
@endsection
