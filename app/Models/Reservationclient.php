<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Reservationclient extends Model
{
    use HasFactory;
    use Sortable;
    protected $connection = 'mysql2';
    protected $table1 = 'Contact';
    protected $table2 = 'produit_facture';
    protected $table3 = 'Factures';
    protected $fillable = [
        'Contact.nom',
        'Contact.prenom',
        'Contact.tel',
        'Contact.email',
        'Contact.adresse',
        'Contact.ville',
        'Contact.code_postale',
        'Factures.nb_chanson',
        'Factures.nb_experimentateur',
        'Factures.message',
        'produit_facture.Id_produit',
        
    ];
    public $sortable = [ 'Contact.nom', 'Contact.prenom','Contact.tel','Contact.email', 'Contact.adresse', 'Contact.ville', 'Contact.code_postale', 'Factures.nb_chanson', 'Factures.nb_experimentateur', 'Factures.message', 'produit_facture.Id_produit'];
}
