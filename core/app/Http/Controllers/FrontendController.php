<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Deposit;
use App\Faq;
use App\FixDeposit;
use App\Investor;
use App\Language;
use App\Partner;
use App\Service;
use App\Setting;
use App\Slider;
use App\Subscribe;
use App\Transaction;
use App\User;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class FrontendController extends Controller
{



    public function cron()
    {



        $fixDeps = FixDeposit::where('status', 0)->get();

        $pdate = Carbon::now()->toDateString();


        foreach ($fixDeps as $fixDep) {

            $date = $fixDep->return_date;
            if ($date <= $pdate) {
                $fixDep['status'] = 1;
                $fixDep->save();

                $user = User::where('id', $fixDep->user_id)->first();
                $user->balance = $user->balance + $fixDep->return_total;
                $user->save();

                $tlog = new Transaction();
                $tlog['user_id'] = $user->id;
                $tlog['amount'] = $fixDep->return_total;
                $tlog['balance'] = $user->balance;
                $tlog['type'] = 1;
                $tlog['details'] = 'Receive balance from fixed deposit';
                $tlog['trxid'] = Str::random(30);
                $tlog->save();

                $gnl = Setting::first();


                $to = $user->email;
                $name = $user->username;
                $subject = "Receive balance from fixed deposit ";
                $message = "You receive balance from fixed deposit plan. You fixed deposit " . $gnl->cur . $fixDep->amount . " and get amount  " . $gnl->cur . $fixDep->return_total . "  ";
                send_email($to, $name, $subject, $message);

            }

        }


    }



    public function home()
    {



        $services = Service::all();
        $faqs = Faq::all();
        $blogs = Blog::latest()->take(3)->get();
        $slider = Slider::all();
        $investors = Investor::take(8)->get();

        $deps = Deposit::where('status', 1)->latest()->take(10)->get();
        $logs = Withdraw::where('status', 1)->latest()->take(10)->get();

        $totalUser = User::count();

        $totalDeposit = Deposit::where('status', 1)->sum('amount');
        $totalwid = Withdraw::where('status', 1)->sum('amount');

        return view('frontend.index', compact('faqs', 'services', 'blogs', 'slider',
            'investors', 'deps', 'logs', 'totalUser', 'totalDeposit', 'totalwid'));
    }



    public function login()
    {
        if (Auth::user()){
            return  redirect()->route('user.dashboard');
        }

        return view('frontend.login');

    }

    public function userlogin()
    {

        return redirect()->route('login');
    }



    public function registrationFrom()
    {
        $setting = Setting::first();
        $registration = $setting->registration;
        if ($registration == 1 )
            return view('frontend.register');
        else
            return redirect()->route('homePage')->withErrors('Registration temporary off');
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blogs', compact('blogs'));
    }

    public function singleBlog($id, $slug)
    {

        $blog = Blog::findOrfail($id);
        $latest = Blog::latest()->take(5)->get();
        return view('frontend.singleBlog', compact('blog', 'latest'));

    }

    public function contact()
    {
        return view('frontend.contact');
    }


    public function ContactSubmit(Request $request)
    {


        $this->validate($request,[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191',
            'subject'=>'required|max:191',
            'message'=>'required',
        ]);

        $gs = Setting::first();

        $from = $request->email;
        $to = $gs->email_from;
        $subject = $request->subject;
        $name = $request->name;
        $message = nl2br($request->message . "<br /><br />From <strong>" .$request->name . "</strong>");

        $headers = "From: $name <$from> \r\n";
        $headers .= "Reply-To: $name <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to, $subject, $message, $headers);

        return redirect()->back()->with('success','Your Mail send successfully');

    }



    public function subscribePost(Request $request)
    {

        $this->validate($request,[
            'email'=>'required|email|max:191',
        ]);
        $email =  Subscribe::where('email', $request->email)->first();

        if ($email == NULL)
        {
            $data = new Subscribe();
            $data->email = $request->email;
            $data->save();
            return redirect()->back()->with('success', 'Thanks for  Subscribe');

        }else{

            return redirect()->back()->withErrors('This email already taken');
        }

    }




    public function changeLang($lang)
    {


        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', strtolower($lang));
        return \redirect()->back();
    }



}
