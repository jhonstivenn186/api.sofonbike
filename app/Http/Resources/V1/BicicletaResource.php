<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BicicletaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       /*  return parent::toArray($request); */

        return [
           
            'tamaño' => $this->tamaño,
            'n_serial' => $this->n_serial,
            'descripcionhurto' => $this->descripcionhurto,
            'fechahurto' => $this->fechahurto,
            'ubicacionhurto' => $this->ubicacionhurto,
            
        ];


    }
}
