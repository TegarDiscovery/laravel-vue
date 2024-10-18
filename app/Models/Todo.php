namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional jika mengikuti konvensi Laravel)
    protected $table = 'todos';

    // Kolom yang bisa diisi secara massal
    protected $fillable = ['title', 'description', 'completed'];

    // Jika Anda menggunakan timestamps
    public $timestamps = true; // default true, bisa dihilangkan jika tidak diperlukan

    // Anda dapat menambahkan relasi jika ada
}