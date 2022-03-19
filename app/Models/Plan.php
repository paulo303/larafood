<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'price',
        'description',
    ];

    public function getAll()
    {
        return $this->paginate();
    }

    public function findByURL($url)
    {
        return $this->where('url', $url)->first();
    }

    public function search($filter = null)
    {
        $results = $this
            ->where('name', 'LIKE', "%{$filter}%")
            // ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();

        return $results;
    }
}
