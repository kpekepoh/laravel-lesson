<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;

class Product extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }


}?>

<!-- // ==================================================================================================== -->

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'active',
    ];

    public function scopeExpensive(Builder $query)
    {
        return $query->where('price', '>', 100);
    }

    public function scopeWithDiscount(Builder $query, $discount)
    {
        return $query->where('price', '>', $discount);
    }

    public static function getExpensiveProducts()
    {
        return static::expensive()->get();
    }
}

?>