<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $table = "books";

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>

        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('publisher', 'like', '%' . $search . '%')
            ->orWhere('Short_description', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('authorName', 'like', '%' . $search . '%'));

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>

            $query
                ->whereHas('category', fn ($query)
                => $query->where('slug', $category))
            // ->whereExists(fn ($query) =>
            // $query->from('category')
            //     ->whereColumn('category.id', 'book.category_id')
            //     ->where('category.slug', $category))
        );
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
