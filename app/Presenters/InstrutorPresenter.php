<?php

namespace App\Presenters;

use App\Transformers\InstrutorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InstrutorPresenter.
 *
 * @package namespace App\Presenters;
 */
class InstrutorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InstrutorTransformer();
    }
}
