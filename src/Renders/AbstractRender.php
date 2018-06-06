<?php

namespace Lari\MenuManager\Renders;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
abstract class AbstractRender
{
    public function __get($name)
    {
        $methodName = 'get'.ucfirst($name);

        if (method_exists($this, $methodName)) {
            return $this->{$methodName}();
        }

        return $this->model->{$name};
    }
}