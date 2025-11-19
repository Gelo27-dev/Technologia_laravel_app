# TechVault - Laptop & PC Components Store Design System

## Overview
Unified design system for consistent, modern UI/UX across all pages. Features a dark mode with aggressive orange-red accent color, glassmorphism effects, and smooth animations. Tailored for a premium PC components e-commerce experience.

---

## Color Palette

### Primary Colors
- **Primary Accent**: `#ff4500` (Aggressive Orange-Red/Scarlet) - Used for CTAs, hovers, highlights
- **Secondary**: `#1a1a1a` (Deep Charcoal) - Navigation, cards, containers
- **Background**: `#0d0d0d` (Near Black) - Page background
- **Text**: `#f0f0f0` (Off-White) - Main text color

### Secondary Colors
- **Gray Accent**: `#666666` - Secondary text, borders
- **Success**: `#10b981` - Success messages, positive actions
- **Error**: `#ef4444` - Error messages, destructive actions
- **Warning**: `#f59e0b` - Warning messages

### CSS Variables (defined in `resources/css/app.css`)
```css
--color-store-primary: #ff4500
--color-store-secondary: #1a1a1a
--color-store-background: #0d0d0d
--color-store-text: #f0f0f0
```

---

## Typography

- **Font Family**: Inter (via Google Fonts)
- **Font Variants**: 100-900 weights

### Text Hierarchy
- **Display (H1)**: `text-5xl md:text-7xl font-extrabold` - Page titles, hero sections
- **Heading 2 (H2)**: `text-4xl font-extrabold` - Section titles
- **Heading 3 (H3)**: `text-2xl font-bold` - Subsection titles
- **Body**: `text-base md:text-lg` - Main content
- **Small**: `text-sm` - Labels, secondary info
- **Tiny**: `text-xs` - Badges, fine print

---

## Component Library

### Buttons

#### Primary Button (`.btn-primary`)
- Background: `#ff4500`
- Text: White
- Padding: `px-4 py-2` (small), `px-10 py-4` (large)
- Border radius: `rounded-lg`
- Hover: Scale 1.05, shadow enhancement
- Focus: Ring on primary color

**Usage**:
```html
<a href="..." class="btn-primary text-lg px-10 py-4 
  transform hover:scale-105 transition duration-300 
  shadow-2xl hover:shadow-[0_0_20px_0_rgba(255,69,0,0.5)]">
  Explore Courses &rarr;
</a>
```

#### Secondary Button
- Background: `bg-gray-700`
- Text: White
- Hover: `hover:bg-gray-600`

#### Danger Button
- Background: `bg-red-600`
- Text: White
- Hover: `hover:bg-red-700`

---

### Cards

