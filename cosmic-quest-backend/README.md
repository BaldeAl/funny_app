# 🚀 Cosmic Quest Backend

> API REST Symfony pour TaskMaster AI

## 📝 Description

Service API backend qui communique avec Google Gemini pour générer du contenu créatif. Transforme les tâches ennuyeuses en aventures épiques.

## 🛠️ Technologies

- **PHP 8.2+** - Langage principal
- **Symfony ^7** - Framework PHP moderne
- **Google Gemini API** - Intelligence artificielle pour la génération de contenu
- **Composer** - Gestion des dépendances
- **JSON** - Format d'échange de données

## 📁 Structure

```
cosmic-quest-backend/
├── src/
│   └── Controller/
│       └── BoostController.php    # Contrôleur principal
├── config/                         # Configuration Symfony
├── public/
│   └── index.php                  # Point d'entrée
├── var/                           # Cache et logs
├── .env                           # Variables d'environnement
└── composer.json                  # Dépendances PHP
```

## 🚀 Installation

```bash
# Installer les dépendances
composer install

# Configurer l'environnement
cp .env.example .env
# Éditer .env et ajouter GEMINI_API_KEY=votre_cle

# Lancer le serveur
symfony server:start
# ou
php -S localhost:8000 -t public
```

## 🔑 Configuration

```env
# .env
APP_ENV=dev
APP_SECRET=change_cette_valeur
GEMINI_API_KEY=votre_cle_api_gemini
```

## 📡 API Endpoints

### POST /api/boost

Génère du contenu motivationnel pour une tâche donnée.

**Requête :**
```json
{
  "task": "Finir ce rapport ennuyeux"
}
```

**Réponse :**
```json
{
  "quest": "La quête du rapport cristallin...",
  "compliment": "Ta vitesse de frappe rivalise avec les ordinateurs quantiques !",
  "excuse": "Une anomalie temporelle a supprimé ton travail."
}
```

## 🔒 Sécurité

- Clé API stockée dans les variables d'environnement
- Validation des entrées
- Gestion des erreurs robuste

## 🧪 Tests

```bash
php bin/phpunit
```

## 📝 Licence

MIT

---

<div align="center">
  Construit avec Symfony et ❤️
</div>
