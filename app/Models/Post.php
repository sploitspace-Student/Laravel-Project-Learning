<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class Post extends Model {

    use HasFactory;
    protected $fillable = ['title', 'author_id', 'category_id', 'slug', 'body'];
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function scopeFilter(Builder $query, array $filter): void
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%' )
                    ->orWhere('body', 'like', '%' . $search . '%')
                        ->orWhereHas('category', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('author', function ($query) use ($search){
                            $query->where('name', 'like', '%' . $search . '%')
                                ->orWhere('username', 'like', '%' . $search . '%');
                        });
        });

        $query->when($filter['category'] ?? false, function ($query, $category) {
            return $query->whereHas(
                'category', 
                fn (builder $query) =>
                $query->where('slug', $category)
            );
        });

        $query->when($filter['author'] ?? false, function ($query, $author) {
            return $query->whereHas(
                'author', 
                fn (builder $query) =>
                $query->where('username', $author)
            );
        });
    }

}