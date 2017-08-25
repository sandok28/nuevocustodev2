<?php

return [
    /**
     * DataTables search options.
     */
    'search'         => [
        /**
         * Smart search will enclose search keyword with wildcard string "%keyword%".
         * SQL: column LIKE "%keyword%"
         */
        'smart'            => true,

        /**
         * Case insensitive will search the keyword in lower case format.
         * SQL: LOWER(column) LIKE LOWER(keyword)
         */
        'case_insensitive' => true,

        /**
         * Wild card will add "%" in between every characters of the keyword.
         * SQL: column LIKE "%k%e%y%w%o%r%d%"
         */
        'use_wildcards'    => false,
    ],

    /**
     * DataTables internal index id response column name.
     */
    'index_column'   => 'DT_Row_Index',

    /**
     * DataTables fractal configurations.
     */
    'fractal'        => [
        /**
         * Request key name to parse includes on fractal.
         */
        'includes'   => 'include',

        /**
         * Default fractal serializer.
         */
        'serializer' => 'League\Fractal\Serializer\DataArraySerializer',
    ],

    /**
     * Datatables list of available engines.
     * This is where you can register your custom datatables engine.
     */
    'engines'        => [
        'eloquent'   => Yajra\Datatables\Engines\EloquentEngine::class,
        'query'      => Yajra\Datatables\Engines\QueryBuilderEngine::class,
        'collection' => Yajra\Datatables\Engines\CollectionEngine::class,
    ],

    /**
     * Datatables accepted builder to engine mapping.
     */
    'builders'       => [
        Illuminate\Database\Eloquent\Relations\Relation::class => 'eloquent',
        Illuminate\Database\Eloquent\Builder::class            => 'eloquent',
        Illuminate\Database\Query\Builder::class               => 'query',
        Illuminate\Support\Collection::class                   => 'collection',
    ],

    /**
     * Nulls last sql pattern for Posgresql & Oracle.
     * For MySQL, use '-%s %s'
     */
    'nulls_last_sql' => '%s %s NULLS LAST',

    /**
     * User friendly message to be displayed on user if error occurs.
     * Possible values:
     * null             - The exception message will be used on error response.
     * 'throw'          - Throws a \Yajra\Datatables\Exception. You can then use your custom error handler if needed.
     * 'custom message' - Any friendly message to be displayed to the user. You can also use translation key.
     */
    'error'          => env('DATATABLES_ERROR', null),

    /**
     * Default columns definition of dataTable utility functions.
     */
    'columns'        => [
        /**
         * List of columns hidden/removed on json response.
         */
        'excess'    => ['rn', 'row_num'],

        /**
         * List of columns to be escaped. If set to *, all columns are escape.
         * Note: You can set the value to empty array to disable XSS protection.
         */
        'escape'    => '*',

        /**
         * List of columns that are allowed to display html content.
         * Note: Adding columns to list will make us available to XSS attacks.
         */
        'raw'       => ['action'],

        /**
         * List of columns are are forbidden from being searched/sorted.
         */
        'blacklist' => ['password', 'remember_token'],

        /**
         * List of columns that are only allowed fo search/sort.
         * If set to *, all columns are allowed.
         */
        'whitelist' => '*',
    ],

    /*
     * JsonResponse header and options config.
     */
    'json'           => [
        'header'  => [],
        'options' => 0,
    ],

];
