<?php

namespace App\Presenters;

use App\Transformers\PresencaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PresencaPresenter.
 *
 * @package namespace App\Presenters;
 */
class PresencaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PresencaTransformer();
    }
}
