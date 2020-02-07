<?php
if (! function_exists('getSortLinksData')) {
    function getSortLinksData($sortableColumns)
    {
        return array_map(function ($key, $value) {
            $href = "?column=$key&order=$value[order]";
            $name = $value['columnName'];
            return ['name' => $name,'href' => $href];
        }, array_keys($sortableColumns), $sortableColumns);
    }
}

if (! function_exists('getNewSortableCollumns')) {
    function getNewSortableCollumns($sortableColumns, $sortedColumn, $order)
    {
        $sortableColumns[$sortedColumn]['order'] = ($order === 'desc') ? 'asc' : 'desc';
        return $sortableColumns;
    }
}
