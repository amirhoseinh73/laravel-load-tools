<?php

namespace App\Http\Resources;

use App\Helpers\Types;
use Illuminate\Http\Resources\Json\JsonResource;

class ToolsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            "id" => $this->id,
            "key" => $this->key,
            "title" => __( "tools.$this->key.title" ),
            "description" => __( "tools.$this->key.description" ),
            "type" => Types::getToolTypeText( $this->type ),
            "icon" => url( __DIR_TOOLS_ICON__ . $this->icon ),
            "collection" => $this->collection,
            "archive" => $this->archive,
            "width" => $this->width,
            "height" => $this->height,
            "link" => url( app()->getLocale() . "/tools/load/$this->id" ),
            "locale" => app()->getLocale(),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
