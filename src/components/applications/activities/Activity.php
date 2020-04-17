<?php
namespace deflou\components\applications\activities;

use deflou\components\applications\THasApplication;
use deflou\components\fields\Field;
use deflou\interfaces\applications\activities\IActivity;
use extas\components\samples\THasSample;

/**
 * Class Activity
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class Activity extends ActivitySample implements IActivity
{
    use THasSample;
    use THasApplication;

    public function getFields(): array
    {
        $params = $this->getParameters();
        $fields = [];
        foreach ($params as $param) {
            $fields[] = new Field($param->__toArray());
        }

        return $fields;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.application.activity';
    }
}
