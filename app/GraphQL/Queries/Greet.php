<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

final readonly class Greet
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        return "Hello, {$args['name']}! Welcome to GraphQL API created by Serhii Dychko";
    }
}
