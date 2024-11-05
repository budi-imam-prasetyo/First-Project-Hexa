<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
{
    //define properti
    public $status;
    public $message;
    public $resource;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource
            // 'data'      => [
            //     'id' => $this->id,
            //     'class' => [
            //         // 'id' => $this->class->id,
            //         // 'name' => $this->class->name,
            //         // 'description' => $this->class->description,
            //         // 'created_at' => $this->class->created_at->timestamp,
            //         // 'updated_at' => $this->class->updated_at->timestamp,
            //         // 'deleted_at' => $this->class->deleted_at ? $this->class->deleted_at->timestamp : null,
            //     ],
            //     'first_name' => $this->first_name,
            //     'last_name' => $this->last_name,
            //     'email' => $this->email,
            //     'gender' => $this->gender,
            //     'address' => $this->address,
            //     'created_at' => $this->created_at->timestamp,
            //     'updated_at' => $this->updated_at->timestamp,
            // ]
        ];
    }
}
