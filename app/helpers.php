<?php

function category_sidebar_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}