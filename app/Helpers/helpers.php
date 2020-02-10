<?php

if (! function_exists('getNewSortableCollumns')) {
    function getNewSortableCollumns($sortableColumns, $sortedColumn, $order, $sortTypes)
    {
        if ($order === $sortTypes[0]) {
            $sortableColumns[$sortedColumn]['order'] = $sortTypes[1];
        } else {
            $sortableColumns[$sortedColumn]['order'] = $sortTypes[0];
        }
        return $sortableColumns;
    }
}

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

if (! function_exists('getSortData')) {
    function getSortData($sortableColumns, $sortTypes, $defaultSort, $userSort)
    {
        $order = $userSort['order'];
        $column = $userSort['column'];
        if (in_array($order, $sortTypes) && array_key_exists($column, $sortableColumns)) {
            $newSortableColumns = getNewSortableCollumns($sortableColumns, $column, $order, $sortTypes);
            $sortLinksData = getSortLinksData($newSortableColumns);
            return [$sortLinksData, $column, $order];
        } else {
            $sortLinksData = getSortLinksData($sortableColumns);
            return [$sortLinksData, $defaultSort['column'], $defaultSort['order']];
        }
    }

}
