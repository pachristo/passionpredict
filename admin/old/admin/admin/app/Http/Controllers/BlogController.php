<?php

namespace App\Http\Controllers;

use App\Blog;
use App\ImageValidator;
use App\ResponseFacade;
use App\System;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function newBlog()
    {
        return view('/nblog');
    }

    public function allBlogs()
    {
        $blogs = Blog::latest('created_at')->paginate(100);

        return view('/blogs', ['blogs' => $blogs]);
    }

    public function newBlogPost(Request $request, Blog $blog) {

        $blog->validateInput($request);
        $slug = str_slug($request['title'], '-');
        $filename = ImageValidator::validator($request['file'], 'blog');

        if($filename){
            $request['file']->move('images/blog', $filename);
        }
        $this->insertPost($request, $blog, $slug, $filename);
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function postBlogUpdate(Request $request, Blog $blog, $id, $image)
    {
        $blog->validateInput($request);
        $slug = str_slug($request['title'], '-');

        if ($request['file']) {
            ImageValidator::validator($request['file'], 'blog');
            $request['file']->move('images/blog', $image);
        }
        $blog = $blog->findBlog($id);

        $this->insertPost($request, $blog, $slug, $image);
        ResponseFacade::validationMessage('Ok', '0');
    }

    public function insertPost($request, $blog, $slug, $filename) {
        $creator = Auth::user()->id;

        $blog->creator = $creator;
        $blog->title = $request['title'];
        $blog->slug = $slug;
        $blog->category = $request['category'];
        $blog->status = $request['status'];
        $blog->content = $request['content'];
        $blog->display_image = $filename;
        $blog->save();
    }

    public function dpImageUpload(Request $request)
    {
        $id = $request['id'];
        $imagename = $request['image'];
        $dp = $request['file'];
        $dpname = "";

        if($dp){
            $dpname = $imagename;
            $dp->move('images/blog', $dpname);
        }

        $blog = Blog::latest('created_at')->paginate(100);
        return view('/blogs')->with(['success' => 'IMAGE CHANGED SUCCESSFULLY', 'blogs' => $blog]);

    }

    public function ajaxBlogDetail($blogcode)
    {
        $blog = Blog::find($blogcode);
        return view('ajaxfiles.blogdetail', ['blog' => $blog]);
    }

    public function ajaxBlogUpdate($bid)
    {
        $blog = Blog::where('id', $bid)->first();
        return view('ajaxfiles.blogupdate', ['blog' => $blog]);
    }

    public function ajaxBlogDelete($id=null)
    {
        $blog = Blog::find($id);
        if($blog->display_image!='') {
            unlink('images/blog/'.$blog->display_image);
        }

        Blog::destroy($id);
        return $id;
    }
}
