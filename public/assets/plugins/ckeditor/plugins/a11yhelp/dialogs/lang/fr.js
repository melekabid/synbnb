﻿/*
 Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
CKEDITOR.plugins.setLang("a11yhelp", "fr", {
    title: "Instructions d'accessibilité",
    contents: "Contenu de l'aide. Pour fermer ce dialogue, appuyez sur la touche ÉCHAP (Echappement).",
    legend: [{
        name: "Général",
        items: [{
            name: "Barre d'outils de l'éditeur",
            legend: "Appuyer sur ${toolbarFocus} pour accéder à la barre d'outils. Se déplacer vers les groupes suivant ou précédent de la barre d'outil avec les touches MAJ et MAJ+TAB. Se déplacer vers les boutons suivant ou précédent de la barre d'outils avec les touches FLÈCHE DROITE et FLÈCHE GAUCHE. Appuyer sur la barre d'espace ou la touche ENTRÉE pour activer le bouton de barre d'outils."
        },
            {
                name: "Dialogue de l'éditeur",
                legend: "Dans un dialogue, appuyer sur TAB pour aller à l'élément suivant du dialogue, appuyer sur MAJ+TAB pour aller à l'élément précédent du dialogue, appuyer sur ECHAP pour annuler le dialogue. Quand un dialogue a de multiples onglets, on peut accéder à la liste des onglets avec ALT+F10 ou avec TAB. Dans la liste des onglets, se déplacer vers le suivant ou le précédent avec les FLECHES DROITE et GAUCHE respectivement."
            }, {
                name: "Menu contextuel de l'éditeur",
                legend: "Appuyer sur ${contextMenu} ou entrer le RACCOURCI CLAVIER pour ouvrir le menu contextuel. Puis se déplacer vers l'option suivante du menu avec les touches TAB ou FLÈCHE BAS. Se déplacer vers l'option précédente avec les touches  MAJ+TAB ou FLÈCHE HAUT. appuyer sur la BARRE D'ESPACE ou la touche ENTRÉE pour sélectionner l'option du menu. Oovrir le sous-menu de l'option courante avec la BARRE D'ESPACE ou les touches ENTRÉE ou FLÈCHE DROITE. Revenir à l'élément de menu parent avec les touches ÉCHAP ou FLÈCHE GAUCHE. Fermer le menu contextuel avec ÉCHAP."
            },
            {
                name: "Zone de liste de l'éditeur",
                legend: "Dans la liste en menu déroulant, se déplacer vers l'élément suivant de la liste avec les touches TAB ou FLÈCHE BAS. Se déplacer vers l'élément précédent de la liste avec les touches MAJ+TAB ou FLÈCHE HAUT. Appuyer sur la BARRE D'ESPACE ou sur ENTRÉE pour sélectionner l'option dans la liste. Appuyer sur ÉCHAP pour fermer le menu déroulant."
            }, {
                name: "Barre d'emplacement des éléments de l'éditeur",
                legend: "Appuyer sur ${elementsPathFocus} pour naviguer vers la barre d'emplacement des éléments de l'éditeur. Se déplacer vers le bouton d'élément suivant avec les touches TAB ou FLÈCHE DROITE. Se déplacer vers le bouton d'élément précédent avec les touches MAJ+TAB ou FLÈCHE GAUCHE. Appuyer sur la BARRE D'ESPACE ou sur ENTRÉE pour sélectionner l'élément dans l'éditeur."
            }]
    },
        {
            name: "Commandes",
            items: [{name: " Annuler la commande", legend: "Appuyer sur ${undo}"}, {
                name: "Refaire la commande",
                legend: "Appuyer sur ${redo}"
            }, {name: " Commande gras", legend: "Appuyer sur ${bold}"}, {
                name: " Commande italique",
                legend: "Appuyer sur ${italic}"
            }, {name: " Commande souligné", legend: "Appuyer sur ${underline}"}, {
                name: " Commande lien",
                legend: "Appuyer sur ${link}"
            }, {name: " Commande enrouler la barre d'outils", legend: "Appuyer sur ${toolbarCollapse}"}, {
                name: "Accéder à la précédente commande d'espace de mise au point",
                legend: "Appuyez sur ${accessPreviousSpace} pour accéder à l'espace hors d'atteinte le plus proche avant le caret, par exemple: deux éléments HR adjacents. Répétez la combinaison de touches pour atteindre les espaces de mise au point distants."
            }, {
                name: "Accès à la prochaine commande de l'espace de mise au point",
                legend: "Appuyez sur ${accessNextSpace} pour accéder au plus proche espace de mise au point hors d'atteinte après le caret, par exemple: deux éléments HR adjacents. répétez la combinaison de touches pour atteindre les espace de mise au point distants."
            },
                {name: " Aide Accessibilité", legend: "Appuyer sur ${a11yHelp}"}]
        }],
    backspace: "Retour arrière",
    tab: "Tabulation",
    enter: "Entrée",
    shift: "Majuscule",
    ctrl: "Ctrl",
    alt: "Alt",
    pause: "Pause",
    capslock: "Verr. Maj.",
    escape: "Échap",
    pageUp: "Page supérieure",
    pageDown: "Page inférieure",
    end: "Fin",
    home: "Retour",
    leftArrow: "Flèche gauche",
    upArrow: "Flèche haute",
    rightArrow: "Flèche droite",
    downArrow: "Flèche basse",
    insert: "Insertion",
    "delete": "Supprimer",
    leftWindowKey: "Touche Windows gauche",
    rightWindowKey: "Touche Windows droite",
    selectKey: "Touche menu",
    numpad0: "Pavé numérique 0",
    numpad1: "Pavé numérique 1",
    numpad2: "Pavé numérique 2",
    numpad3: "Pavé numérique 3",
    numpad4: "Pavé numérique 4",
    numpad5: "Pavé numérique 5",
    numpad6: "Pavé numérique 6",
    numpad7: "Pavé numérique 7",
    numpad8: "Pavé numérique 8",
    numpad9: "Pavé numérique 9",
    multiply: "Multiplier",
    add: "Addition",
    subtract: "Soustraire",
    decimalPoint: "Point décimal",
    divide: "Diviser",
    f1: "F1",
    f2: "F2",
    f3: "F3",
    f4: "F4",
    f5: "F5",
    f6: "F6",
    f7: "F7",
    f8: "F8",
    f9: "F9",
    f10: "F10",
    f11: "F11",
    f12: "F12",
    numLock: "Verrouillage numérique",
    scrollLock: "Arrêt défilement",
    semiColon: "Point virgule",
    equalSign: "Signe égal",
    comma: "Virgule",
    dash: "Tiret",
    period: "Point",
    forwardSlash: "Barre oblique",
    graveAccent: "Accent grave",
    openBracket: "Parenthèse ouvrante",
    backSlash: "Barre oblique inverse",
    closeBracket: "Parenthèse fermante",
    singleQuote: "Apostrophe"
});