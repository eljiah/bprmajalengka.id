#!/bin/bash
set -e

echo "=========================================="
echo "🚀 Memulai Deployment Perumda BPR Majalengka"
echo "=========================================="

# 1. Tarik pembaruan kode dari GitHub
echo "📥 1. Mengambil pembaruan dari Git origin main..."
git pull origin main

# 2. Update dependensi Composer tanpa dependensi dev
echo "📦 2. Mengoptimalkan dependensi Composer..."
composer install --no-dev --optimize-autoloader --no-interaction

# 3. Jalankan migrasi database produksi secara aman
echo "🗄️ 3. Menjalankan migrasi database..."
php artisan migrate --force

# 4. Hubungkan storage link publik
echo "🔗 4. Memverifikasi storage link..."
php artisan storage:link || true

# 5. Segarkan dan optimalkan cache sistem
echo "⚡ 5. Membangun cache performa Laravel..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=========================================="
echo "✅ Deployment Sukses! Website siap digunakan."
echo "=========================================="
