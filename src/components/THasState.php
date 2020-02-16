<?php
namespace deflou\components;

use deflou\interfaces\IHasState;

/**
 * Trait THasState
 * 
 * @property $config
 * 
 * @package deflou\components
 * @author jeyroik@gmail.com
 */
trait THasState
{
    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->config[IHasState::FIELD__STATE] ?? '';
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState(string $state)
    {
        $this->config[IHasState::FIELD__STATE] = $state;
        
        return $this;
    }
}
