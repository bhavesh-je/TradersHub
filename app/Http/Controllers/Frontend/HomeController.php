<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentsLikes;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\FAQ;
use App\Models\Post;
use App\Models\VideoPost;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth');
    }

    public function getFaqs()
    {
        $faqs = FAQ::orderBy('id', 'desc')->get();
        return Inertia::render('Faq', ['faqs' => $faqs]);
    }

    public function index(Request $request)
    {
        // dd($request->all());
        // $userAuth = Auth::user()->getRoleNames();
        $maxlen = Post::where('post_status', 1)->count();
        // $allPost = Post::where('post_status',1)->limit(5)->get();
        $allPost = Post::with('getPostCommentProfile')->withCount('getTotalComment')->withCount('getPostLikes')->withCount('isLiked')->where('post_status', 1)->orderBy('id', 'desc')->get();

        $allPostComment = Comment::with('getPostCommentLikes')->orderBy('id', 'desc')->get();
        
        // Get likes
        $likes = Like::orderBy('created_at', 'desc')->get();

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
        $signalsSata = ['signals' => $signals, 'totalQuery' => $totalQuery, 'totalWonQuery' => $totalWonQuery, 'totalLostQuery' => $totalLostQuery, 'totalOngoingQuery' => $totalOngoingQuery, 'totalPipsQuery' => $totalPipsQuery, 'winRate' => $winRate, 'pips' => $pips];

        return Inertia::render('Dashboard', [Auth::user()->getRoleNames(), 'posts' => $allPost, 'maxlen' => $maxlen,'signalsSata' => $signalsSata,'postCommentLike'=>$allPostComment]);
    }

    public function postget(Request $request)
    {
        // dd($request->all());
        // DB::enableQueryLog();
        // $getData = $request->all();

        $allPost = Post::where('post_status', 1)->skip($request->from)->limit($request->to)->get();
        // dd(DB::getQueryLog());
        // dd($rallPost);

        return response()->json($allPost);
    }

    public function show($id)
    {
        // $showPost = Post::where('id',$id)->get();
        $showPost = Post::find($id);
        return Inertia::render('Post', ['posts' => $showPost]);
    }

    public function videoPosts()
    {
        $videoPosts = VideoPost::orderBy('id', 'desc')->get();
        $maxlength = count($videoPosts);
        return Inertia::render('Videos', [Auth::user()->getRoleNames(), 'videoPosts' => $videoPosts, 'maxlength' => $maxlength]);
    }

    // Render the spotify podcast
    public function getPodcast()
    {
        return Inertia::render('Podcast');
    }

    // Render the Currency Heat Calculator
    public function getCurrencyHeatCalculator()
    {
        return Inertia::render('CurrencyHeatCalculator');
    }

    public function postLikeDislike(Request $request)
    {
        $user = $request->params['user'];
        $post = $request->params['post'];
        $isLike = $request->params['like'];
        $user_liked = Like::where('user_id', $user)->where('post_id', $post)->count();
        // dd($user_liked);
        $data = array();
        // if( $user_liked > 0 ){
        //     $like = [
        //         'likeable_type' => 'post',
        //         'like_type' => 0,
        //         'post_id' => $post,
        //         'user_id' => $user,
        //     ];
        // } else {
        //     $like = [
        //         'likeable_type' => 'post',
        //         'like_type' => 1,
        //         'post_id' => $post,
        //         'user_id' => $user,
        //     ];
        // }
        if( $user_liked > 0 ) { // For update like if record not exist
            // update like
            if( $isLike ){
                $like = [
                    'like_type' => 0,
                ];
                Like::where('post_id', $post)->where('user_id', $user)->update($like);
                $data['msg'] = 'Unlike successfully.';
            }else{
                $like = [
                    'like_type' => 1,
                ];
                $data['msg'] = 'Like successfully.';
                Like::where('post_id', $post)->where('user_id', $user)->update($like);
            }
        } else { //For add or update like if record not exist
            if( $isLike ){
                $like = [
                    'like_type' => 0,
                ];
                Like::where('post_id', $post)->where('user_id', $user)->update($like);
                $data['msg'] = 'Unlike successfully.';
            }else{
                $like = [
                    'likeable_type' => 'post',
                    'like_type' => 1,
                    'post_id' => $post,
                    'user_id' => $user,
                ];
                $data['msg'] = 'Like successfully.';
                Like::create($like);
            }
        }
        $getLikes = Like::with('likesUsers')->where('post_id', $post)->where('like_type', 1)->count();
        $data['LikedUsersImgs'] = Like::select('likes.id', 'users.id', 'users.profile_img', 'users.name')->join('users', 'likes.user_id', '=', 'users.id')->where('likes.like_type',1)->where('likes.post_id', $post)->get();
        $data['user_liked'] = $user_liked;
        $data['liked'] = $like;
        $data['total_like'] = $getLikes;
        return response()->json([
            'message'=>'success',
            'result' => $data,
        ]);
    }

    public function getLikeUsersImgs(Request $request)
    {
        $post = $request->params['post'];
        $data = array();
        $data['LikedUsersImgs'] = Like::select('likes.id', 'users.id', 'users.profile_img', 'users.name')->join('users', 'likes.user_id', '=', 'users.id')->where('likes.like_type',1)->where('likes.post_id', $post)->get();
        // $data['LikedUsersImgs'] = Like::with('likesUsers')->where('post_id', $post)->where('like_type',1)->get();
        $data['userLikes'] = Like::where('post_id', $post)->where('user_id', Auth::user()->id)->exists();
        return response()->json([
            'message'=>'success',
            'result' => $data,
        ]);
    }

    public function testAuth(Request $request){
        return response()->json([
            "myAuth" => Auth::user()->getRoleNames(),
            "authData" => Auth::user(),
        ]);
    }

    public function storePostComment(Request $request)
    {
        // dd($request->comment);
        if($request->comment == ""){
            return response()->json(["errors"=>"Comment box is empty"]);
        }else{
            $storeData = new Comment();
            $storeData->comment = $request->comment;
            $storeData->post_id = $request->post_id;
            $storeData->user_id = $request->user_id;
            $storeData->save();
            return response()->json(["success"=>"Comment added successfully!"]);
        }
    }

    public function getPostComment(Request $request)
    {
        // dd($request->post_id); 
        $allcommentbypost = Comment::with('commnetUsers')->with('getPostCommentLikes')->where('post_id',$request->post_id)->get();
        // dd($allcommentbypost);
        // $userData = $data = array();
        // foreach($allcommentbypost as $key => $value){
        //     $data[] = $value['user_id'];
        // }
        // // dd($data);
        // $userData = User::whereIn('id',$data)->get();
        // return response()->json(['allCommnets'=>$allcommentbypost,'userData'=>$userData]);
        return response()->json(['allCommnets'=>$allcommentbypost]);
    }

    public function postCommentLike(Request $request)
    {
        $storeCommentLike = CommentsLikes::where(['post_id'=>$request->post_id,'user_id'=>$request->user_id,'comment_id'=>$request->comment_id])->count();
        $data = array();
        if($storeCommentLike > 0){
            if( $request->like ){
                $like = [
                    'is_like' => 0,
                ];
                CommentsLikes::where(['post_id'=>$request->post_id,'user_id'=>$request->user_id,'comment_id'=>$request->comment_id])->update($like);
                $data['msg'] = 'Unlike successfully 1.';
            }else{
                $like = [
                    'is_like' => 1,
                ];
                $data['msg'] = 'Like successfully 2.';
                CommentsLikes::where(['post_id'=>$request->post_id,'user_id'=>$request->user_id,'comment_id'=>$request->comment_id])->update($like);
            }
        }else{
            if( $request->like ){
                $like = [
                    'is_like' => 0,
                ];
                CommentsLikes::where(['post_id'=>$request->post_id,'user_id'=>$request->user_id,'comment_id'=>$request->comment_id])->update($like);
                $data['msg'] = 'Unlike successfully 3.';
            }else{
                $like = [
                    'is_like' => 1,
                ];
                $storLike = new CommentsLikes();
                $storLike->is_like = 1;
                $storLike->post_id = $request->post_id;
                $storLike->user_id = $request->user_id;
                $storLike->comment_id = $request->comment_id;
                $storLike->save();
                $data['msg'] = 'Like successfully 4.';
            }
        }
        $data['liked'] = $like;
        return response()->json([
            'message'=>'success',
            'result' => $data,
        ]);
    }

    public function getPostCommentLikes(Request $request)
    {
        $getLikePost = CommentsLikes::select('is_like')->where(['comment_id'=>$request->comment_id,'post_id'=>$request->post_id,'user_id'=>$request->user_id])->get();

        return response()->json($getLikePost);
    }
}