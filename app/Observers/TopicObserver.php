<?php

namespace App\Observers;

use App\Handlers\SlugTranlateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_topic_body');

        $topic->excerpt = make_excerpt($topic->body);
        if ( ! $topic->slug) {
            $topic->slug = app(SlugTranlateHandler::class)->translate($topic->title);
        }

    }
//    public function saved(Topic $topic){
//
//        if (!$topic->slug){
//            dispatch(new TranslateSlug($topic));
//        }
//    }
}
