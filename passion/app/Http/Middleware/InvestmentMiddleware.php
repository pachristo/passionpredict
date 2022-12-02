<?php

namespace App\Http\Middleware;

use App\Solos\Modules\User\Model\User;
use Carbon\Carbon;
use Closure;

class InvestmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (currentUser() && currentUser()->subscription_status=='1'){
            if (currentUser()->next_due_date<=Carbon::now()->format('Y-m-d H:i:s')){
                User::where('id', currentUser()->id)->update(['subscription_status'=>'0']);
            }
        }
        if (currentUser()->subscription_status=='0')
        {
            if (currentUser()->sub_count=='0') {
                $request->session()->flash("error", "OOPS! YOU NEED TO SUBSCRIBE TO SUPER INVESTMENT TIPS TO ACCESS. <br> <span class='text-red'>SELECT ONE OF OUR VIP PLANS</span>");
            }
            else {
                $plan = strtoupper(currentUser()->sub->category);
                $duration = strtoupper(currentUser()->sub->accessTime);
                $date = strtoupper(Carbon::parse(currentUser()->next_due_date)->diffForHumans());
                $request->session()->flash("error", "OOPS, YOUR VIP PACKAGE <strong style='color: darkgreen'>$plan </strong> OF <strong>$duration</strong> HAS EXPIRED <strong style='color: darkred'>$date</strong> <br> <span class='text-red'>. PICK A PLAN BELOW</span>");
            }
            return redirect('/pricing');
        }
        elseif (currentUser()->sub->id=='5'|| currentUser()->sub->id=='6' || currentUser()->sub->id=='7') return $next($request);
        else
        {
            $request->session()->flash("error", "YOUR ACTIVE VIP PACKAGE DOES NOT HAVE ACCESS TO THIS <strong>VIP STORE</strong>");
            return redirect('/dashboard');
        }
    }
}
