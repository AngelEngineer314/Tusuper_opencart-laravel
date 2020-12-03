@extends('layouts.admin')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{__('main.Employee')}}</h3>
    </div>
    <div class="title-right">
            
    </div>
</div>
<div class="clearfix"></div>
<div class="x_content">
    <div class="row ">
        <div class="col-sm-12 ">
            <div class="container-fluid">
                <form action="{{ route('employeeImport') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class='table'>
                        <tr>
                            <td width='40%' align='right'>
                                <label>Select Excel File for Upload</label>
                            </td>
                            <td width='30'>
                                <input type="file" name="file" class="form-control" required>
                            </td>
                            <td width='30%' align='left'>
                                <button type="button" class="btn btn-info pull-right mr-0" data-toggle="modal" data-target="#CreateModal"><i class="fa fa-plus"></i> &nbsp;{{__('main.create_employee')}}</button>
                                <button class='btn btn-success pull-right' id="btn-import-excel"><i class="fa fa-plus"></i> &nbsp;{{__('main.import_excel')}}</button>
                            </td>
                        </tr>
                        <tr>
                            <td width='40%' align='right'></td>
                            <td width='30'>
                            </td>
                            <td width='30%' align='left'></td>
                        </tr>
                    </table>
                </form>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{__('main.employee_name')}}</th>
                            <th>{{__('main.email')}}</th>
                            <th>{{__('main.card_number')}}</th>
                            <th>{{__('main.security_number')}}</th>
                            <th>{{__('main.amount')}}</th>
                            <th>{{__('main.date_added')}}</th>
                            <th>{{__('main.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $val)
                        <tr>
                            <td>{{$val->firstname}} {{$val->lastname}}</td>
                            <td>{{$val->email}}</td>
                            <td>{{$val->card_number}}</td>
                            <td>{{$val->security_number}}</td>
                            <td>{{$val->amount}}</td>
                            <td>{{$val->date_added}}</td>
                            <td>
                                <button data-id="{{$val->customer_id}}" class="btn btn-info edit-employee-btn"><i class="fa fa-pencil"></i></button>
                                <button data-id="{{$val->customer_id}}" class="btn btn-danger delete-employee-btn"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="CreateModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">{{__('main.create_employee')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  action="{{ route('employeeStore' )}}" method="post" id="create-form">
                @csrf
                <div class="modal-body">
                    
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.first_name')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="firstname" placeholder="First Name..." required="required" />
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.last_name')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="lastname" placeholder="Last Name..." required="required" />
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.email')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="email" placeholder="Email..." required="required" />
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                            {{__('main.card_number')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" id="card-number" data-validate-length-range="2" name="card_number" placeholder="Card Number..." required="required" readonly/>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <button type="button" class="btn btn-info" id="btn-card-generate"><i class="fa fa-pencil"></i> {{__('main.card_number_generator')}}</button>
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                            {{__('main.security_number')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" id="security-number" data-validate-length-range="2" name="security_number" placeholder="Card Number..." required="required" readonly/>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <button type="button" class="btn btn-info" id="btn-security-number-generate"><i class="fa fa-pencil"></i> {{__('main.security_number_generator')}}</button>
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                            {{__('main.amount')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="amount" placeholder="Amount" required="required" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Save">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="EditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">{{__('main.edit_employee')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  action="{{ route('employeeUpdate') }}" method="post" id="edit-form">
                @csrf
                <div class="modal-body">
                    
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.first_name')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="firstname" id='firstname' placeholder="Firstname..." required="required" />
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.last_name')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="lastname" placeholder="Lastname..." required="required" />
                        </div>
                    </div>
                    
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.email')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="email" placeholder="Email..." required="required" />
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.card_number')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="card_number" placeholder="Card Number..." required="required" readonly/>
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">
                            {{__('main.security_number')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" id="security-number" data-validate-length-range="2" name="security_number" placeholder="Security Number..." required="required" readonly/>
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">{{__('main.amount')}}<span
                            class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-validate-length-range="2" name="amount" placeholder="Amount..." required="required" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type='hidden' name='customer_id' id='employee-id' />
                    <input type="submit" class="btn btn-success" value="Edit" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>  
@endsection