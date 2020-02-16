<?php
namespace deflou\interfaces;

/**
 * Interface IHasState
 *
 * @package deflou\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasState
{
    public const FIELD__STATE = 'state';

    /**
     * @return string
     */
    public function getState(): string;

    /**
     * @param string $state
     * @return $this
     */
    public function setState(string $state);
}
