@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Categories')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify ml-1"></i>
                             @lang('Categories')
                             <a class="pull-right" href="{!! route('categories.create') !!}"><i class="fa fa-plus-square fa-lg mr-2"></i></a>
                         </div>
                         <div class="card-body">
                             @include('categories.table')
                              <div class="pull-left mr-3" dir="ltr">
                                     
        @include('coreui-templates::common.paginate', ['records' => $categories])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

