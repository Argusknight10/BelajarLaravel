<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    // // Jika nama table berbeda jauh dengan nama model harus menuliskan :
    // protected $table = 'nama_table';
    // // Jika primary key bukan 'id' polos, harus menuliskan :
    // protected $primaryKey = 'table_id';

    use HasFactory;
    protected $fillable = ['title', 'slug', 'author', 'body'];

    // CARA EAGER LOADING BY DEFAULT
    protected $with = ['author', 'category'];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters){
        $query->when(isset($filters['search']) ? $filters['search'] : false, function($query, $search){
            $query->where('title', 'like', '%'.$search.'%');
        });

        $query->when(isset($filters['category']) ? $filters['category'] : false, function($query, $category){
            $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when(isset($filters['author']) ? $filters['author'] : false, function($query, $author){
            $query->whereHas('author', function($query) use ($author){
                $query->where('username', $author);
            });
        });
    }
}
