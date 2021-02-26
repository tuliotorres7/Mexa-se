<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Instrutor;

/**
 * Class InstrutorTransformer.
 *
 * @package namespace App\Transformers;
 */
class InstrutorTransformer extends TransformerAbstract
{
    /**
     * Transform the Instrutor entity.
     *
     * @param \App\Entities\Instrutor $model
     *
     * @return array
     */
    public function transform(Instrutor $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