#### Tech Card (`.card-tech`)
- Background: `var(--color-store-secondary)` (#1a1a1a)
- Padding: `p-6` to `p-8`
- Border: `border border-gray-700`
- Border radius: `rounded-xl`
- Shadow: Enhanced hover shadow with orange glow
- Hover: Scale 1.03, border color change to primary accent
- Transition: `duration-300`

**Usage**:
```html
<div class="card-tech text-center p-8 border border-gray-700 
  hover:border-primary-accent/70">
  <h3 class="text-2xl font-bold text-[var(--color-store-text)]">Title</h3>
  <p class="text-gray-400">Description</p>
</div>
```

#### Glass Card (`.glass-card`)
- Background: `var(--color-store-secondary)` with transparency
- Backdrop: Blur effect
- Border: Subtle gradient border
- Used for hero sections and featured content

---

### Forms

#### Input Fields
- Background: `bg-gray-800`
- Border: `border-gray-700`
- Text: `text-white`
- Focus: `focus:border-primary-accent focus:ring focus:ring-primary-accent/50`

**Usage**:
```html
<input type="text" 
  class="w-full px-4 py-2 bg-gray-800 border border-gray-700 
  rounded-lg text-white placeholder-gray-500
  focus:border-primary-accent focus:ring focus:ring-primary-accent/50">
```

#### Labels
- Color: `text-gray-300`
- Font weight: `font-medium`

#### Error Messages
- Color: `text-red-400`
- Background: `bg-red-900/30` (if in container)

---

### Navigation

#### Navbar
- Background: `bg-[var(--color-store-secondary)]`
- Border: `border-b border-gray-800`
- Position: `sticky top-0 z-50`
- Shadow: `shadow-xl`

#### Nav Links
- Text color: `text-[var(--color-store-text)]`
- Hover: `hover:text-primary-accent`
- Border: `border-transparent hover:border-primary-accent`

---

### Alerts & Messages

#### Success Alert
```html
<div class="p-4 bg-green-900/30 border border-green-700 
  text-green-300 rounded-lg">
  {{ message }}
</div>
```

#### Error Alert
```html
<div class="p-4 bg-red-900/30 border border-red-700 
  text-red-300 rounded-lg">
  {{ message }}
</div>
```

#### Warning Alert
```html
<div class="p-4 bg-yellow-900/30 border border-yellow-700 
  text-yellow-300 rounded-lg">
  {{ message }}
</div>
```

---

### Tables

#### Table Styling
- Background: `bg-gray-900`
- Headers: `bg-gray-800 text-white`
- Borders: `border border-gray-700`
- Rows: Alternate hover effect `hover:bg-gray-800`

**Usage**:
```html
<table class="w-full">
  <thead class="bg-gray-800 text-white">
    <tr>
      <th class="px-4 py-2 text-left">Header</th>
    </tr>
  </thead>
  <tbody>
    <tr class="border-b border-gray-700 hover:bg-gray-800">
      <td class="px-4 py-2">Data</td>
    </tr>
  </tbody>
</table>
```

---

## Animations & Effects

### Hero Pulse (`.hero-pulse`)
- Animation: Pulsing border glow
- Duration: 3s infinite
- Colors: Orange-red glow effect
- CSS: Defined in `app.css`

### Fade & Slide Animations
- Fade in: `animate-in fade-in`
- Slide in: `animate-in slide-in-from-bottom-8`
- Duration: `duration-700`, `duration-900`

### Hover Transitions
- Scale: `hover:scale-105` or `hover:scale-[1.03]`
- Duration: `transition duration-300`
- Easing: `ease-in-out`

### Shadow Effects
- Normal shadow: `shadow-lg` or `shadow-2xl`
- Glow on hover: `hover:shadow-[0_0_20px_0_rgba(255,69,0,0.5)]`

---

## Layout & Spacing

### Container
- Max width: `max-w-7xl`
- Padding: `sm:px-6 lg:px-8`
- Centering: `mx-auto`

### Sections
- Vertical padding: `py-12` to `py-16`
- Horizontal padding: `px-4` to `px-8`
- Gaps: `gap-8` for grid layouts

### Vertical Rhythm
- Section margins: `mb-12 mt-20`
- Element margins: `mb-4` to `mb-10`
- Line height: `leading-tight` to `leading-relaxed`

---

## Grid System

### Responsive Grid
```html
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
  <!-- items auto-distribute -->
</div>
```

### Common Breakpoints
- Mobile: Default (< 640px)
- Small: `sm:` (640px+)
- Medium: `md:` (768px+)
- Large: `lg:` (1024px+)

---

## Implementation Guidelines

### 1. Page Structure
Every page should follow this structure:
```html
<div class="pb-12 pt-0 min-h-screen">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <!-- Page content -->
  </div>
</div>
```

### 2. Section Headers
```html
<h2 class="text-4xl font-extrabold text-center mb-16 
  text-[var(--color-store-text)] tracking-tight">
  <span class="border-b-4 border-primary-accent/50 pb-1">
    Section Title
  </span> ✨
</h2>
```

### 3. Content Cards Grid
```html
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
  <div class="card-tech text-center p-8 border border-gray-700 
    hover:border-primary-accent/70">
    <!-- card content -->
  </div>
</div>
```

### 4. Form Sections
Use dark inputs with primary accent focus states. Wrap forms in card containers for consistency.

### 5. Text Colors
- Primary text: Always use `text-[var(--color-store-text)]` or `text-gray-300`
- Secondary text: `text-gray-400`
- Accent text: `text-primary-accent`
- Links: `text-primary-accent hover:text-white`

---

## Converting Existing Pages

### Checklist
- [ ] Replace background colors with dark theme (#0d0d0d, #1a1a1a)
- [ ] Update text colors to light theme (#f0f0f0, #e5e5e5)
- [ ] Replace indigo/blue colors with primary accent (#ff4500)
- [ ] Update button styles to use `.btn-primary`
- [ ] Replace card backgrounds with `.card-tech`
- [ ] Update form inputs to dark theme with primary focus state
- [ ] Ensure proper contrast ratios for accessibility
- [ ] Add hover effects and transitions
- [ ] Test responsive design on mobile devices

---

## Accessibility

- **Color Contrast**: Ensure WCAG AA compliance (4.5:1 ratio for text)
- **Focus States**: Visible focus rings on interactive elements
- **Semantic HTML**: Use proper heading hierarchy
- **Alt Text**: Include descriptive alt text for images
- **ARIA Labels**: Add where needed for screen readers

---

## Performance

- Use Tailwind CSS utility classes (no custom CSS unless necessary)
- Avoid unnecessary animations on lower-end devices
- Optimize images and lazy load where possible
- Use CSS variables for theming consistency

---

## File References

- **CSS**: `resources/css/app.css` - Contains color variables and component definitions
- **Layout**: `resources/views/layouts/app.blade.php` - Main layout template
- **Welcome**: `resources/views/welcome.blade.php` - Reference implementation
- **Tailwind Config**: `tailwind.config.js` - Theme and plugin configuration

