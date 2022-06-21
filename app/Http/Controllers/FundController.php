<?php

namespace App\Http\Controllers;

use App\Models\Fund;

use App\Models\Users;

use Illuminate\Http\Request;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // saving to Fund table
        $funds = Fund::create([
            'amount' => $request->amount,
            'paidOn' => $request->paidOn,
            'paymentDisc' => $request->paymentDisc,
            'paymentRef' => $request->paymentRef,
            'paymentStatus' => $request->paymentStatus,
            'transactionHash' => $request->transactionHash,
            'transactionRef' => $request->transactionRef,
            'user_id' => $id
        ]);
        $funds->save();
    

    return response()->json([
        "success" => "WALLET FUNDING SUCCESSFUL",
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
                $fundTrasfer = Fund::all();

                return response()->json([
                    'transactions' => $fundTrasfer
                ]);

            }else if($admin->isAdmin == 0){
                $fundTransfer = Fund::where('user_id',$id)->get();

                if ($fundTransfer == null || 0) {
                    return response()->json([
                        'transactions' => "You don't have any fund transactions"
                    ]);
                }
                else {
                    return response()->json([
                        'transactions' => $fundTransfer
                    ]);
                }
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
