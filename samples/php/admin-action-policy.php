<?php

declare(strict_types=1);

function showcase_authorize_admin_action(array $request, callable $canUser, callable $verifyNonce): array
{
    $action = (string) ($request['action'] ?? '');
    $nonce = (string) ($request['nonce'] ?? '');
    $allowedActions = showcase_allowed_admin_actions();

    if (!isset($allowedActions[$action])) {
        return showcase_policy_result(false, 'Unknown action.');
    }

    $requiredCapability = $allowedActions[$action]['capability'];

    if (!$canUser($requiredCapability)) {
        return showcase_policy_result(false, 'User capability is not sufficient.');
    }

    if (!$verifyNonce($action, $nonce)) {
        return showcase_policy_result(false, 'Request verification failed.');
    }

    return showcase_policy_result(true, 'Action can proceed.');
}

function showcase_allowed_admin_actions(): array
{
    return [
        'export_public_inventory' => [
            'capability' => 'manage_operations',
            'risk' => 'medium',
        ],
        'run_maintenance_batch' => [
            'capability' => 'manage_platform',
            'risk' => 'medium',
        ],
        'toggle_feature_flag' => [
            'capability' => 'manage_platform',
            'risk' => 'high',
        ],
    ];
}

function showcase_policy_result(bool $allowed, string $message): array
{
    return [
        'allowed' => $allowed,
        'message' => $message,
        'checked_at' => gmdate('c'),
    ];
}
