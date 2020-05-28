<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class Alert extends Component
{

    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    public $alertType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$message,$alertType)
    {
        $this->type = $type;
        $this->message = $message;
        $this->alertType = $alertType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }

    /**
     * Get the size.
     *
     * @return string
     */
    public function size()
    {
        return 'Large'.(6*6);
    }

    public function boot(){
        Blade::component('package-alert',AlertComponent::class);
    }
}
