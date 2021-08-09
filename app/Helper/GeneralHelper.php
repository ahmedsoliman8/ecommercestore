<?php

use \Illuminate\Support\Facades\Cache;
function getParentShowOf($param)
{
    $route = str_replace('admin.', '', $param);
    //dd(Cache::get('admin_side_menu')->pluck('children')->flatten());
    $permission = collect(Cache::get('admin_side_menu')->pluck('children')->flatten())
        ->where('as', $route)->flatten()->first();
    return $permission ? $permission['parent_show'] : null;
}


function getParentOf($param)
{
    $route = str_replace('admin.', '', $param);
    $permission = collect(Cache::get('admin_side_menu')->pluck('children')->flatten())
        ->where('as', $route)->flatten()->first();
    return $permission ? $permission['parent'] : null;
}

function getParentIdOf($param)
{
    $route = str_replace('admin.', '', $param);
    $permission = collect(Cache::get('admin_side_menu')->pluck('children')->flatten())
        ->where('as', $route)->flatten()->first();
    return $permission ? $permission['id'] : null;
}