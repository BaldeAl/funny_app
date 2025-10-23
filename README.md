# 🚀 Funny App - TaskMaster AI

> Transformez vos tâches ennuyeuses en quêtes épiques avec l'intelligence artificielle

[![Vue.js](https://img.shields.io/badge/Vue.js-3.4-4FC08D?style=flat-square&logo=vue.js)](https://vuejs.org)
[![Symfony](https://img.shields.io/badge/Symfony-7.0-000000?style=flat-square&logo=symfony)](https://symfony.com)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.4-38B2AC?style=flat-square&logo=tailwind-css)](https://tailwindcss.com)

## 📝 Description

**Funny App** est une application web moderne qui utilise l'IA Google Gemini pour transformer vos tâches quotidiennes en aventures épiques. Chaque tâche devient une quête héroïque avec des récompenses cosmiques.

## 🏗️ Structure du Projet

```
funny_app/
├── cosmic-quest-backend/     # API Backend Symfony
│   ├── src/
│   ├── config/
│   └── .env
│
├── cosmic-quest-frontend/    # Frontend Vue.js
│   ├── src/
│   └── package.json
│
└── README.md
```

## ✨ Fonctionnalités

- 🎮 **Génération de quêtes épiques** par IA
- 🛸 **Compliments cosmiques** personnalisés
- ☄️ **Excuses créatives** en cas d'échec
- 📜 **Historique des quêtes** avec recherche
- 🌟 **Système de karma** et progression
- 🎨 **Interface moderne** avec animations fluides

## 🛠️ Technologies Utilisées

### Backend
- **PHP 8.2+** - Langage de programmation
- **Symfony ^7** - Framework PHP
- **Google Gemini API** - Intelligence artificielle
- **Composer** - Gestionnaire de dépendances PHP

### Frontend  
- **Vue.js ^3.5** - Framework JavaScript progressif
- **Vite ^7** - Build tool ultra-rapide
- **TailwindCSS ^4** - Framework CSS utilitaire
- **Pinia** - Gestion d'état
- **Axios** - Client HTTP

## 🚦 Prérequis

- Node.js 18+ et npm
- PHP 8.2+
- Composer 2.0+
- Clé API Google Gemini

## 🚀 Installation Rapide

```bash
# Cloner le projet
git clone https://github.com/username/funny_app.git
cd funny_app

# Backend
cd cosmic-quest-backend
composer install
cp .env.example .env
# Ajouter votre GEMINI_API_KEY dans .env

# Frontend  
cd ../cosmic-quest-frontend
npm install
cp .env.example .env

# Lancer les services
# Terminal 1 - Backend
cd cosmic-quest-backend
symfony server:start

# Terminal 2 - Frontend
cd cosmic-quest-frontend
npm run dev
```

L'application sera accessible sur :
- Frontend : http://localhost:5173
- Backend : http://localhost:8000

## 📚 Documentation

- [Documentation Backend](./cosmic-quest-backend/README.md)
- [Documentation Frontend](./cosmic-quest-frontend/README.md)

## 🔧 Configuration

### Backend (.env)
```env
APP_ENV=dev
GEMINI_API_KEY=votre_cle_api_gemini
```

### Frontend (.env)
```env
VITE_API_URL=http://localhost:8000
```

## 📝 Licence

MIT License

---

<div align="center">
  Développé avec ❤️ et ☕
  
  ⭐ N'oubliez pas de mettre une étoile !
</div>