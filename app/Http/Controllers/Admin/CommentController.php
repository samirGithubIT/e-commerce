<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::paginate(10);
        return view('backend.pages.comment.index', compact('comment'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryOptions = category::categoryOption();
        return view('backEnd.pages.comment.index', compact('categoryOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'nullable',
            'phoneNumber' => 'nullable',
            'message' => 'nullable'
        ]);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->phoneNumber = $request->phoneNumber;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->to('/contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return \redirect()->to('/admin/comment');
    }
}
