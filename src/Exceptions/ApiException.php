<?php

declare(strict_types=1);

namespace Datev\Exceptions;

use Exception;

class ApiException extends Exception {
    protected $response;

    public function __construct($message = '', int $code = 0, $response = null, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
        $content = $this->getContent();
        error_log("$message (Errorcode: $code)" . (empty($content) ? "" : ": " . $content));
    }

    public function getResponse() {
        return $this->response;
    }

    public function getContent() {
        if ($this->response === null) {
            return null;
        }
        return $this->response->getBody()->getContents();
    }
}
