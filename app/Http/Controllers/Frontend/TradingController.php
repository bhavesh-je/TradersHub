<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;

class TradingController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(['auth','role:Admin|User|Basic Package User|Master Package User|Standard Package User']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserSignals()
    {
        // Check member
        $user_email = Auth::user()->email;

        $user_id = DB::connection('mysql2')->select( "SELECT id FROM wp_users WHERE user_email = '".$user_email."'" );
        
        // dd($user_id);   
        if( empty($user_id) ){
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".Auth::user()->id."' LIMIT 1" );
        } else {
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".$user_id[0]->id."' LIMIT 1" );
        }

        // Get Today and Tomorrow date
        $day =  date('l');
        if ( $is_member == '4' ) {
            if( $day == 'Monday' || $day == 'Thursday' ) {
                $today = date("Y-m-d");
                $tomorrow = date('Y-m-d');
            } else {
                $today = date("Y-m-d");
                $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
            }
        } else {
            $today = date("Y-m-d");
            $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
        }

        // Get signals
        $signals = DB::connection('mysql2')->select( "SELECT * FROM wp_signals WHERE signal_updated_time_gmt between '".$today."' and '".$tomorrow."' ORDER BY signal_created_time_gmt DESC" );

        // Get total signals with count 1
        $total_query = DB::connection('mysql2')->select( "SELECT COUNT(1) FROM wp_signals AS combined_table" );

        // Get total signals
        $totalQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals FROM wp_signals WHERE signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get won signals
        $totalWonQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_won FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get lost signals
        $totalLostQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_lost FROM wp_signals WHERE trade_status ='Lost' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get ongoing signals
        $totalOngoingQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_ongoing FROM wp_signals WHERE trade_status ='Yet to Know' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get pips
        $totalPipsQuery = DB::connection('mysql2')->select( "SELECT SUM(pips) as total_signals_pips FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );
        
        $tot = $totalQuery[0]->total_signals;
        $totWon = $totalWonQuery[0]->total_signals_won;

        // Set win rate
        if($tot =='0'){
            $winRate = '0';
        }
        else{
            $winRate = round(($totWon/$tot)*100);
        }

        // Set pips
        $totalPips = $totalPipsQuery[0]->total_signals_pips;
        if($totalPips == null){
            $pips = '0';
        }
        else{
            $pips = $totalPipsQuery[0]->total_signals_pips;
        }
        // dd($pips);

        return Inertia::render('Signals', ['signals' => $signals, 'totalQuery' => $totalQuery, 'totalWonQuery' => $totalWonQuery, 'totalLostQuery' => $totalLostQuery, 'totalOngoingQuery' => $totalOngoingQuery, 'totalPipsQuery' => $totalPipsQuery, 'winRate' => $winRate, 'pips' => $pips]);
    }

    public function userAffiliateRefferals()
    {
        $user_email = Auth::user()->email;

        $user_id = DB::connection('mysql2')->select( "SELECT id FROM wp_users WHERE user_email = '".$user_email."'" );

        $refferals = DB::connection('mysql2')->select( "SELECT * FROM wp_affiliate_wp_affiliates WHERE user_id = '".$user_id[0]->id."'" );
        dd($refferals);
    }

    public function UserSignalReposrts()
    {
        $user_email = Auth::user()->email;

        $daiy_signal_reports = $this->daily_signal_reports($user_email);

        $this_week_signal_reports = $this->this_week_signal_reports($user_email);

        $last_week_signal_reports = $this->last_week_signal_reports($user_email);

        $this_month_signal_reports = $this->this_month_signal_reports($user_email);

        return Inertia::render('SignalReports', [
            'daily_signals' => $daiy_signal_reports,
            'this_week_signals' => $this_week_signal_reports,
            'last_week_signals' => $last_week_signal_reports,
            'this_month_signals' => $this_month_signal_reports 
        ]);

    }

    // Function for get Daily Signal Reports
    public function daily_signal_reports($user_email)
    {
        $day =  date('l');

        $user_id = DB::connection('mysql2')->select( "SELECT id FROM wp_users WHERE user_email = '".$user_email."'" );
        
        if( empty($user_id) ){
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".Auth::user()->id."' LIMIT 1" );
        } else {
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".$user_id[0]->id."' LIMIT 1" );
        }

        // Get Today and Tomorrow date
        if ( $is_member == '4' ) {
            if( $day == 'Monday' || $day == 'Thursday' ) {
                $today = date("Y-m-d");
                $tomorrow = date('Y-m-d');
            } else {
                $today = date("Y-m-d");
                $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
            }
        } else {
            $today = date("Y-m-d");
            $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
        }

        // Get signals
        $signals = DB::connection('mysql2')->select( "SELECT * FROM wp_signals WHERE signal_updated_time_gmt between '".$today."' and '".$tomorrow."' ORDER BY signal_created_time_gmt DESC" );

        // Get total signals with count 1
        $total_query = DB::connection('mysql2')->select( "SELECT COUNT(1) FROM wp_signals AS combined_table" );

        // Get total signals
        $totalQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals FROM wp_signals WHERE signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get won signals
        $totalWonQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_won FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get lost signals
        $totalLostQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_lost FROM wp_signals WHERE trade_status ='Lost' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get ongoing signals
        $totalOngoingQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_ongoing FROM wp_signals WHERE trade_status ='Yet to Know' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );

        // Get pips
        $totalPipsQuery = DB::connection('mysql2')->select( "SELECT SUM(pips) as total_signals_pips FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$today' and '$tomorrow'" );
        
        $tot = $totalQuery[0]->total_signals;
        $totWon = $totalWonQuery[0]->total_signals_won;

        // Set win rate
        if($tot =='0'){
            $winRate = '0';
        }
        else{
            $winRate = round(($totWon/$tot)*100);
        }

        // Set pips
        $totalPips = $totalPipsQuery[0]->total_signals_pips;
        if($totalPips == null){
            $pips = '0';
        }
        else{
            $pips = $totalPipsQuery[0]->total_signals_pips;
        }

        return [
            'signals' => $signals, 
            'totalQuery' => $totalQuery, 
            'totalWonQuery' => $totalWonQuery, 
            'totalLostQuery' => $totalLostQuery, 
            'totalOngoingQuery' => $totalOngoingQuery, 
            'totalPipsQuery' => $totalPipsQuery, 
            'winRate' => $winRate, 
            'pips' => $pips
        ];
    }
    
    // Function for get Week Signal Reports
    public function this_week_signal_reports($user_email)
    {
        $day =  date('l');

        $user_id = DB::connection('mysql2')->select( "SELECT id FROM wp_users WHERE user_email = '".$user_email."'" );
        
        if( empty($user_id) ){
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".Auth::user()->id."' LIMIT 1" );
        } else {
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".$user_id[0]->id."' LIMIT 1" );
        }

        // Get Today and Tomorrow date
        if($is_member == '4'){
            if($day == 'Monday'){
                $d = strtotime("today");
                $start_week = strtotime("last monday midnight",$d);
                $end_week = strtotime("next saturday",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);
            }
            else if($day == 'Thursday'){
                $d = strtotime("today");
                $start_week = strtotime("last sunday midnight",$d);
                $end_week = strtotime("today");
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);
            }
            else{
                $d = strtotime("today");
                $start_week = strtotime("last sunday midnight",$d);
                $end_week = strtotime("next saturday",$d);
                $start = date("Y-m-d",$start_week);
                $end = date("Y-m-d",$end_week);
            }
        }
        else{
            $d = strtotime("today");
            $start_week = strtotime("last sunday midnight",$d);
            $end_week = strtotime("next saturday",$d);
            $start = date("Y-m-d",$start_week);
            $end = date("Y-m-d",$end_week);
        }

        // Get signals
        $signals = DB::connection('mysql2')->select( "SELECT * FROM wp_signals WHERE signal_updated_time_gmt between '".$start."' and '".$end."' ORDER BY signal_created_time_gmt DESC" );

        // Get total signals with count 1
        $total_query = DB::connection('mysql2')->select( "SELECT COUNT(1) FROM wp_signals AS combined_table" );

        // Get total signals
        $totalQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals FROM wp_signals WHERE signal_updated_time_gmt between '$start' and '$end'" );

        // Get won signals
        $totalWonQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_won FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get lost signals
        $totalLostQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_lost FROM wp_signals WHERE trade_status ='Lost' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get ongoing signals
        $totalOngoingQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_ongoing FROM wp_signals WHERE trade_status ='Yet to Know' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get pips
        $totalPipsQuery = DB::connection('mysql2')->select( "SELECT SUM(pips) as total_signals_pips FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$start' and '$end'" );
        
        $tot = $totalQuery[0]->total_signals;
        $totWon = $totalWonQuery[0]->total_signals_won;

        // Set win rate
        if($tot =='0'){
            $winRate = '0';
        }
        else{
            $winRate = round(($totWon/$tot)*100);
        }

        // Set pips
        $totalPips = $totalPipsQuery[0]->total_signals_pips;
        if($totalPips == null){
            $pips = '0';
        }
        else{
            $pips = $totalPipsQuery[0]->total_signals_pips;
        }

        return [
            'signals' => $signals, 
            'totalQuery' => $totalQuery, 
            'totalWonQuery' => $totalWonQuery, 
            'totalLostQuery' => $totalLostQuery, 
            'totalOngoingQuery' => $totalOngoingQuery, 
            'totalPipsQuery' => $totalPipsQuery, 
            'winRate' => $winRate, 
            'pips' => $pips
        ];
    }

    // Function for get Last Week Signal Reports
    public function last_week_signal_reports($user_email)
    {
        $day =  date('l');
        $d = strtotime("today");
        $start_week = strtotime("sunday last week -1 week",$d);
        $end_week = strtotime("last week sunday midnight",$d);
        $start = date("Y-m-d",$start_week);
        $end = date("Y-m-d",$end_week);

        $user_id = DB::connection('mysql2')->select( "SELECT id FROM wp_users WHERE user_email = '".$user_email."'" );
        
        if( empty($user_id) ){
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".Auth::user()->id."' LIMIT 1" );
        } else {
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".$user_id[0]->id."' LIMIT 1" );
        }

        // Get Today and Tomorrow date
        

        // Get signals
        $signals = DB::connection('mysql2')->select( "SELECT * FROM wp_signals WHERE signal_updated_time_gmt between '".$start."' and '".$end."' ORDER BY signal_created_time_gmt DESC" );

        // Get total signals with count 1
        $total_query = DB::connection('mysql2')->select( "SELECT COUNT(1) FROM wp_signals AS combined_table" );

        // Get total signals
        $totalQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals FROM wp_signals WHERE signal_updated_time_gmt between '$start' and '$end'" );

        // Get won signals
        $totalWonQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_won FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get lost signals
        $totalLostQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_lost FROM wp_signals WHERE trade_status ='Lost' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get ongoing signals
        $totalOngoingQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_ongoing FROM wp_signals WHERE trade_status ='Yet to Know' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get pips
        $totalPipsQuery = DB::connection('mysql2')->select( "SELECT SUM(pips) as total_signals_pips FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$start' and '$end'" );
        
        $tot = $totalQuery[0]->total_signals;
        $totWon = $totalWonQuery[0]->total_signals_won;

        // Set win rate
        if($tot =='0'){
            $winRate = '0';
        }
        else{
            $winRate = round(($totWon/$tot)*100);
        }

        // Set pips
        $totalPips = $totalPipsQuery[0]->total_signals_pips;
        if($totalPips == null){
            $pips = '0';
        }
        else{
            $pips = $totalPipsQuery[0]->total_signals_pips;
        }

        return [
            'signals' => $signals, 
            'totalQuery' => $totalQuery, 
            'totalWonQuery' => $totalWonQuery, 
            'totalLostQuery' => $totalLostQuery, 
            'totalOngoingQuery' => $totalOngoingQuery, 
            'totalPipsQuery' => $totalPipsQuery, 
            'winRate' => $winRate, 
            'pips' => $pips
        ];
    }

    // Function for get This Month Signal Reports
    public function this_month_signal_reports($user_email)
    {
        $day =  date('l');

        $user_id = DB::connection('mysql2')->select( "SELECT id FROM wp_users WHERE user_email = '".$user_email."'" );
        
        if( empty($user_id) ){
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".Auth::user()->id."' LIMIT 1" );
        } else {
            $is_member = DB::connection('mysql2')->select( "SELECT membership_id FROM wp_pmpro_memberships_users WHERE status = 'active' AND membership_id = '4' AND user_id = '".$user_id[0]->id."' LIMIT 1" );
        }

       // Get Today and Tomorrow date
       if ( $is_member == '4' ) {
            if($day == 'Monday'){
                $d = strtotime("today");
                $month_start = strtotime('first day of this month', $d);
                $month_end = strtotime($d);
                $start = date("Y-m-d",$month_start);
                $end = date("Y-m-d",$month_end);
            }
            else if($day == 'Thursday'){
                $d = strtotime("today");
                $month_start = strtotime('first day of this month', $d);
                $month_end = strtotime($d);
                $start = date("Y-m-d",$month_start);
                $end = date("Y-m-d",$month_end);
            }
            else{
                $d = strtotime("today");
                $month_start = strtotime('first day of this month', $d);
                $month_end = strtotime('last day of this month', $d);
                $start = date("Y-m-d",$month_start);
                $end = date("Y-m-d",$month_end);
            }
        } else {
            $d = strtotime("today");
            $month_start = strtotime('first day of this month', $d);
            $month_end = strtotime('last day of this month', $d);
            $start = date("Y-m-d",$month_start);
            $end = date("Y-m-d",$month_end);
        }
        


        // Get signals
        $signals = DB::connection('mysql2')->select( "SELECT * FROM wp_signals WHERE signal_updated_time_gmt between '".$start."' and '".$end."' ORDER BY signal_created_time_gmt DESC" );

        // Get total signals with count 1
        $total_query = DB::connection('mysql2')->select( "SELECT COUNT(1) FROM wp_signals AS combined_table" );

        // Get total signals
        $totalQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals FROM wp_signals WHERE signal_updated_time_gmt between '$start' and '$end'" );

        // Get won signals
        $totalWonQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_won FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get lost signals
        $totalLostQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_lost FROM wp_signals WHERE trade_status ='Lost' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get ongoing signals
        $totalOngoingQuery = DB::connection('mysql2')->select( "SELECT COUNT(id) as total_signals_ongoing FROM wp_signals WHERE trade_status ='Yet to Know' AND signal_updated_time_gmt between '$start' and '$end'" );

        // Get pips
        $totalPipsQuery = DB::connection('mysql2')->select( "SELECT SUM(pips) as total_signals_pips FROM wp_signals WHERE trade_status ='Won' AND signal_updated_time_gmt between '$start' and '$end'" );
        
        $tot = $totalQuery[0]->total_signals;
        $totWon = $totalWonQuery[0]->total_signals_won;

        // Set win rate
        if($tot =='0'){
            $winRate = '0';
        }
        else{
            $winRate = round(($totWon/$tot)*100);
        }

        // Set pips
        $totalPips = $totalPipsQuery[0]->total_signals_pips;
        if($totalPips == null){
            $pips = '0';
        }
        else{
            $pips = $totalPipsQuery[0]->total_signals_pips;
        }

        return [
            'signals' => $signals, 
            'totalQuery' => $totalQuery, 
            'totalWonQuery' => $totalWonQuery, 
            'totalLostQuery' => $totalLostQuery, 
            'totalOngoingQuery' => $totalOngoingQuery, 
            'totalPipsQuery' => $totalPipsQuery, 
            'winRate' => $winRate, 
            'pips' => $pips
        ];
    }

}
