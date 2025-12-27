# TP 3 - Formulaires Symfony

## Informations
- **Étudiant** : Zineb
- **Date** : 27/12/2024
- **Formation** : EHEI 2025/2026

## Réalisation

Ce projet implémente exactement ce qui est demandé dans le TP 3 : transformer le code HTML donné en formulaire Symfony.

### Fonctionnalités implémentées
1. ✅ **Page produit conforme au HTML fourni** - Identique à l'énoncé
2. ✅ **Formulaire Symfony avec Form Type** - ProductOrderType avec validation
3. ✅ **Validation des champs** - Quantité entre 1 et 10
4. ✅ **Bootstrap 5.3 intégré via CDN** - Comme demandé dans l'énoncé
5. ✅ **Page de confirmation d'achat** - Route POST vers `/cart`
6. ✅ **Code propre et structuré** - Architecture MVC Symfony

### Structure technique
- **ProductOrderType** : Formulaire Symfony avec contraintes de validation
- **ProductController** : Deux routes (GET `/` et POST `/cart`)
- **Templates Twig** : `index.html.twig` (produit) et `cart.html.twig` (confirmation)
- **Données statiques** : Valeurs directement dans le controller (pas de base de données)

### Conformité au TP
- ✅ **Transformation HTML → Symfony** : Code HTML fourni converti en templates Twig
- ✅ **Utilisation de Form Types** : ProductOrderType avec champs quantity et color
- ✅ **Intégration Bootstrap via CDN** : Ligne `<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">`
- ✅ **Formulaire avec validation** : Champ quantity limité à 1-10 avec message d'erreur
- ✅ **Deux pages** : Page produit + page confirmation
- ✅ **Méthode POST** : Formulaire envoyé avec `method="post" action="/cart"`

