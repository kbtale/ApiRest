<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ExpenseType extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    /**
     * Expenses under category
     *
     * @return     HasMany  The has many.
     */
    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
