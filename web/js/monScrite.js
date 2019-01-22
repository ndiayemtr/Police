$(document).ready(function(){
    var listInfraction = {
        'Pièce': ['Conduite d’un véhicule dépourvu de police d’assurance', 'Défaut de présentation de carte grise', 'Défaut de présentation de permis de conduire',
            'Défaut de permis de conduire', 'Défaut de présentation de permis de conduire', 'Défaut de présentation de carte grise',
            'Défaut de carte de transport'],
        'Conduite': ['Stationnement sans signalisation appropriée en cas de panne ou de détresse', 'Excès de vitesse', 'Stationnement perturbateur', 'Circulation à gauche',
            'Changement brusque de direction', 'Refus de priorité', 'Encombrement de la voie publique', 'Inobservation de feux tricolores', 'Encombrement de passage cloué'],
        'Equipement': ['Défaut de boîte secours', 'Port de casque non homologué', 'Défaut d’extincteur pour véhicule', 'transportant un liquide inflammable'],
        'Vehicule': ['Gabarit non-conforme', 'Défaut de feux de gabarit', 'Défaillance du système de freinage', 'Teinte de vitre de voiture sans autorisation',
            'Ceinture de sécurité inopérante ou inexistante', 'Croisement défectueux', 'Dépassement défectueux', 'Défaut de feux stop ou feu freins', 'Défaut de feux arrière',
            'Défaut d’indicateur de changement de direction (clignotants)', 'Défaut ou modification de plaque de constructeur', 'Défaut de rétroviseur',
            'Défaut de pré signalisation pour les véhicules de 10 tonnes et plus', 'Échappement libre ou bruyant', 'Défaut de phare'],
        'Operation': ['Transport mixe de marchandises et des passagers', 'Surcharge de marchandises'],
        'Immatriculation': ['Défaut d’immatriculation', 'Défaut de plaque d’immatriculation', 'Illisibilité de plaque d’immatriculation', 'Plaque d’immatriculation non-conforme',
            'Défaut d’immatriculation', 'Défaut de plaque d’immatriculation'],
    };

    var listAment = {
        'Conduite d’un véhicule dépourvu de police d’assurance': ['2000'],
        'Défaut de présentation de carte grise': ['5000'],
        'Défaut de présentation de permis de conduire': ['3000'],
        'Défaut de permis de conduire': ['2500'],
        'Défaut de carte de transport': ['2000'],
        'Stationnement sans signalisation appropriée en cas de panne ou de détresse': ['1000'],
        'Excès de vitesse': ['4000'],
        'Stationnement perturbateur': ['2000'],
        'Circulation à gauche': ['1000'],
        'Changement brusque de direction': ['3000'],
        'Refus de priorité': ['1500'],
        'Encombrement de la voie publique': ['5000'],
        'Inobservation de feux tricolores': ['2500'],
        'Encombrement de passage cloué': ['3000'],
        'Défaut de boîte secours': ['2000'],
        'Port de casque non homologué': ['2000'],
        'Défaut d’extincteur pour véhicule': ['5000'],
        'transportant un liquide inflammable': ['10000'],
        'Gabarit non-conforme': ['4500'],
        'Défaut de feux de gabarit': ['3000'],
        'Défaillance du système de freinage': ['5000'],
        'Teinte de vitre de voiture sans autorisation': ['3500'],
        'Ceinture de sécurité inopérante ou inexistante': ['2000'],
        'Croisement défectueux': ['4000'],
        'Dépassement défectueux': ['3000'],
        'Défaut de feux stop ou feu freins': ['2500'],
        'Défaut de feux arrière': ['2000'],
        'Défaut d’indicateur de changement de direction (clignotants)': ['2000'],
        'Défaut ou modification de plaque de constructeur': ['6000'],
        'Défaut de rétroviseur': ['1500'],
        'Défaut de pré signalisation pour les véhicules de 10 tonnes et plus': ['6000'],
        'Échappement libre ou bruyant': ['4000'],
        'Défaut de phare': ['3500'],
        'Transport mixe de marchandises et des passagers': ['5000'],
        'Surcharge de marchandises': ['10000'],
        'Défaut d’immatriculation': ['5000'],
        'Défaut de plaque d’immatriculation': ['5000'],
        'Illisibilité de plaque d’immatriculation': ['3000'],
        'Plaque d’immatriculation non-conforme': ['10000'],

    };
    //$('#nom_infraction').hide();
    //$('#amende').hide();

    var $nom_infraction = $('#nom_infraction');
    $('#type_infraction').change(function () {
        //$('#nom_infraction').show()();
        var type_infraction = $(this).val(), lcns = listInfraction[type_infraction] || [];
        var html = $.map(lcns, function (lcn) {
            return '<option value="' + lcn + '">' + lcn + '</option>';
        }).join('');
        $nom_infraction.html(html);
    });

    var $amende = $('#amende');
    $('#nom_infraction').change(function () {
        
        var nom_infraction = $(this).val(), lcns = listAment[nom_infraction] || [];

        var html = $.map(lcns, function (lcn) {
            return '<input style="color: #0000F0 ; cursor: none; font-size: 20px; " name="amende" value="' + lcn + '">' + lcn + '</input>';
        }).join('');
        $amende.html(html);
    });
});


