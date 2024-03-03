<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view("dashboard.client.index", compact("clients"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view("dashboard.client.create",compact("countries"));

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
            'password' => 'required',


        ], [
            'name.required' => ' اسم الشركة مطلوب',
            'phone_number.required' => ' رقم جوال الشركة مطلوب',
             'email.required' => ' ايميل الشركة مطلوب',
            'password.required' => ' كلمة المرور مطلوبة',
            'country_id.required' => ' دولد الشركة مطلوب',
            'city_id.required' => 'المدينه  مطلوب',
            'street.required' => 'الشارع العمل مطلوب',
        ]);

        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
        $data['password'] =  Hash::make($request->get('password'));
        if ($request->hasFile('address')) {
            $adminImage = $request->file('address');
            $imageName = time() . '_' . $request->get('address') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/program', $imageName);
            $data['address'] = '/images/' . 'program' . '/' . $imageName;
        }
        $isSaved = Client::create($data);
        return response()->json(['redirect' => route('clients.index')]);

        // return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $isSaved ? 201 : 400);

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
    public function destroy( $id)
    {
        $client = Client::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'تم الحذف  بنجاح'] , $client ? 200 : 400);

    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $organizations = Client::where('name', 'like', "%$searchQuery%")->get();
        return $organizations;
    }
    public function createClient()
    {
        $countries = Country::all();
        return view("dashboard.AddProject.add3",compact("countries"));

    }
}
