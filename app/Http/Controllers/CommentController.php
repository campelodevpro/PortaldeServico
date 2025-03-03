<?php

declare(strict_types= 1);

namespace App\Http\Controllers;

use App\Http\Requests\CommentValidationRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class CommentController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('comments.index', [
            'comments'=> Comment::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function CommentValidationRequest(Request $request)
    {


        $request->user()->comments()->create($request->validated());
        return to_route('comments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view ('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentValidationRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $comment->update($request->validated());

        return to_route('comments.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return to_route('comments.index');
    }
}
