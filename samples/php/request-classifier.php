<?php

declare(strict_types=1);

function showcase_classify_request(array $server): array
{
    $method = strtoupper((string) ($server['REQUEST_METHOD'] ?? 'GET'));
    $uri = strtolower((string) ($server['REQUEST_URI'] ?? '/'));
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';

    $type = 'page';

    if (showcase_path_starts_with($path, '/admin')) {
        $type = 'admin';
    } elseif (showcase_path_starts_with($path, '/ajax')) {
        $type = 'ajax';
    } elseif (showcase_path_starts_with($path, '/api')) {
        $type = 'api';
    } elseif (showcase_path_starts_with($path, '/cart')) {
        $type = 'cart';
    } elseif (showcase_path_starts_with($path, '/checkout')) {
        $type = 'checkout';
    } elseif (preg_match('/\\.(css|js|png|jpg|jpeg|webp|svg|woff2?)$/', $path)) {
        $type = 'asset';
    } elseif (strpos($uri, '?s=') !== false || strpos($uri, '&s=') !== false) {
        $type = 'search';
    }

    return [
        'type' => $type,
        'method' => $method,
        'safe_to_cache' => showcase_request_can_use_public_cache($type, $method),
        'needs_extra_care' => in_array($type, ['cart', 'checkout', 'ajax'], true),
    ];
}

function showcase_path_starts_with(string $path, string $prefix): bool
{
    return $path === $prefix || strpos($path, rtrim($prefix, '/') . '/') === 0;
}

function showcase_request_can_use_public_cache(string $type, string $method): bool
{
    if (!in_array($method, ['GET', 'HEAD'], true)) {
        return false;
    }

    return in_array($type, ['page', 'asset', 'search'], true);
}
