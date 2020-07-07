<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FileResource;

class TaskResource extends JsonResource
{
    
    public function toArray($request)
    {
        
        return [

            'id'=>$this->id,
            'name' => $this->name,
            'deadline'=>$this->dead_line,
            'status'=>$this->status,
            'visibility'=>$this->visibility,
            'files' => FileResource::collection($this->files),
            
        ];
    }
}
