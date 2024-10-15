<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        3:06 AM
 */

/**
 * Returns email whitelist.
 */
function get_email_whitelist(): array
{
    return ['@gmail.com', '@hotmail.com', '@yahoo.com'];
}

/**
 * Returns the email suffix.
 */
function get_email_suffix(string $email): string
{
    $suffix = explode('@', $email);

    return '@' . $suffix[1];
}

/**
 * Check if an email is on the white-list or not.
 */
function is_in_whiteList(string $email): bool
{
    $whitelist = get_email_whitelist();
    $suffix    = get_email_suffix($email);

    return ! (! in_array($suffix, $whitelist, true));
}
