<?php

declare(strict_types=1);

namespace BaseCodeOy\DataBags\View\Components;

use BaseCodeOy\DataBags\ResolverFactory;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

final class DataBag extends Component
{
    private string $key;

    private string $resolver;

    private string $view;

    public function __construct(string $key, string $resolver, string $view)
    {
        $this->key = $key;
        $this->resolver = $resolver;
        $this->view = $view;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return View::make($this->view, ResolverFactory::make($this->resolver, $this->key));
    }
}
