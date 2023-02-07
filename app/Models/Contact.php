<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Contact extends Model
{
    use HasFactory;
    use Sortable;
    protected $connection = 'mysql2';
    protected $table = 'Contact';
    protected $fillable = [
        'id_contact',
        'nom',
        'prenom',
        'tel',
        'email',
        'statut',
        'num_facture',
        'url_fact_stripe'
    ];
    public $sortable = [ 'id_contact', 'nom', 'prenom','tel','email', 'statut','num_facture', 'url_fact_stripe'];
}
