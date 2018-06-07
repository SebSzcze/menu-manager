<?php

namespace Lari\MenuManager\Renders;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
abstract class AbstractRender
{
    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $methodName = 'get'.ucfirst($name);

        if (method_exists($this, $methodName)) {
            return $this->{$methodName}();
        }

        return $this->model->{$name};
    }
}