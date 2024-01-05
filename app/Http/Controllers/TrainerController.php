<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $trainers = Trainer::paginate(10);
       return view('dashboard.trainer.index',compact('trainers'));
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
        if (!empty($request->all())) {
            $validator = Validator($request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:trainers',
                'phone' => 'required|string|unique:trainers',

            ], [
                'name.required' => 'الاسم مطلوب',
                'email.required' => 'الاميل  مطلوب',
                'phone.required' => 'وقم الهاتف مطلوب مطلوب',
                'email.unique' => 'الاميل مسجل مسبقا',
                'phone.unique' => 'رقم الهاتف مسجل مسبقا',

            ]);
            if (!$validator->fails()) {
                $trainer = new Trainer();
                $trainer->name = $request->get('name');
                $trainer->email = $request->get('email');
                $trainer->phone = $request->get('phone');
                $isSaved = $trainer->save();
                return response()->json(['icon' => 'success', 'title' => 'تم الانشاء بنجاح '], 200);

            } else {

                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);

            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        if (!empty($request->all())) {
            $validator = Validator($request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:trainers,email,' .$trainer->id,
                'phone' => 'required|string|unique:trainers,phone,' . $trainer->id,

            ], [
                'name.required' => 'الاسم مطلوب',
                'email.required' => 'الاميل  مطلوب',
                'phone.required' => 'وقم الهاتف مطلوب مطلوب',
                'email.unique' => 'الاميل مسجل مسبقا',
                'phone.unique' => 'رقم الهاتف مسجل مسبقا',

            ]);
            if (!$validator->fails()) {
                $trainer->name = $request->get('name');
                $trainer->email = $request->get('email');
                $trainer->phone = $request->get('phone');
                $isSaved = $trainer->update();
                return response()->json(['icon' => 'success', 'title' => 'تم التعديل بنجاح '], 200);

            } else {

                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);

            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        //
    }
}
