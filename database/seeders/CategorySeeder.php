<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing categories
        Category::query()->delete();

        // Parent Categories
        $laptops = Category::create([
            'name' => 'Laptops',
            'description' => 'Portable computers for work and gaming',
            'icon' => '💻',
            'is_active' => true,
        ]);

        $desktops = Category::create([
            'name' => 'Desktops',
            'description' => 'High-performance desktop computers',
            'icon' => '🖥️',
            'is_active' => true,
        ]);

        $components = Category::create([
            'name' => 'PC Components',
            'description' => 'Computer parts and accessories',
            'icon' => '🔧',
            'is_active' => true,
        ]);

        $peripherals = Category::create([
            'name' => 'Peripherals',
            'description' => 'Keyboards, mice, monitors, and other accessories',
            'icon' => '🖱️',
            'is_active' => true,
        ]);

        // Laptop Subcategories
        Category::create([
            'name' => 'Gaming Laptops',
            'description' => 'High-performance laptops for gaming',
            'parent_id' => $laptops->id,
            'icon' => '🎮',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Business Laptops',
            'description' => 'Professional laptops for business use',
            'parent_id' => $laptops->id,
            'icon' => '💼',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Ultrabooks',
            'description' => 'Thin and light laptops',
            'parent_id' => $laptops->id,
            'icon' => '📱',
            'is_active' => true,
        ]);

        // Desktop Subcategories
        Category::create([
            'name' => 'Gaming PCs',
            'description' => 'Custom gaming desktop computers',
            'parent_id' => $desktops->id,
            'icon' => '🎯',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Workstations',
            'description' => 'Professional workstations for creative work',
            'parent_id' => $desktops->id,
            'icon' => '🎨',
            'is_active' => true,
        ]);

        // PC Components Subcategories
        Category::create([
            'name' => 'Graphics Cards',
            'description' => 'GPU cards for gaming and graphics work',
            'parent_id' => $components->id,
            'icon' => '🎴',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Processors',
            'description' => 'CPU processors for computers',
            'parent_id' => $components->id,
            'icon' => '⚡',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Memory (RAM)',
            'description' => 'Computer memory modules',
            'parent_id' => $components->id,
            'icon' => '🧠',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Storage',
            'description' => 'Hard drives and SSD storage',
            'parent_id' => $components->id,
            'icon' => '💾',
            'is_active' => true,
        ]);

        // Peripherals Subcategories
        Category::create([
            'name' => 'Monitors',
            'description' => 'Computer display screens',
            'parent_id' => $peripherals->id,
            'icon' => '📺',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Keyboards',
            'description' => 'Computer keyboards and accessories',
            'parent_id' => $peripherals->id,
            'icon' => '⌨️',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Mice',
            'description' => 'Computer mice and pointing devices',
            'parent_id' => $peripherals->id,
            'icon' => '🐭',
            'is_active' => true,
        ]);
    }
}
