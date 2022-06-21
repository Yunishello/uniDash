<?php

namespace App\Http\Controllers;

use App\Models\Trans;

use App\Models\Users;

use Illuminate\Http\Request;

class TransController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // saving to trasanction table
            $trans = Trans::create([
                'status' => $request->status,
                'product_name' => $request->product_name,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'trans_id' => $request->trans_id,
                'reqId' => $request->reqId,
                'user_id' => $id
            ]);
            $trans->save();
        

        return response()->json([
            "success" => "TRANSACTION SUCCESSFUL",
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Users::find($id);
        
            if ($admin->isAdmin == 1) {
                $transaction = Trans::all();

                return response()->json([
                    'transactions' => $transaction
                ]);

            }else if ($admin->isAdmin == 0)  {
                $transaction = Trans::where('user_id',$id)->get();

                return response()->json([
                    'transactions' => $transaction
                ]);
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_user = Trans::where('user_id', $id)->where('trans_id','sdfdhfjhvfhvifjv8977653')->delete();

        return response()->json([
            'Record Deleted'
        ]);
    }
}
