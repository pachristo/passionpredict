<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\ImageValidator;
use App\Solos\Modules\Comment\Model\Comment;
use App\Solos\Modules\Story\Model\Story;
use App\Solos\Modules\User\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialMediaController extends Controller
{
    public function getIndex()
    {
        if (currentUser())
            return redirect('/social/timeline');
        Session::put('loginRedirect', route('/social/timeline'));
        return view('social.index');
    }

    public function getProfile()
    {
        return view('social.profile');
    }

    public function getUserPage($id, $name)
    {
        $usr_p = User::whereId($id)->whereFullName($name)->first();
        if ($usr_p) return view('social.userpage', compact('usr_p'));
        return redirect()->back();
    }

    public function getTimeline()
    {
        return view('social.timeline');
    }

    public function post_share_story(Request $request)
    {
        $images = [];
        $raw = $request->except('_token');

        //validate input
        $data_s = Helper::sanitizeInput($raw);

        // loop and reduce picture
        if (isset($raw['picture']))
        {
            for ($i=0; $i < count($raw['picture']); $i++)
            {
                ImageValidator::validator($raw['picture'][$i]);
                array_push($images, Helper::upload_picture($raw['picture'][$i], 'posts', currentUser()->email));
            }
        }

        // json encode picture url
        $data['pictures'] = json_encode($images);

        // save to db
        $data['user_id'] = currentUser()->id;
        $data['content'] = $data_s['content'];
        $id = Story::create($data)->id;

        $posts = Story::whereId($id)->get();
        return view('social.ajax.feed', compact('posts'));
        // return response
    }

    public function post_share_post(Request $request)
    {
        $raw = $request->except('_token');
        //validate input
        $d = Helper::sanitizeInput($raw);

        $main_post = Story::find($d['post_id']);

        $data['shared'] = '1';
        $data['user_id'] = currentUser()->id;
        $data['content'] = $main_post->content;
        $data['pictures'] = $main_post->pictures;
        $data['sharer_id'] = $main_post->user_id;
        $data['share_comment'] = $d['share_comment'];
        $data['post_date'] = $main_post->created_at;

        // save to db
        $id = Story::create($data)->id;

        $posts = Story::whereId($id)->get();
        return view('social.ajax.feed', compact('posts'));
        // return response
    }

    public function get_fetch_posts($index)
    {
        $posts = Story::latest()->skip($index)->take(25)->get();
        $view =  view('social.ajax.feed', compact('posts'));
        return $view->render();
    }

    public function get_fetch_my_posts($id=null)
    {
        if (isset($id)) $posts = Story::latest()->whereUserId($id)->orWhere('sharer_id', $id)->get();
        else $posts = Story::latest()->whereUserId(currentUser()->id)->orWhere('sharer_id', currentUser()->id)->get();
        $view =  view('social.ajax.feed', compact('posts'));
        return $view->render();
    }

    public function get_like_post($id)
    {
        $ex_likes = [];
        $post = Story::find($id);
        $likes = $post->likes;
        if ($likes) {
            $ex_likes = json_decode($likes);
            if (in_array(currentUser()->id, $ex_likes)) return 'Ok';
        }
        array_push($ex_likes, currentUser()->id);
        Story::whereId($id)->update(['likes'=>json_encode($ex_likes)]);
        return 'Ok';
    }

    public function post_comment(Request $request)
    {
        $data = Helper::sanitizeInput($request->except('_token'));
        Comment::create($data);
        $photo = img(currentUser()->passport, 'users/');
        $comment = $data['comment'];
        $name = currentUser()->full_name;
        $time = Carbon::now()->diffForHumans();
        $comment = "<li><div class='comet-avatar'><img src='$photo' alt=''></div><div class='we-comment'><div class='coment-head'><h5><a href='time-line.html' title=''>$name</a></h5><span>$time</span></div><p>$comment</p></div></li>";
        return $comment;
    }

    public function get_delete_comment($id)
    {
        Comment::whereId($id)->delete();
        return 'Ok';
    }

    public function get_toggle_comment($id, $key)
    {
        Story::whereId($id)->update(['allow_comment'=>$key]);
        return 'Ok';
    }

    public function get_delete_post($id)
    {
        $s = Story::find($id);
        if ($s->pictures)
        {
            foreach(json_decode($s->pictures) as $p){
                unlink('images/'.$p);
            }
        }
        Comment::wherePostId($id)->delete();
        Story::whereId($id)->delete();
        return 'Ok';
    }

    public function get_post($id)
    {
        $p = Story::find($id);
        return view('social.single_post', compact('p'));
    }

    public function get_edit_profile()
    {
        return view('social.edit_profile');
    }

    public function getPeople()
    {
        $follow = [];
        if (isset(currentUser()->following)) $follow = json_decode(currentUser()->following);

        $users = User::whereStatus('0')->where('id', '!=', currentUser()->id)->whereNotIn('id', $follow)->paginate(20);
        return view('social.follow', compact('users'));
    }

    public function post_search(Request $request)
    {
        $term = $request->term;

        $users = User::whereStatus('0')->where('id', '!=', currentUser()->id)->where('full_name', 'like', '%'.$term.'%')->where('username', 'like', '%'.$term.'%')->paginate(10000);
        return view('social.follow', compact('users'));
    }

    public function get_follow_user($id)
    {
        $my_follow = [];
        $user_follower = [];

        $following = currentUser()->following;
        if ($following) {
            $my_follow = json_decode($following);
            if (in_array($id, $my_follow)) return 'Ok';
        }
        array_push($my_follow, $id);
        User::whereId(currentUser()->id)->update(['following'=>json_encode($my_follow)]);

        $usr = User::find($id);
        $usr_follower = $usr->follower;
        if ($user_follower)
        {
            $user_follower = json_decode($usr_follower);
            if (in_array(currentUser()->id, $user_follower)) return 'Ok';
        }
        array_push($user_follower, currentUser()->id);
        User::whereId($id)->update(['follower'=>json_encode($user_follower)]);

        return 'Ok';
    }

    public function get_unfollow_user($id)
    {
        $my_followw = [];
        $user_followerr = [];

        $following = currentUser()->following;
        $my_follow = json_decode($following);

        $key = array_search($id, $my_follow);
        if (false !== $key) {
            unset($my_follow[$key]);
        }
        if (!empty($my_follow)){
            foreach ($my_follow as $i) array_push($my_followw, $i);
        }
        User::whereId(currentUser()->id)->update(['following'=>json_encode($my_followw)]);

        $usr = User::find($id);
        $usr_follower = $usr->follower;
        $user_follower = json_decode($usr_follower);

        $key = array_search(currentUser()->id, $user_follower);
        if (false !== $key) {
            unset($user_follower[$key]);
        }
        if (!empty($user_follower)){
            foreach ($user_follower as $i) array_push($user_followerr, $i);
        }
        User::whereId($id)->update(['follower'=>json_encode($user_followerr)]);

        return 'Ok';
    }

    public function get_followers($id=null, $name=null)
    {
        $usr_p = null;
        $u_key = 'follower';
        $users = [];

        if ($id) {
            $usr_p = User::whereId($id)->whereFullName($name)->first();
            $ff = json_decode($usr_p->follower);
        }
        else { $ff = json_decode(currentUser()->follower); }

        if ($ff) $users = User::whereIn('id', $ff)->paginate(25);
        return view('social.follower', compact('users', 'usr_p', 'u_key'));
    }

    public function get_following($id=null, $name=null)
    {
        $usr_p = null;
        $u_key = 'following';
        $users = [];

        if ($id) {
            $usr_p = User::whereId($id)->whereFullName($name)->first();
            $ff = json_decode($usr_p->following);
        }
        else { $ff = json_decode(currentUser()->following); }

        if ($ff) $users = User::whereIn('id', $ff)->paginate(25);
        return view('social.follower', compact('users', 'usr_p', 'u_key'));
    }
}
