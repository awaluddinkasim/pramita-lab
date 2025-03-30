<?php

use Carbon\Carbon;

if (!function_exists('createDate')) {
  function createDate($timestamp)
  {
    try {
      $date = Carbon::parse($timestamp);
      return $date->isoFormat('DD MMMM YYYY');
    } catch (\Exception $e) {
      return $timestamp;
    }
  }
}


if (!function_exists('createDateTime')) {
  function createDateTime($timestamp)
  {
    try {
      $timestamp = Carbon::parse($timestamp);

      $date = $timestamp->isoFormat('DD MMMM YYYY');

      $time = $timestamp->isoFormat('HH:mm');

      return $date . ' ' . __('strings.at') . ' ' . $time;
    } catch (\Exception $e) {
      return $timestamp;
    }
  }
}
