# 📬 Gestion du courrier administratif

Application web de gestion du courrier administratif développée avec
Laravel.

## 📌 Présentation

La gestion du courrier administratif repose encore souvent sur des
processus manuels qui peuvent rendre difficile l'enregistrement, le
suivi et la traçabilité des courriers.

Ce projet consiste à développer une plateforme web permettant de
digitaliser progressivement la gestion du courrier administratif au
sein d'une organisation.

L'application permettra notamment de gérer les utilisateurs, les
courriers entrants ainsi que leurs réponses sortantes.

> 🚧 **Projet en cours de développement**

---

## 🎯 Objectifs du projet

La plateforme a pour objectifs de :

- centraliser la gestion du courrier administratif ;
- faciliter l'enregistrement des courriers ;
- améliorer le suivi du traitement des courriers ;
- faciliter la gestion des réponses aux courriers reçus ;
- assurer une meilleure traçabilité des opérations ;
- adapter les fonctionnalités accessibles aux différents rôles des
  utilisateurs.

---

## 👥 Gestion des utilisateurs

La première partie du projet concerne la gestion des utilisateurs.

### Fonctionnalités actuellement disponibles

- [x] Inscription des utilisateurs
- [x] Authentification
- [x] Connexion
- [x] Déconnexion
- [x] Gestion des rôles
- [x] Gestion des utilisateurs
- [x] Accès aux fonctionnalités selon le rôle

---

## 📬 Gestion du courrier

La gestion du courrier constitue le principal objectif fonctionnel de
la plateforme.

### Courriers entrants

Fonctionnalités prévues :

- [ ] Dépôt d'un courrier
- [ ] Enregistrement du courrier
- [ ] Attribution d'un numéro
- [ ] Transmission du courrier
- [ ] Affectation du courrier
- [ ] Traitement du courrier
- [ ] Suivi de l'état du courrier

### Réponses sortantes

Fonctionnalités prévues :

- [ ] Création d'une réponse
- [ ] Traitement de la réponse
- [ ] Validation de la réponse
- [ ] Transmission de la réponse
- [ ] Suivi de la réponse

### Autres fonctionnalités prévues

- [ ] Notifications
- [ ] Historique des traitements
- [ ] Recherche et filtrage
- [ ] Statistiques
- [ ] Gestion des pièces jointes

---

## 👤 Rôles des utilisateurs

La plateforme est conçue autour de plusieurs rôles afin de permettre
à chaque acteur d'accéder aux fonctionnalités qui lui sont destinées.

Les rôles actuellement prévus comprennent notamment :

- Utilisateur externe
- Personnel
- Chef de service
- Secrétaire
- Directeur
- Administrateur

Les permissions et fonctionnalités associées à chaque rôle sont
progressivement intégrées au projet.

---

## 🛠️ Technologies utilisées

### Backend

- **PHP**
- **Laravel**

### Frontend

- **Blade**
- **Tailwind CSS**
- **JavaScript**

### Base de données

- **MySQL**

### Outils de développement

- **Visual Studio Code**
- **Git**
- **GitHub**

---

## 🏗️ Architecture

L'application est développée avec Laravel et repose sur
l'architecture **MVC (Modèle - Vue - Contrôleur)**.

L'organisation principale du projet est la suivante :

```text
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/

database/
├── migrations/
├── seeders/
└── factories/

resources/
├── views/
└── js/

routes/
└── web.php

tests/