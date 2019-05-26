<?php
 /**
 * Load all custome fields folder
 * Load all page templates
 */
 $files = array_merge(
   glob(__DIR__.'/post-type/*.php')
 );
 foreach ($files as $filename)
 {
   include $filename;
 }
