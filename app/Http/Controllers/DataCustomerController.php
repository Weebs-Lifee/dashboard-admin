<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class DataCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Customers::get();
        return view ('admin/dataCustomer/list', [
            "title" => "Data Customer",
             "data" => $datas,
             "icon" => "../img/icon.svg",    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin/dataCustomer/create', [
            "title" => "Create Customer",
            "icon" => "../../img/icon.svg",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Customers::create([
            'name' => $request->name,
            'no_wa' => $request->no_wa,
            'gender' => $request->gender,    
        ]);

        return redirect('admin/dataCustomer')->with(['success' => $data->name. ' as a new customer has benn added!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'test';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customers::findOrFail($id);
        return view ('admin/dataCustomer/update', [
             'title' => 'Edit Data Customer',
             'data' => $data,
             "icon" => "../../img/icon.svg",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Customers::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'no_wa' => $request->no_wa,
            'gender' => $request->gender,
        ]);
        
        return redirect('admin/dataCustomer')->with(['update' => 'Name : '.$data->name.' sucsess updated']);
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customers::findOrFail($id);
        $data->delete();

        return redirect('admin/dataCustomer')->with(['delete' => $data->name. ' has been deleted successfully.']);

    }
}
