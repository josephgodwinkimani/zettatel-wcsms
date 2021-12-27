<?php

ini_set( 'display_errors', 'on' );
error_reporting( E_ALL );

/**
 * Loads and prepares everything for unit testing.
 *
 * @package Zettatel-wcsms\Tests
 */

/**
 * Zettatel-wcsms Unit Tests Bootstrap.
 */

// This array has a single file but could whole the contents of an entire directory.

    // File: tests/bootstrap.php
    $files = [
        dirname( __DIR__ ) . '/vendor/yoast/wp-test-utils/src/BrainMonkey/bootstrap.php',
        dirname( __DIR__ ) . '/vendor/autoload.php',
        dirname( __DIR__ ) . '/tests/zettatel-wcsmsTest.php',
    ];

    foreach ($files as $file) {
        if (file_exists($file)) {
            require_once $file;
        }
    }

