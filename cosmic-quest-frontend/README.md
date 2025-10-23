# 🎨 Cosmic Quest Frontend

> Interface utilisateur moderne pour TaskMaster AI

## 📝 Description

Application frontend moderne et responsive qui transforme les tâches en quêtes épiques. Design glassmorphism avec animations fluides et expérience utilisateur optimisée.

## 🛠️ Technologies

- **Vue.js ^3.5** - Framework JavaScript progressif
- **Vite ^7** - Build tool nouvelle génération
- **TailwindCSS ^4** - Framework CSS utilitaire
- **Pinia** - Gestion d'état pour Vue
- **Axios** - Client HTTP pour les appels API
- **JavaScript ES6+** - Syntaxe moderne
- **Canvas Confetti** - Animations de célébration

## 📁 Structure

```
cosmic-quest-frontend/
├── src/
│   ├── components/        # 22 composants modulaires
│   │   ├── BoostTab.vue  # Onglet génération
│   │   ├── HistoryTab.vue # Onglet historique
│   │   └── ...
│   ├── stores/           # Gestion d'état Pinia
│   ├── styles/           # CSS global
│   ├── App.vue           # Composant racine
│   └── main.js           # Point d'entrée
├── public/               # Assets statiques
├── package.json          # Dépendances npm
└── vite.config.js        # Configuration Vite
```

## 🎨 Fonctionnalités UI

- **Design Glassmorphism** - Effet verre dépoli moderne
- **Animations fluides** - Transitions et effets visuels
- **Responsive** - Adapté mobile et desktop
- **Mode sombre** - Interface agréable pour les yeux
- **Composants modulaires** - Architecture propre et maintenable

## 🚀 Installation

```bash
# Installer les dépendances
npm install

# Configurer l'environnement
cp .env.example .env

# Lancer en développement
npm run dev

# Build pour production
npm run build
```

## 🔑 Configuration

```env
# .env
VITE_API_URL=http://localhost:8000
```

## 📦 Scripts Disponibles

```bash
npm run dev      # Serveur de développement
npm run build    # Build production
npm run preview  # Prévisualiser le build
npm run lint     # Vérifier le code
```

## 🧩 Composants Principaux

- **TaskInput** - Champ de saisie intelligent
- **QuestResult** - Affichage des résultats
- **HistoryList** - Liste des quêtes passées
- **ToastNotification** - Notifications utilisateur
- **BackgroundStars** - Animation d'arrière-plan

## 🎯 Architecture

L'application utilise une architecture modulaire avec :
- **22 composants** réutilisables
- **Store Pinia** pour la gestion d'état
- **Composition API** de Vue 3
- **Props/Events** pour la communication

## 📱 Responsive Design

- Mobile First
- Breakpoints Tailwind
- Interface adaptative

## 📝 Licence

MIT

---

<div align="center">
  Construit avec Vue.js et 💚
</div>