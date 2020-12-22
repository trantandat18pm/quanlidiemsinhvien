@extends('layouts.app')

@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$SLSV}}</h3>

                <p>Sinh Viên</p>
              </div>
              <div class="icon">
               <!--  <i class="ion ion-accessibility"></i> -->
                <span class="iconify " data-icon="ion:accessibility" data-inline="false"></span>
              </div>
            @can('admin')   <a href="{{ url('/sinhvien') }}" class="small-box-footer">Chi tiết  <i class="fas fa-arrow-circle-right"></i></a>@endcan
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$SLGV}}</h3>

                <p>Giảng Viên</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
             <span class="iconify" data-icon="ion:briefcase-sharp" data-inline="false"></span>
              </div>
           @can('admin')    <a href="{{ url('/giangvien') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>@endcan
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$SLK}}</h3>

                <p>Khoa</p>
              </div>
              <div class="icon">
               <!--  <i class="ion ion-person-add"></i> -->
               <span class="iconify" data-icon="ion:library" data-inline="false"></span>
              </div>
            @can('admin')  <a href="{{ url('/khoa') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>@endcan
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$SLL}}</h3>

                <p>Lớp</p>
              </div>
              <div class="icon">
              <!--   <i class="ion ion-pie-graph"></i> -->
              <span class="iconify" data-icon="ion:book-sharp" data-inline="false"></span>
              </div>
           @can('admin')    <a href="{{ url('/lop') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>@endcan
            </div>
          </div>
          <!-- ./col -->
        </div>
        @endsection