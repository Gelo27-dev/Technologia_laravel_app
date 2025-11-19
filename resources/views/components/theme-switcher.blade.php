<div x-data="{ visible: false }" x-cloak x-show="visible" x-init="window.addEventListener('showThemeSwitcher', () => { visible = true; })" class="flex items-center space-x-2">
    <div class="bg-gray-800/60 text-white px-3 py-2 rounded-lg shadow-lg flex items-center space-x-2">
        <button @click="document.body.classList.toggle('navbar-white-open')" class="btn-animated px-3 py-1 bg-orange-500 text-white rounded">White Nav</button>
        <button @click="visible = false; localStorage.setItem('themeSwitcherShown','true')" class="px-2 py-1 text-sm text-gray-300">Dismiss</button>
    </div>
</div>
