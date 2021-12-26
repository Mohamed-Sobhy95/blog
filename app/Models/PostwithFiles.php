<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostwithFiles
{
    public function __construct(public $title, public $date, public $excerpt, public $body, public $slug)
    {
    }
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
    public static function all()
    {

        return cache()->rememberForever('posts_all', function () {
            return collect(File::files(resource_path('posts')))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file->getPathName()))
                ->map(fn ($document) => new static(
                    $document->title,
                    $document->date,
                    $document->excerpt,
                    $document->body(),
                    $document->slug,
                ))
                ->sortByDesc('date');
        });
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
