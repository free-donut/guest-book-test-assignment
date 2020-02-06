<?php
if (! function_exists('getSortLinksData')) {
    function getSortLinksData($sortableCollumns)
    {
        return array_map(function ($key, $value) {
            $href = "?column=$key&order=$value[order]";
            $name = $value ['columnName'];
            return ['name' => $name,'href' => $href];
        }, array_keys($sortableCollumns), $sortableCollumns);
    }
}

if (! function_exists('getNewSortableCollumns')) {
    function getNewSortableCollumns($sortableCollumns, $sortedColumn, $order)
    {
        if ($order === 'desc') {
            $sortableCollumns[$sortedColumn]['order'] = 'asc';
        } else {
            $sortableCollumns[$sortedColumn]['order'] = 'desc';
        }
        return $sortableCollumns;
    }
}
