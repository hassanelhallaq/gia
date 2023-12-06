<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'phone_number' => 'required|string|unique:clients',
             'email' => 'required|email|unique:clients',
            'country_id' => 'required|string',
            'city_id' => 'required|string',
            'street' => 'required',

        ], [
            'name.required' => ' اسم الشركة مطلوب',
            'phone_number.required' => ' رقم جوال الشركة مطلوب',
             'email.required' => ' ايميل الشركة مطلوب',
            'password.required' => ' كلمة المرور مطلوبة',
            'country_id.required' => ' دولد الشركة مطلوب',
            'city_id.required' => 'المدينه  مطلوب',
            'street.required' => 'الشارع العمل مطلوب',
    ,
        ]);

        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $clinet = Client::creeate();

        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $isSaved ? 201 : 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
