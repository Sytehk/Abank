<?php

namespace App\Http\Controllers;

use App\Loan;
use App\LoanPackage;
use App\Setting;
use App\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoanController extends Controller
{
    public function loan()
    {

    }

    public function loanPackage()
    {

        $paks = LoanPackage::latest()->paginate(15);
        return view('admin.loanManagement.loanPak', compact('paks'));
    }

    public function loanRequest()
    {
        $loanRequests =  Loan::latest()->paginate(15);
        return view('admin.loanManagement.loanRequest', compact('loanRequests'));
    }

    public function loanPackageAdd(Request $request)
    {

        $this->validate($request,[
            'name'=>  'required|max:191',
            'days'=>  'required|integer',
            'status'=>  'required',
            'min_amount'=>  'required|numeric',
            'max_amount'=>  'required|numeric',
            'fixed_charge'=>  'required|numeric',
            'percent_charge'=>  'required|numeric',

        ]);

        $paks = new LoanPackage();

        $paks->name = $request->name;
        $paks->days = $request->days;
        $paks->status = $request->status;
        $paks->min_amount = $request->min_amount;
        $paks->max_amount = $request->max_amount;
        $paks->fixed_charge = $request->fixed_charge;
        $paks->percent_charge = $request->percent_charge;
        $paks->save();
        return redirect()->back()->withSuccess('Successfully Added');
    }

    public function loanPackageUpdate(Request $request)
    {

        $this->validate($request,[
            'name'=>  'required|max:191',
            'days'=>  'required|integer',
            'status'=>  'required',
            'min_amount'=>  'required|numeric',
            'max_amount'=>  'required|numeric',
            'fixed_charge'=>  'required|numeric',
            'percent_charge'=>  'required|numeric',

        ]);

        $paks = LoanPackage::findOrfail($request->id);

        $paks->name = $request->name;
        $paks->days = $request->days;
        $paks->status = $request->status;
        $paks->min_amount = $request->min_amount;
        $paks->max_amount = $request->max_amount;
        $paks->fixed_charge = $request->fixed_charge;
        $paks->percent_charge = $request->percent_charge;
        $paks->save();
        return redirect()->back()->withSuccess('Successfully updated');

    }

    public function loanRequestUpdate(Request $request)
    {

        $data = Loan::findOrFail($request->id);

        if ($data->status != 0)
        {
            return redirect(404);
        }

        $user = User::find($data->user_id);

        if ($request->status == 1)
        {
            $data->status = $request->status;
            $data->return_date = Carbon::now()->addDays($request->days);
            $data->save();

            $user->balance += $data->amount;
            $user->save();

            $tlog = new Transaction();
            $tlog['user_id'] = $user->id;
            $tlog['amount'] = $data->amount;
            $tlog['balance'] = $user->balance;
            $tlog['type'] = 1;
            $tlog['details'] = 'Receive balance from loan request';
            $tlog['trxid'] = Str::random(16);
            $tlog->save();

            $gnl = Setting::first();

            $to = $user->email;
            $name = $user->username;
            $subject = "Receive balance from loan request ";
            $message = "You Receive balance from loan request. You got " . $gnl->cur . $data->amount . " and you will return amount  " . $gnl->cur . $data->total_pay_amount . " Loan return last date ".$data->return_date." ";
            send_email($to, $name, $subject, $message);


        }
        if ($request->status != 1)
        {
            $data->status = $request->status;
            $data->save();
        }


        if ($request->status == 3)
        {

            $to = $user->email;
            $name = $user->username;
            $subject = "Loan request rejected";
            $message = "Your loan request rejected.";
            send_email($to, $name, $subject, $message);
        }

        return redirect()->back()->withSuccess('Successfully updated');

    }









}
