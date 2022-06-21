<?php

namespace App\Http\Controllers;

use App\Models\wallet;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function save(Request $request, $id) 
    {

        if ($request->isSuccess == "true") {
            if ($request->status == "payment") {
                $walletuser = wallet::where('user_id', $id)->latest()->first();
                if ($walletuser == null || 0) {
                    $amt = 0;
                    $wallet = new wallet();
                    $wallet->user_id = $id;
                    $wallet->wallet_amount = $amt + $request->amount;
                    $wallet->description = "Wallet funding";
                    $wallet->save();

                    return response()->json([
                        "Description" => "Account Funded Successful",
                        "By" => $wallet->user_id,
                        "Amount" => $wallet->wallet_amount
                    ], 200);
                }else {
                    $amt = $walletuser->wallet_amount;
                    $wallet = new wallet();
                    $wallet->user_id = $id;
                    $wallet->wallet_amount = $amt + $request->amount;
                    $wallet->description = "Wallet funding";
                    $wallet->save();

                    return response()->json([
                        "Description" => "Account Funded Successful",
                        "By" => $wallet->user_id,
                        "Amount" => $wallet->wallet_amount
                    ], 200);
                }
            }else if ($request->status == "recharge") {

                $walletuser = Wallet::where('user_id',$id)->latest()->first();
                if ($walletuser == null || 0) {
                    $wallet = new Wallet();
                    $wallet->wallet_amount = $request->amount;
                    $wallet->user_id = $id;
                    $wallet->save();

                    return response()->json([
                        "Status" => "Recharge Succesful",
                        "By" => $wallet->user_id,
                        "Amount" => $wallet->wallet_amount,
                    ], 200);
                }else {
                    $amt = $walletuser->wallet_amount;
                    $wallet = new Wallet();
                    $wallet->wallet_amount =$amt - $request->amount;
                    $wallet->user_id = $id;
                    $wallet->save();

                    return response()->json([
                        "Status" => "Recharge Succesful",
                        "By" => $wallet->user_id,
                        "Amount" => $wallet->wallet_amount,
                    ], 200);
                }
            }
        }else {
            return response()->json([
               'error' => 'Request is not successful'
           ], 400);
        }
    }

    public function get_wallet(Request $request, $id) 
    {
        $walletuser = wallet::where('user_id', $id)->latest()->first();

        return response()->json([
            'Amount' => $walletuser->wallet_amount,
            'Description' => $walletuser->description
        ], 400);
    }
}
