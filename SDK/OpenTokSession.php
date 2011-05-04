<?php

/*!
* OpenTok PHP Library
* http://www.tokbox.com/
*
* Copyright 2010, TokBox, Inc.
*/


class OpenTokSession {

    private $sessionId;

    private $sessionProperties;

    function __construct($sessionId, $properties) {
        $this->sessionId = $sessionId;
        $this->sessionProperties = $properties;
    }

    public function getSessionId() {
        return $this->sessionId;
    }
}
