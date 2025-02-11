<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Note;

final readonly class UpdateNote
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args): ?Note
    {
        $note = Note::find($args['id']);

        if (!$note) {
            return null;
        }

        $note->update($args);

        return $note;
    }
}
