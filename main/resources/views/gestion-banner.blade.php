@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td,
    .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }
</style>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="{{ route('admin.home') }}">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Banner</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Gestión de Banner <small>Banner</small> </h3>
        
            @if (\Session::has('success'))
            <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
            </div>
            @endif
            
            @if (\Session::has('error'))
            <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
            </div>
            @endif

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Banner</span> </div>
                        <div class="actions"> <button data-toggle="modal" data-target="#exampleModalLong" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Cargar Banner</button> </div>
                    
                           
                    
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            
                             <form method="post" action="{{route('banner-active')}}">
                            @csrf
                
                            Activar:
                            
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="brand" {{($active) ? 'checked' : ''}} id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                
                                </label>
                                </div>
                            
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                          </div>
                          </form>
                          
                            <form method="post" role="form" id="datatable-search-form">
                                <table class="table table-striped table-bordered table-hover" id="">
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">-->
<!--  Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Subir archivo </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form method="post" action="{{route('banner')}}" enctype="multipart/form-data">
                @csrf
      <div class="modal-body">
            
            Ingresa el archivo:
            
            <input name="banner" type="file" />
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
            </form>
    </div>
  </div>
</div>
@endsection
