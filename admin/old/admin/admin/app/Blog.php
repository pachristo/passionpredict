<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function creator()
    {
        return $this->belongsTo('App\System', 'creator');
    }

    public function findBlog($id) {
        return $this->find($id);
    }

    public function validateInput($request) {
        $title = trim($request->title);
        $category = trim($request->category);
        $status = trim($request->status);
        $content = trim($request->content);

        if ($title==null || $category==null || $status==null || $content==null) {
            ResponseFacade::validationMessage('All * fields are Required');
        }
    }
}
