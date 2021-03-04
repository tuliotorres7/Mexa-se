<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PresencaValidator.
 *
 * @package namespace App\Validators;
 */
class PresencaValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'data' => 'required',
            'user_id' => 'required|exists:users,id',

            'cliente_id' => 'required|exists:clientes,id',
            'abertura'=> 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
