<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardUserController extends Controller
{
    public function index()
    {
        $number_blocks = [
            [
                'title' => 'Últimos usuarios que iniciaron sesión',
                'number' => User::whereDate('last_login_at', today())->count()
            ],
        ];
        $number_blocks1 = [
            [
                'title' => 'Usuarios que no han iniciado sesión durante 30 días',
                'number' => User::whereDate('last_login_at', '<=', today()->subDays(1))
                ->whereDate('last_login_at', '>', today()->subDays(30))->count()
            ],
        ];    
        $number_blocks2 = [
            [
                'title' => 'Usuarios que no han iniciado sesión',
                'number' => User::whereDate('last_login_at', '<', today()->subDays(30))->count()
            ],
        ];

        $list_blocks = [
            [
                'title' => 'Usuarios que iniciaron sesión',
                'entries' => User::orderBy('last_login_at', 'desc')
                ->whereDate('last_login_at', today())->get(),
            ],
        ];

        $list_blocks1 = [
            [
                'title' => 'Usuarios que no han iniciado sesión durante 30 días',
                'entries' => User::orderBy('last_login_at', 'desc')
                ->whereDate('last_login_at', '<=', today()->subDays(1))
                ->whereDate('last_login_at', '>', today()->subDays(30))->get(),
            ],
        ];

        $list_blocks2 = [
            [
                'title' => 'Usuarios que no han iniciado sesión',
                'entries' => User::orderBy('last_login_at', 'desc')
                ->whereDate('last_login_at', '<', today()->subDays(30))
                ->orwhere('last_login_at', null)
                ->orderBy('last_login_at', 'desc')
                ->get()
            ],
        ];

        $chart_settings = [
            'chart_title'        => 'Usuarios por meses',
            'chart_type'         => 'line',
            'report_type'        => 'group_by_date',
            'model'              => 'App\\User',
            'group_by_field'     => 'last_login_at',
            'group_by_period'    => 'month',
            'aggregate_function' => 'count',
            'filter_field'       => 'last_login_at',
            'column_class'       => 'col-md-12',
            'entries_number'     => '5',
        ];
        $chart = new LaravelChart($chart_settings);

        return view('dashboard.dashboard-user', compact('number_blocks', 'number_blocks1', 'number_blocks2', 'list_blocks','list_blocks1', 'list_blocks2', 'chart'));
    }
}