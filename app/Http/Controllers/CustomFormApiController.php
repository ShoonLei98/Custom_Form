<?php

namespace App\Http\Controllers;

use App\Models\CustomForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CustomFormApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customForm = CustomForm::get();
        $response = [
            'status' => "success",
            'data' => $customForm
        ];
        return Response::json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customForm = new CustomForm();
        $customForm->name = $request->name;
        $customForm->phone = $request->phone;
        $customForm->birth_date = $request->birth_date;
        $customForm->gender = $request->gender;
        $customForm->save();
        $response = [
            'status' => 200,
            'message' => 'success',
        ];

        return Response::json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = CustomForm::find($id);
        if(!empty($data)){
            return Response::json([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ]);
        }
        else{
            return Response::json([
                'status' => 200,
                'message' => 'fail',
                'data' => $data
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customForm = [
            'name' => $request->name,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
        ];
        
        $form = CustomForm::find($id);
        
        if(!empty($form)){
            CustomForm::where('id', $id)->update($customForm);
            return Response::json([
                'result' => 200,
                'message' => 'success'
            ]);
        }
        else{
            return Response::json([
                'result' => 200,
                'message' => 'There is no data to update.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $form = CustomForm::find($id);
        
        if(empty($form)){
            return Response::json([
                'result' => 200,
                'message' => 'There is no data'
            ]);
        }
        CustomForm::where('id', $id)->delete($form);
        return Response::json([
            'result' => 200,
            'message' => 'success'
        ]);
    }
}
