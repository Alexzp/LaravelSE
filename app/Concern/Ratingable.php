<?php
namespace App\Concern;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Relations\morphMany;

trait Ratingable
{

    /**
     * Get all of the resource's ratings.
     */
    public function ratings(): morphMany
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    /**
     * Create a rating if it does not exist yet.
     */
    public function addRating(Array $data)
    {
        if ($this->ratings()->where('author_id', auth()->id())->doesntExist()) {
            return $this->ratings()->create( $data );
        }
    }

    /**
     * Check if the resource is rated by the current user
     */
    public function isRated(): bool
    {
        return $this->ratings->where('author_id', auth()->id())->isNotEmpty();
    }

    /**
     * Add Avg Rating Attribte 
     */
    public function getAvgRatingAttribute()
    {
        return $this->ratings()->avg('mark');
    }
    
    
}