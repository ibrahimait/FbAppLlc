<?php

namespace App\Http\Controllers;

use App\Models\Reservationclient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class ReservationclientController extends Controller
{

    //  Une fois on depasse 5 lignes par tableau Ca d'affiche
    public function index(Request $request)
    {
        $reservation = new Reservationclient;
        $reservation->setConnection('mysql2');

        $data = DB::connection('mysql2')
            ->select('SELECT Experience.id_experience, Contact.nom, Contact.prenom, Contact.tel, Contact.email, Experience.statut_experience, Factures.num_facture, Factures.url_facture, Contact.id_contact 
                FROM Contact JOIN Experience JOIN Factures JOIN contact_facture JOIN contact_experience
                ON contact_facture.num_facture = Factures.num_facture
                AND contact_facture.id_contact = Contact.id_contact
                AND Experience.id_experience = contact_experience.id_experience
                AND Contact.id_contact = contact_experience.id_contact');

        $perPage = 2;
        // $reservations = Reservationclient::sortable()->paginate(15)->withQueryString();
        return view('reservationclient.index', compact('data', 'perPage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function multisearch(Request $request)
    // {

    //     $multisearchnom = $request->get('multisearchnom');
    //     $multisearchtel = $request->get('multisearchtel');
    //     $multisearchprenom = $request->get('multisearchprenom');
    //     $multisearchmail = $request->get('multisearchmail');
    //     $multisearchstat = $request->get('multisearchstat');
    //     $reservationclients = DB::connection('mysql2')->table('Contact')

    //         ->where('mail', 'LIKE', '%' . $multisearchmail . '%')
    //         ->where('statut_experience', 'LIKE', '%' . $multisearchstat . '%')
    //         ->where('tel', 'LIKE', '%' . $multisearchtel . '%')
    //         ->where('prenom', 'LIKE', '%' . $multisearchprenom . '%')
    //         ->where('nom', 'LIKE', '%' . $multisearchnom . '%')
    //         ->paginate(20);

    //     return view('reservationclient.index', ['reservationclient' => $reservationclients]);
    // }

    // Direction view create

    public function create()
    {
        return view('reservationclient.create');
    }

    // Processus de creation
    public function store(Request $request)
    {
        // $request->validate([
        //     'nom',
        //     'prenom',
        //     'tel',
        //     'email',
        //     'adresse',
        //     'ville',
        //     'code_postale',
        //     'nb_chanson',
        //     'nb_experimentateur',
        //     'description',
        //     'Id_produit'
        // ]);

        //jointures
        // DB::connection('mysql2')->table('contact_facture')->insert(['id_contact', 'id_facture']);
        // DB::connection('mysql2')->table('contact_experience')->insert(['id_contact', 'id_experience']);
        // DB::connection('mysql2')->table('facture_experience')->insert(['id_experience', 'id_facture']);
        // DB::connection('mysql2')->table('produit_facture')->insert(['id_facture', 'Id_produit']);

        if ($request->bon_cadeau === "oui" && isset($request->Id_produit)) {
            DB::connection('mysql2')->table('produit_facture')->insert(
                ['Id_produit' => $request->Id_produit,]
            );
        } else {
            $bon_cadeau = "non";
        }

        // dd();

        DB::connection('mysql2')->table('Contact')->insert(
            ['nom' => $request->nom, 'prenom' => $request->prenom, 'tel' => $request->tel, 'email' => $request->email, 'adresse' => $request->adresse, 'ville' => $request->ville, 'code_postale' => $request->code_postale]
        );



        DB::connection('mysql2')->table('Factures')->insert(
            ['nb_chanson' => $request->nb_chanson, 'nb_experimentateur' => $request->nb_experimentateur, 'description' => $request->description]
        );

        return redirect()->route('reservationclient.index')
            ->with('success', '');
    }

    // Direction vers le view de details du groupe
    public function show(Request $request)
    {
        $reservation = new Reservationclient;
        $reservation->setConnection('mysql2');

        $id_exp = DB::connection('mysql2')->select('SELECT id_experience FROM Experience');

        $urls = $request->fullUrl();
        // http: //127 .0.0. 1:800 0/res ervat ioncl ient. show? 1  (45 en local)
        // https ://te amfb. lalac hante .fr/r eserv ation clien t.sho w? 1  (52 en ligne)

        $url1 = (int) substr($urls, 52, 1);
        $url2 = (int) substr($urls, 52, 2);
        $url3 = (int) substr($urls, 52, 3);

        foreach ($id_exp as $key => $value) {
            if ($url1 === $value->id_experience) {
                $url = $url1;
            } elseif ($url2 === $value->id_experience) {
                $url = $url2;
            } elseif ($url3 === $value->id_experience) {
                $url = $url3;
            }
        }

        $bons = DB::connection('mysql2')->select('SELECT * FROM produit_facture');

        $dbs = DB::connection('mysql2')->select('SELECT Contact.nom, Contact.prenom, Contact.tel, Contact.email, Contact.adresse, Contact.code_postale, Contact.ville, Experience.nom_experience, Factures.num_facture, Factures.statut_facture, Factures.nb_chanson, Factures.nb_experimentateur, Factures.url_facture 
        FROM Contact JOIN Experience JOIN Factures JOIN contact_facture JOIN contact_experience
        ON contact_facture.num_facture = Factures.num_facture
        AND contact_facture.id_contact = Contact.id_contact
        AND Experience.id_experience = contact_experience.id_experience
        AND Contact.id_contact = contact_experience.id_contact
        WHERE Experience.id_experience=?', [$url]);
        // dd($dbs);
        return view('reservationclient.show', compact('dbs', 'bons'));
    }

    // Direction vers le view de la modification du groupe
    public function edit(Request $request)
    {
        $id = $request->fullUrl();
        // http: //127 .0.0. 1:800 0/res ervat ioncl ient. edit? 1  (45 en local)
        // https ://te amfb. lalac hante .fr/r eserv ation clien t.edi t? 1  (52 en ligne)

        $id2 = (int) substr($id, 52, 1);
        $id3 = (int) substr($id, 52, 2);
        $id4 = (int) substr($id, 52, 1);

        $idcontacts = DB::connection('mysql2')->select('SELECT id_contact FROM Contact');
        foreach ($idcontacts as $idcontact => $rang) {
            if ($id2 === $rang->id_contact) {
                $ids = DB::connection('mysql2')->select('SELECT id_contact FROM Contact WHERE id_contact=' . $id2);
            } elseif ($id3 === $rang->id_contact) {
                $ids = DB::connection('mysql2')->select('SELECT id_contact FROM Contact WHERE id_contact=' . $id3);
            } elseif ($id4 === $rang->id_contact) {
                $ids = DB::connection('mysql2')->select('SELECT id_contact FROM Contact WHERE id_contact=' . $id4);
            }
        }

        // dd($id2);

        return view('reservationclient.edit', compact('ids'));
    }

    // Processus de modification du groupe
    public function update(Request $request, $reservationclient)
    {
        $request->validate([

            'id_experience' => 'required',
            'nom' => 'required',
            'prenom',
            'tel',
            'email',
            'statut_experience',
            'num_facture',
            'url_facture'
        ]);

        $reservationclient->update($request->all());
        return redirect()->route('reservationclient.index')
            ->with('success', '');
    }

    // Procesuus de la suppression du groupe
    public function destroy(Reservationclient $reservations)
    {
        $reservations->delete();
        return redirect()->route('reservationclient.index')
            ->with('success', '');
    }

    // Procesuus de la suppression plusieur groupe en meme temps
    public function deleteall_g(Request $request)
    {
        // $ids = $request->get('ids');
        // Client::whereIn('id', $ids)->delete();
        // return redirect('clients');
    }

    public function valid(Request $request)
    {

        return view('reservationclient.validate');
    }
}
