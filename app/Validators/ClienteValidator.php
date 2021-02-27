<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClienteValidator.
 *
 * @package namespace App\Validators;
 */
class ClienteValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required',
            'user_id' => 'required|exists:users,id',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
