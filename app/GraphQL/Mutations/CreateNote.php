<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

final readonly class CreateNote
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
       $note =  Note::create([
           'content' => $args['content'],
           'user_id' => Auth::guard('sanctum')->user()->id,
       ]);

        if (!empty($args['images'])) {
            foreach ($args['images'] as $image) {
                $path = Storage::put('notes/' . $note->id . '/images', $image);
                Log::debug('Creating note image: ' . $path);

                $note->images()->create([
                    'path' => $path,
                    'name' => $image->getClientOriginalName(),
                ]);
            }

        }

        return $note;
    }
}
