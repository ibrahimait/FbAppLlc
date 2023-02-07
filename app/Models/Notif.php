<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Notif extends Model
{
    use HasFactory;
    use Sortable;
    protected $connection = 'mysql3';
    protected $table = 'Notification';
    protected $fillable = [
        'id_notification',
        'date',
        'heure',
        'automation',
        'statut',
        'message',
        'url_workflow',
           
    ];
    public $sortable = [ 'id_notification', 'date','heure','automation','statut', 'message', 'url_workflow'];
}
