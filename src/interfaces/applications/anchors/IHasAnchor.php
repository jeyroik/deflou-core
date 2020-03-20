<?php
namespace deflou\interfaces\applications\anchors;

/**
 * Interface IHasAnchor
 *
 * @package deflou\interfaces\applications\anchors
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasAnchor
{
    public const FIELD__ANCHOR_ID = 'anchor_id';

    /**
     * @return string
     */
    public function getAnchorId(): string;

    /**
     * @return IAnchor|null
     */
    public function getAnchor(): ?IAnchor;

    /**
     * @param string $id
     * @return $this
     */
    public function setAnchorId(string $id);
}
