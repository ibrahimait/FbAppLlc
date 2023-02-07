<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\Groupe;
use App\Models\Segement;
use App\Models\Segementation;
use App\Models\segment_groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class NotifController extends Controller
{

    //  Une fois on depasse 5 lignes par tableau Ca d'affiche
    public function index(Request $request)
    {
        $notif = new Notif;
        $notif->setConnection('mysql3');

        $data = DB::connection('mysql3')->select('SELECT * FROM Notification');

        $perPage = 2;
        $notifs = Notif::sortable()->paginate(15)->withQueryString();
        return view('notif.index', compact('data', 'notifs', 'perPage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function multisearch(Request $request)
    {

        $multisearchstatut = $request->get('multisearchstatut');
        $multisearchsearch = $request->get('multisearchsearch');
        $multisearchdate = $request->get('multisearchdate');
        $notifs = DB::connection('mysql3')->table('Notification')

            ->where('date', 'LIKE', '%' . $multisearchdate . '%')
            ->where('statut', 'LIKE', '%' . $multisearchstatut . '%')
        //     ->where('type', 'LIKE', '%' . $multisearchtype . '%')
            ->where('recherche', 'LIKE', '%' . $multisearchsearch . '%')
        //     ->where('nom', 'LIKE', '%' . $multisearchnom . '%')
            ->paginate(20);

        return view('notif.index', ['notifs' => $notifs]);
    }

    // Direction view create

    // public function create()
    // {
    //     return view('groupes.create');
    // }

    // Processus de creation
    // public function store(Request $request)
    // {
    //     $request->validate([

    //         'id_groupe' => 'required',
    //         'nom',
    //         'personnalisation',
    //         'nb_membres',
    //         'theme',
    //         'type',
    //         'reglementation',
    //         'url_a_propos',
    //         'frequence_post_mois',
    //         'format_groupe',
    //         'lieu',
    //         'actif_supprime',
    //         'statut_releve',
    //         'date_releve',
    //         'statut_integration',
    //         'tag_recherche',
    //     ]);

    //     Groupe::create($request->all());

    //     return redirect()->route('groupes.index')
    //         ->with('success', '');
    // }

    // Direction vers le view de details du groupe
    // public function show(Groupe $groupe, Segement $segement, Segementation $segementation)
    // {

    //     return view('groupes.show', compact('groupe', 'segement', 'segementation'));
    // }

    // Processus de modification du groupe
    // public function update(Request $request, Groupe $groupe)
    // {
    //     $request->validate([

    //         'id_groupe' => 'required',
    //         'nom' => 'required',
    //         'personnalisation',
    //         'nb_membres',
    //         'theme',
    //         'type',
    //         'reglementation',
    //         'url_a_propos',
    //         'frequence_post_mois',
    //         'format_groupe',
    //         'lieu',
    //         'actif_supprime',
    //         'statut_releve',
    //         'date_releve',
    //         'statut_integration',
    //         'tag_recherche',
    //     ]);

    //     $groupe->update($request->all());
    //     return redirect()->route('groupes.index')
    //         ->with('success', '');
    // }

    // Procesuus de la suppression du groupe
    // public function destroy(Groupe $groupe)
    // {
    //     $groupe->delete();
    //     return redirect()->route('groupes.index')
    //         ->with('success', '');
    // }

    // Procesuus de la suppression plusieur groupe en meme temps
    // public function deleteall_g(Request $request)
    // {
    //     $ids = $request->get('ids');
    //     Groupe::whereIn('id', $ids)->delete();
    //     return redirect('groupes');
    // }

    
}
