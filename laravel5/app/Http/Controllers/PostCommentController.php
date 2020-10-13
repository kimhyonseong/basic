<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 리소스 컨트롤러 옵션 --resource
class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $postId
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
        return '['.__METHOD__."] \$postId = {$postId}";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $postId
     * @param int $commentId
     * @return \Illuminate\Http\Response
     */
    public function show($postId,$commentId)
    {
        //
        return $postId . '-' . $commentId;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
