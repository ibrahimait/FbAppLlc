<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ContactController extends Controller
{

    //  Une fois on depasse 5 lignes par tableau Ca d'affiche
    public function index(Request $request)
    {
        $contact = new Contact;
        $contact->setConnection('mysql2');
        
        $statuts = DB::connection('mysql2')->select('SELECT * FROM Factures');
        $contacts = DB::connection('mysql2')->select("SELECT * FROM Contact");
        $perPage = 2;
        $clients = Contact::sortable()->paginate(15)->withQueryString();
        return view('contacts.index', compact('statuts', 'contacts', 'clients', 'perPage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function multisearch(Request $request)
    {

        $multisearchnom = $request->get('multisearchnom');
        $multisearchtel = $request->get('multisearchtel');
        $multisearchprenom = $request->get('multisearchprenom');
        $multisearchmail = $request->get('multisearchmail');
        $multisearchstat = $request->get('multisearchstat');
        $clients = DB::connection('mysql2')->table('contact')

            ->where('mail', 'LIKE', '%' . $multisearchmail . '%')
            ->where('statut', 'LIKE', '%' . $multisearchstat . '%')
            ->where('tel', 'LIKE', '%' . $multisearchtel . '%')
            ->where('prenom', 'LIKE', '%' . $multisearchprenom . '%')
            ->where('nom', 'LIKE', '%' . $multisearchnom . '%')
            ->paginate(20);

        return view('contacts.index', ['contact' => $clients]);
    }

    // Direction view create

    public function create()
    {
        return view('contacts.create');
    }

    // Processus de creation
    public function store(Request $request)
    {
        $request->validate([

            'id_contact' => 'required',
            'nom',
            'prenom',
            'tel',
            'mail',
            'statut',
            'num_facture',
            'url_fact_stripe',
            'adresse',
            'CP',
            'ville'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', '');
    }

    // Direction vers le view de details du groupe
    public function show(Contact $contacts)
    {

        return view('contacts.show', compact('contacts'));
    }

    // Direction vers le view de la modification du groupe
    public function edit(Contact $clients)
    {
        return view('contacts.edit', compact('clients'));
    }

    // Processus de modification du groupe
    public function update(Request $request, Contact $clients)
    {
        $request->validate([

            'id_contact' => 'required',
            'nom' => 'required',
            'prenom',
            'tel',
            'mail',
            'statut',
            'num_facture',
            'url_fact_stripe',
            'adresse',
            'CP',
            'ville'
        ]);

        $clients->update($request->all());
        return redirect()->route('contacts.index')
            ->with('success', '');
    }

    // Procesuus de la suppression du groupe
    public function destroy(Contact $clients)
    {
        $clients->delete();
        return redirect()->route('contacts.index')
            ->with('success', '');
    }

    // Procesuus de la suppression plusieur groupe en meme temps
    public function deleteall_g(Request $request)
    {
        // $ids = $request->get('ids');
        // Client::whereIn('id', $ids)->delete();
        // return redirect('clients');
    }
    
}
