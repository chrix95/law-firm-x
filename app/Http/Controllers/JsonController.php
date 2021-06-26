<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mail\WelcomeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class JsonController extends Controller
{
    public function __construct(UtilsController $utils)
    {
        $this->utils = $utils;
    }

    public function store(Request $request)
    {
        $data = array(
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'legal_counsel' => $request->legal_counsel,
            'dob' => $request->dob,
            'case_detail' => $request->case_detail,
        );
        $validator = \Validator::make($data, [
            'firstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'legal_counsel' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:clients',
            'dob' => 'required|date',
            'case_detail' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        } else {
            if ($request->hasFile('image')) {
                $validator = \Validator::make($request->only('image'), [
                    'image' => 'required|file|image|mimetypes:image/jpeg,image/jpg,image/png',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => "Invalid image type (jpeg, jpg or png)",
                    ], 422);
                }
                $fileName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('upload'), $fileName);
                $data['image'] = 'upload/' . $fileName;
            }
            $data['client_id'] = $this->utils->generateReference();
            try {
                $client = Client::create($data);
                // Send welcome email to client
                if ($client) {
                    $when = now()->addMinutes(1);
                    Mail::to($client->email)->later($when, new WelcomeClient($client));
                    return response()->json([
                        'status' => true,
                        'message' => "Client profile has been uploaded",
                    ], 200);
                }
            } catch (\Throwable $th) {
                \Log::info($th);
                return response()->json([
                    'status' => false,
                    'message' => "An internal error occured",
                ], 500);
            }
        }
    }

}
