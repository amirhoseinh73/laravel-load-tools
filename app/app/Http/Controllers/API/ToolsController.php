<?php

namespace App\Http\Controllers\API;

use App\Helpers\Types;
use App\Http\Controllers\Controller;
use App\Http\Resources\ToolsResource;
use App\Models\Tools;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    use ResponseAPI;

    private function _returnWithResource( $resource ) {
        return new ToolsResource( $resource );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TOOLS = Tools::all();

        return $this->success( ToolsResource::collection( $TOOLS ), __( "message.Operation.success" ), 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param int $bookCode
     * @return \Illuminate\Http\Response
     */
    public function listByArchive($bookCode)
    {
        $tool = Tools::where( "archive", "like", "%$bookCode%" );

        if ( ! exist( $tool ) ) $tool = [];

        return $this->success( $tool, __( "message.Operation.success" ), 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "key"   => "required|string|unique:tools,key",
            "type"  => "required|in:" . Types::ToolsType,
            "icon"  => "required|string",
            "collection" => "required|in:" . Types::ToolsCollection,
            "archive"   => "nullable",
            "width"     => "required|numeric",
            "height"    => "required|numeric"
        ]);

        $TOOL = Tools::create( $request->all() );

        return $this->success( $TOOL, __( "message.create", [ "item" => "tool" ] ), 201 );
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $locale, $id )
    {
        $tool = Tools::find( $id );

        if ( exist( $tool ) ) $tool = $this->_returnWithResource( $tool );
        else $tool = [];

        return $this->success( $tool, __( "message.Operation.success" ), 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $id)
    {
        $request->validate([
            "key"   => "string|unique:tools,key",
            "type"  => "in:" . Types::ToolsType,
            "icon"  => "string",
            "collection" => "in:" . Types::ToolsCollection,
            "archive"   => "nullable",
            "width"     => "numeric",
            "height"    => "numeric"
        ]);

        $tool = Tools::find( $id );
        $tool->update( $request->all() );

        return $this->success( $tool, __( "message.Operation.success" ), 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $locale, $id )
    {
        Tools::destroy( $id );
        return $this->success( [], __( "message.delete", [ "item", "tool" ] ), 200 );
    }
}
