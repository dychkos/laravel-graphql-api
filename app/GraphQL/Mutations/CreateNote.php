<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;

final readonly class CreateNote
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
       return Note::create([
           'content' => $args['content'],
           'user_id' => Auth::user()->id,
       ]);
    }
}
