<?php

use \App\Skin;
use \App\Boost;

if (!function_exists('type_is')) {
    function type_is($type)
    {
        if ($_type = get_skin_type($type)) {
            $type = $_type;
        }
        return $type == get_type();
    }
}

if (!function_exists('get_type')) {
    function get_type($collect_type = 'skin')
    {
        if ($collect_type == 'skin') {
            $type = request()->get('type', Skin::COLORS);
            return in_array($type, Skin::getTypesValue()) ? $type : Skin::COLORS;
        }
        if ($collect_type == 'boost') {
            return request()->get('type', Boost::SWITCH);
        }
        return 1;
    }
}
if (!function_exists('user_is_selected')) {
    function user_is_selected($type)
    {
        return \Auth::user()->selectedSkin->type == get_skin_type($type);
    }
}

if (!function_exists('user_is_selected_skin')) {
    function user_is_selected_skin($skin_id)
    {
        return \Auth::user()->skeen_id == $skin_id;
    }
}

if (!function_exists('get_skin_type')) {
    function get_boost_type_value($title)
    {
        $type = 1;
        switch (strtolower($title)) {
            case 'switch':
                $type = 1;
                break;
            case 'teleport':
                $type = 2;
                break;
            case 'push':
                $type = 3;
                break;
        }
        return $type;
    }
}

if (!function_exists('get_skin_type')) {
    function get_skin_type($title)
    {
        if (in_array($title, Skin::getTypesValue())) {
            return $title;
        }
        $type = false;
        switch (strtolower($title)) {
            case 'masks':
                $type = Skin::MASKS;
                break;
            case 'flags':
                $type = Skin::FLAGS;
                break;
            case 'other':
                $type = Skin::OTHER;
                break;
            case 'colors':
                $type = Skin::COLORS;
                break;
        }
        return $type;
    }
}

if (!function_exists('_route')) {
    function _route($name, $params = [], $type = null)
    {
        $type = $type ?? get_type();
        $params ['type'] = $type;
        return route($name, $params);
    }
}


