<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Http\Requests\TagCreateRequest;
use Laravel\Horizon\Horizon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //在容器中绑定

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //全局共享
        view()->share('siteName', '共享标题的！');

        //制定作用域共享
        view()->composer('child',function($view){
            $view->with('posts','闹哪样');
        });

        //通过自定义类实现更加灵活的数据预设。以此来取代以上闭包，但是该类的初始化和方法调用会对性能产生损耗，所以除非预设逻辑很复杂，否则推荐使用闭包
        view()->composer( 'child', \App\Http\ViewComposers\RecentPostsComposer::class );

        //==========================================================

        //自定义模板指令
        Blade::directive('datetime', function ($expression) {
            return "<?php echo date('m/d/Y H:i',$expression); ?>";
        });

        Horizon::auth(function ($request) {
            // return true / false;
            //返回true 表示可以打开horizon监控后台
            return true;
        });

    }
}
