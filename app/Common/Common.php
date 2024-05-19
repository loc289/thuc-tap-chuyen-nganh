<?php

use App\Models\Category;
use App\Models\SubCategory;

if (! function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d H:i:s')
    {
        try {
            if (! $date) {
                return $date;
            }

            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        } catch (\Exception $e) {
            $date = date($format, strtotime($date));
        }

        return $date;
    }
}

if (! function_exists('getConst')) {
    function getConst($key = '', $defaultValue = '')
    {
        return config('const.'.$key, $defaultValue);
    }
}

if (! function_exists('getCategories')) {
    function getCategories($parentCategoryId)
    {
        return Category::with('subCategories')->where('parent_category_id', $parentCategoryId)->get();
    }
}

if (! function_exists('getSubCategories')) {
    function getSubCategories($categoryId)
    {
        return SubCategory::where('category_id', $categoryId)->get();
    }
}

if (! function_exists('isCurrentPage')) {
    function isCurrentPage($segment)
    {
        if (request()->segment(1) === $segment) {
            return 'class=current';
        }

        return '';
    }
}
