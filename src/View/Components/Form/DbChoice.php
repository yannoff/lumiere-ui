<?php

namespace Yannoff\Lumiere\UI\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

abstract class DbChoice extends Component
{
    public $name;

    public $elements = [];

    public $valueColumn;

    public $labelColumn;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $model, string $valueColumn, string $labelColumn = 'label')
    {
        $this->name = $name;

        $this->valueColumn = $valueColumn;
        $this->labelColumn = $labelColumn;

        $modelName = $this->resolveModelFQCN($model);
        $this->elements = $modelName::all()->sortBy($labelColumn);
    }

    /**
     * @param $shortname
     *
     * @return string
     */
    protected function resolveModelFQCN($shortname): string
    {
        return sprintf('App\Models\%s', $shortname);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    abstract public function render();
}
