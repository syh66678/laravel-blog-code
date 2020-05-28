<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class RecentPostsComposer
{

    private $posts=2;

    public function __construct() {

    }

    public function compose(View $view) {
        $view->with('recent', $this->posts*6/8);
    }

}
