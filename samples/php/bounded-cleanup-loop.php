<?php

declare(strict_types=1);

function showcase_run_bounded_cleanup(callable $fetchBatch, callable $deleteItem, int $maxRounds = 3, int $batchSize = 100): array
{
    $maxRounds = max(1, $maxRounds);
    $batchSize = max(1, $batchSize);
    $deleted = 0;
    $rounds = 0;

    while ($rounds < $maxRounds) {
        $items = $fetchBatch($batchSize);

        if (!is_array($items) || $items === []) {
            break;
        }

        foreach (array_slice($items, 0, $batchSize) as $item) {
            if ($deleteItem($item)) {
                $deleted++;
            }
        }

        $rounds++;

        if (count($items) < $batchSize) {
            break;
        }
    }

    return [
        'rounds' => $rounds,
        'deleted' => $deleted,
        'finished' => $rounds < $maxRounds,
    ];
}

function showcase_should_run_maintenance(array $context): bool
{
    if (!empty($context['is_importing'])) {
        return false;
    }

    if (!empty($context['is_checkout'])) {
        return false;
    }

    return !empty($context['is_admin']) || mt_rand(1, 100) === 1;
}
