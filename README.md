# Plugin Grenier

Le plugin Grenier reçoit des fonctions ou fichiers supprimés de SPIP ou des plugins-dist de la distribution.

## Objectifs

Dans la mesure du possible, permettre aux sites ou plugins de **temporairement** utiliser ce plugin pour
maintenir un fonctionnement avec une version de SPIP plus récente que leur compatibilité réelle,
laissant un peu de temps pour les mainteneurs du site ou du plugin de mettre à jour le code.

## Fonctionnement

Ce plugin reçoit des fichiers et/ou fonctions issues de SPIP qui sont supprimées dans une certaine version.
Les éléments sont conservés dans ce plugin pour 1 version majeure de SPIP.

Le plugin n'a pas vocation à être un support complet de retro-compatibilité.

### Exemple

- SPIP 3.1 rend déprécié une fonction A() (un tag `@deprecated 3.1` est indiqué généralement).
- SPIP 4.0 supprime la fonction A.
- Le Grenier reçoit la fonction A (un tag `@removed from SPIP 4.0` est ajouté dessus)

Le Grenier conserve la fonction A() pendant 1 version majeure de SPIP, ici jusqu'à SPIP 5.0.
## Utilisation

Dans votre code PHP, ajouter `include_spip('inc/vieilles_defs');` pour charger toutes ces vieilles fonctions.

## Note sur SPIP < 4

La version majeure précédent SPIP 4.0 est SPIP 3.2
Dans la branche SPIP 4.0 de ce plugin, on conserve à partir de `@deprecated 3.2`, non pas `3.0`)