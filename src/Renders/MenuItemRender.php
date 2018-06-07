<?php

namespace Lari\MenuManager\Renders;

use Lari\MenuManager\Models\MenuItem;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuItemRender extends AbstractRender
{
    /**
     * @var MenuItem
     */
    protected $model;

    /**
     * @param MenuItem $menuItem
     */
    public function __construct(MenuItem $menuItem)
    {
        $this->model = $menuItem;
    }

    public function getUrl()
    {
        return $this->model->url;
    }

    public function getAnchor()
    {
        return $this->model->anchor;
    }

    public function isBlank()
    {
        return (bool)$this->model->is_blank;
    }

    public function getClass()
    {
        return $this->model->class;
    }
}