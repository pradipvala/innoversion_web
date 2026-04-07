// app/Models/Record.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractBooking extends Model
{
    use HasFactory;
    public $table = 'contract_quotation';


    protected $fillable = [
        'attachment',
        'address',
        'description',
        'status',
        'select_date',
        'select_time',
    ];
}
