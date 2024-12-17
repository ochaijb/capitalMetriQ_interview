<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class TransactionsController extends Controller
{
    /**
     * Perform a transaction.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Retrieve the user and calculate balances
        $user = User::find($request->user_id);
        $balanceBefore = $user->balance;
        $balanceAfter = $balanceBefore - $request->amount;

        // Retrieve the Service from the service id 
        $service = Service::find($request->service_id);
        $serviceName= $service->name;

        if ($balanceAfter < 0) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }

        // Deduct balance and create transaction
        $user->balance = $balanceAfter;
        $user->save();

        $transaction = Transactions::create([
            'reference' => uniqid('txn_'),      // Generate a unique reference
            'description' => 'Transaction for '.$serviceName. ' service ',
            'service_id' => $request->service_id,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'balance_before' => $balanceBefore,
            'balance_after' => $balanceAfter,
            'status' => 'completed',
        ]);

        return response()->json(['data' => $transaction], 201);
    }

    /**
     * Get transaction history for a user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function history(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $transactions = Transactions::where('user_id', $request->user_id)->get();

        return response()->json(['data' => $transactions], 200);
    }
}
