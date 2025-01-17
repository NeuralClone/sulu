<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\TagBundle\Controller\Exception;

use Sulu\Component\Rest\Exception\RestException;

/**
 * TODO: move to sulu lib https://github.com/sulu-cmf/SuluTagBundle/issues/11
 * This exception should be thrown when a constraint violation for a enitity occures.
 */
class ConstraintViolationException extends RestException
{
    /**
     * Error code for non unique tag name.
     *
     * @var int
     */
    public const EXCEPTION_CODE_NON_UNIQUE_NAME = 1101;

    /**
     * @param string $field The field which is not
     */
    public function __construct(
        string $message,
        protected $field,
        int $code = 0,
    ) {
        parent::__construct($message, $code);
    }

    public function toArray()
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'field' => $this->field,
        ];
    }
}
