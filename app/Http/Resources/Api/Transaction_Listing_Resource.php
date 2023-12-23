<?php

namespace App\Http\Resources\Api;

use App\Transaction;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Transaction_Listing_Resource extends JsonResource
{

    public function toArray($request)
    {
        $req_type = $request->type;
        $my_id = $request->user()->id;
        $data = [
            'id' => $this->id,
            'transaction_id' => $this->transaction_id,
            'amount' => $this->amount,
            'charge' => $this->charge,
            'total' => $this->total,
            'status' => $this->status,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_own_transaction' => ($request->type == 1 || $this->from_user_id == $my_id) ? 1 : 0,
            'transactions' => [],
        ];
        //        1==top Up &&2 ==sent && 3== receive
        $transaction_id = $data['transaction_id'];
//        if (in_array($req_type, [2, 3])) {
        if ($this->type == "transfer") {
//            $relation_ship_type = ($req_type == 2) ? "receiver" : "sender";
            $relation_ship_type = ($this->user_id == $my_id) ? "receiver" : "sender";
            $transactions = Transaction::where(['transaction_id' => $transaction_id]);
            if ($relation_ship_type == 'receiver') {
                //            if ($req_type == 3) {
                $transactions = $transactions->where('user_id', $my_id);
            }
            $transactions = $transactions->has($relation_ship_type)->with([$relation_ship_type => function ($user) {
                $user->SimpleDetails();
            }])->get();
            foreach ($transactions as $transaction) {
                $data['transactions'][] = [
                    'id' => $transaction->id,
                    'status' => $transaction->status,
                    'amount' => $transaction->amount,
                    'charge' => $transaction->charge,
                    'total' => $transaction->total,
                    'created_at' => $transaction->created_at,
                    'updated_at' => $transaction->updated_at,
                    'user' => $transaction[$relation_ship_type],
                ];
            }
        }
        return $data;
    }
}
