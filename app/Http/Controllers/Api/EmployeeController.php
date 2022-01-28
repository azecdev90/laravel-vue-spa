<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\PostRequest;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EmployeeCollection(Employee::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
     
        $employee = new Employee;
        $employee->title = $request->title;
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->jobtitle = $request->jobtitle;
        $employee->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        return new EmployeeResource(Employee::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->title = $request->title;
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->jobtitle = $request->jobtitle;
        $employee->save();

        return response()->json(['data' => ['status' => 'successfully updated employee']]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        
        return response()->json(['data' => ['status' => 'successfully deleted employee']]);
    }
}
