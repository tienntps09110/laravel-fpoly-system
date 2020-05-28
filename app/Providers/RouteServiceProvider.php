<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $auth  = [
            'routes/auth/auth.php',
            'routes/student/auth.php',

        ];

        $admin = [
            'routes/admin/user.php',
            'routes/admin/main.php'
        ];
        $teacher = [
            'routes/teacher/main.php',
            'routes/teacher/class-subject.php',
            'routes/teacher/attendance.php'
        ];
        $department = [
            'routes/department/main.php',
            'routes/department/teacher.php',
            'routes/department/student.php',
            'routes/department/classM.php',
            'routes/department/subject.php',
            'routes/department/user.php',
            'routes/department/class-subjects.php',
            'routes/department/days-class-subject.php',
        ];
        $collaboration = [
            'routes/collaboration/main.php',
        ];
        $student = [
            'routes/student/main.php'
        ];
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        // ROUTER LOGIN 
        for($i = 0; $i < count($auth); $i++){
            Route::middleware('web')
                // ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path($auth[$i]));
        }

        // ROUTER ADMIN
        for($i = 0; $i < count($admin); $i++){
            $this->router('admin', 'admin', $admin[$i]);
        }
        // ROUTER TEACHER
        for($i = 0; $i < count($teacher); $i++){
            $this->router('teacher', 'teacher', $teacher[$i]);
        }
        // ROUTER DEPARTMENT
        for($i = 0; $i < count($department); $i++){
            $this->router('department', 'department', $department[$i]);
        }
        // ROUTER COLLABORATION
        for($i = 0; $i < count($collaboration); $i++){
            $this->router('collaboration', 'collaboration', $collaboration[$i]);
        }
        // ROUTER STUDENT
        for($i = 0; $i < count($student); $i++){
            $this->router('student', 'student', $student[$i]);
        }
    }
    protected function router($prefix, $middleware, $base){
        return Route::prefix($prefix)
            ->middleware($middleware)
            ->namespace($this->namespace)
            ->group(base_path($base));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        // $router = [
        //     'routes/main/user.php',
            
        // ];

        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));

        // for($i = 0; $i < count($router); $i++){
        //     Route::prefix('api')
        //         ->middleware('jwt')
        //         ->namespace($this->namespace)
        //         ->group(base_path($router[$i]));
        // }
    }
}
