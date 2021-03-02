<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Presenca;

/**
 * Class PresencaTransformer.
 *
 * @package namespace App\Transformers;
 */
class PresencaTransformer extends TransformerAbstract
{
    /**
     * Transform the Presenca entity.
     *
     * @param \App\Entities\Presenca $model
     *
     * @return array
     */
    public function transform(Presenca $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
