<?php
namespace App\Concern;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\morphMany;

trait Commentable
{

    /**
     * Get all of the resource's comments.
     */
    public function comments(): morphMany
    {
        return $this->morphMany(Comments::class, 'commentable');
    }

    /**
     * Create a comment if it does not exist yet.
     */
    public function addComment(Array $data)
    {
        if ($this->comments()->where('author_id', auth()->id())->doesntExist()) {
            return $this->comments()->create( $data );
        }
    }

    /**
     * Check if the resource is commented by the current user
     */
    public function isCommented(): bool
    {
        return $this->comments->where('author_id', auth()->id())->isNotEmpty();
    }


    
    
}