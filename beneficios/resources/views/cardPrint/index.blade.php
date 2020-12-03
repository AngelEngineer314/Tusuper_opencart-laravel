@extends('layouts.admin')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{__('main.card_print')}}</h3>
    </div>
    <div class="title-right">
            
    </div>
</div>
<div class="clearfix"></div>
<div class="x_content">
    <div class="row ">
        <div class="col-sm-12 ">
            <div class="container-fluid">
                <button type="button" class="btn btn-info pull-right mr-0" data-toggle="modal" data-target="#CreateModal"><i class="fa fa-plus"></i> &nbsp;{{__('main.print_card')}}</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                
            </div>
        </div>
    </div>
</div>
@endsection