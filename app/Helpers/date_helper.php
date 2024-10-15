<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        2:58 AM
 */

/**
 * Check the given timestamp is weekend or not.
 *
 * @throws Exception
 */
function is_weekend(?int $timestamp): bool
{
    if (null === $timestamp) {
        $timestamp = now();
    }

    return date('N', $timestamp) >= 6;
}

/**
 * Check if the given timestamp is today or not.
 */
function is_today(int $timestamp): bool
{
    $today     = new DateTime('today');
    $matchDate = DateTime::createFromFormat(
        '!Y-m-d',
        date('Y-m-d', $timestamp)
    );
    $matchDate->setTime(0, 0);
    $diff     = $today->diff($matchDate);
    $diffDays = (int) $diff->format('%R%a');

    return (bool) ($diffDays === 0);
}
