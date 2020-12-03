<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Exports\UsersExport;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Models\Customer;
use DB;

class EmployeeController extends Controller
{
    /**
     * 
     * display employee management page
     * 
     * @param none
     */
    public function showEmployee()
    {
        $employee = Customer::where('status', 1)->where('isCard', 1)->get();

        return view('employee.index', ['employees'=>$employee]);
    }

    /**
     * 
     * show a program by specific id.
     * 
     * @param $id 
     * 
     */

    /**
    * @return \Illuminate\Support\Collection
    */
    public function employeeImport() 
    {
        Excel::import(new CustomersImport, request()->file('file'));
           
        return back();
    }

    /**
     * 
     * check card number in employee list
     * 
     * @param request
     * 
     */

    public function cardNumberCheck(Request $request) {
        $card_number = $request->card_number;

        $isCardNumber = Customer::where('card_number', $card_number)->doesntExist();

        return $isCardNumber;
    }

    /**
     * 
     * create a new program for current employee.
     * 
     * @param request
     * 
     */

    public function employeeStore(Request $request) {
        try {
            $inputs = $request->all();
            $inputs['password'] = 'fbd8c45fc9fb9e1caaf301d7d2beea78f8ddea6c';
            $inputs['salt'] = 'nSttZys4t';
            $inputs['language_id'] = 1;
            $inputs['isCard'] = 1;
            $inputs['status'] = 1;
            $program = Customer::create($inputs);
            
            DB::commit();
            return redirect('employee/showEmployee')->with('status', "true")->with('message', "Scuccessfully added employee");
        } catch(Exception $e) {
            DB::rollback();
            if($request->isAjsx()) {
                return response()->json(["status" => "false", 'message'=>$e->getMessage()]);
            } else {
                return redirect()->back()->with('status', "false")->with('message', $e->getMessage());
            }
        }
    }

    public function getEmployeeById(Request $request) {
        $employee = Customer::where('customer_id', $request->id)->first();
        if($employee == null ) {
            return response()->json(["status"=>false, 'message'=>'item not found.']);
        }
        try {     
            return response()->json(["status" => "true", 'data'=>$employee]);      
        } catch(Exception $e) {
            DB::rollback();
            if($request->isAjsx()) {
                return response()->json(["status" => "false", 'message'=>$e->getMessage()]);
            } else {
                return redirect()->back()->with('status', "false")->with('message', $e->getMessage());
            }
        }
    }

    /**
     * 
     * updata a program by specific id.
     * 
     * @param $request
     * @param $id
     * 
     */
    public function employeeUpdate(Request $request) {
        $employee = Customer::where('customer_id', $request->customer_id)->first();
        if($employee == null ) {
            return response()->json(["status"=>false, 'message'=>'item not found.']);
        }

        try {
            $inputs = [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'card_number' => $request->card_number,
                'amount' => $request->amount
            ];
            Customer::where('customer_id', $request->customer_id)->update($inputs);
            DB::commit();
            return redirect('employee/showEmployee')->with('status', "true")->with('message', "Successfully Updated.");
        } catch(Exception $e) {
            DB::rollback();
            if($request->isAjsx()) {
                return response()->json(["status" => false, 'message'=>$e->getMessage()]);
            } else {
                return redirect()->back()->with('status', false)->with('message', $e->getMessage());
            }
        }
    }

    /**
     * 
     * Delete a Employee by specific id.
     * 
     * @param request
     */
    public function employeeDelete(Request $request) {
        $delete_id = $request->id;
        if($request->has('id')) {
            $employee = Customer::where('customer_id', $delete_id)->first();
            if(!$employee) {
                return response()->json(["status"=>false, 'message'=>'item not found.']);
            }

            try {
                Customer::where('customer_id', $delete_id)->delete();
                DB::commit();
                return response()->json(["status"=>"true", 'message'=>'Successfully deleted.']);
            } catch(Exception $e) {
                DB::rollback();
                if($request->isAjsx()) {
                    return response()->json(["status" => false, 'message'=>$e->getMessage()]);
                } else {
                    return redirect()->back()->with('status', false)->with('message', $e->getMessage());
                }
            }
        }
        else {
            return response()->json(["status"=>false, 'message'=>'item not found.']);
        }
    }
}
