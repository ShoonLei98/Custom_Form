<?php

namespace App\Http\Controllers;

use App\Models\CustomForm;
use App\Mail\CustomFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = CustomForm::all();
        return view('custom_forms.index')->with('forms' , $forms);
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
        //to validate the data from input fields
        $validator = validator($request->all(), [
            'phone'  => ['numeric', 'nullable'],
            'birth_date' => ['date', 'nullable'],
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        //save data from input fields
        $form = new CustomForm();
        $form->name = $request->name;
        $form->phone = $request->phone;
        $form->birth_date = $request->birth_date;
        $form->gender = $request->gender;
        $form->save();

        $mailData = [
            'title' => 'Mail from Custom Form',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to(auth()->user()->email)->send(new CustomFormMail($mailData));

        return back()->with('success' , "Successfully submitted and email was sent.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $form = CustomForm::where('id', $id)->first();
        // dd($form);
        return view('custom_forms.edit')->with('form' , $form);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->toArray());
        //to validate the data from input fields
        $validator = validator($request->all(), [
            'phone'  => 'numeric',
            'birth_date' => 'date',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        //save data from input fields
        $form = [
            'name' => $request->name,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ];
        
        CustomForm::where('id', $id)->update($form);

        return redirect()->route('custom_forms.index')->with('success' , "Successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = CustomForm::find($id);
        $form->delete();
        $forms = CustomForm::all();
        return back()->with(['forms' => $forms, 'success' => 'Deleted Successfully']);
    }
}
