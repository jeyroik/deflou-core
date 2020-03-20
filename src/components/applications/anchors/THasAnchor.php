<?php
namespace deflou\components\applications\anchors;

use deflou\interfaces\applications\anchors\IAnchor;
use deflou\interfaces\applications\anchors\IAnchorRepository;
use deflou\interfaces\applications\anchors\IHasAnchor;
use extas\components\SystemContainer;

/**
 * Trait THasAnchor
 *
 * @property $config
 *
 * @package deflou\components\applications\anchors
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasAnchor
{
    /**
     * @return string
     */
    public function getAnchorId(): string
    {
        return $this->config[IHasAnchor::FIELD__ANCHOR_ID] ?? '';
    }

    /**
     * @return IAnchor|null
     */
    public function getAnchor(): ?IAnchor
    {
        /**
         * @var $repo IAnchorRepository
         */
        $repo = SystemContainer::getItem(IAnchorRepository::class);

        return $repo->one([IAnchor::FIELD__ID => $this->getAnchorId()]);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setAnchorId(string $id)
    {
        $this->config[IHasAnchor::FIELD__ANCHOR_ID] = $id;

        return $this;
    }
}
