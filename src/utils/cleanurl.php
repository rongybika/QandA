<?php
function __get_clean_url($url)
{
  // The request url might be /project/index.php, this will remove the /project part
  $url = str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $url);
  // Remove the query string if there is one
  $query_string = strpos($url, '?');
  if ($query_string !== false) {
    $url = substr($url, 0, $query_string);
  }
  // If the URL looks like http://localhost/index.php/path/to/folder remove /index.php
  if (substr($url, 1, strlen(basename($_SERVER['SCRIPT_NAME']))) == basename($_SERVER['SCRIPT_NAME'])) {
    $url = substr($url, strlen(basename($_SERVER['SCRIPT_NAME'])) + 1);
  }
  // Make sure the URI ends in a /
  $url = rtrim($url, '/') . '/';
  // Replace multiple slashes in a url, such as /my//dir/url
  $url = preg_replace('/\/+/', '/', $url);
  return $url;
}
