<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\IHasTriggerResponse;

/**
 * Trait THasTriggerResponse
 *
 * @property $config
 *
 * @package deflou\components\triggers
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasTriggerResponse
{
    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->config[IHasTriggerResponse::FIELD__STATUS] ?? 0;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->config[IHasTriggerResponse::FIELD__BODY] ?? null;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status)
    {
        $this->config[IHasTriggerResponse::FIELD__STATUS] = $status;

        return $this;
    }

    /**
     * @param mixed $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->config[IHasTriggerResponse::FIELD__BODY] = $body;

        return $this;
    }
}
