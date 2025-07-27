#!/bin/bash

# Script to reinstall and configure phpMyAdmin on Apache (Ubuntu/Debian)

echo "🔁 Removing any existing phpMyAdmin installation..."
sudo apt purge -y phpmyadmin
sudo apt autoremove -y

echo "🆕 Updating package list..."
sudo apt update

echo "📦 Installing phpMyAdmin..."
# Preseed answers to avoid interactive prompt
echo 'phpmyadmin phpmyadmin/dbconfig-install boolean true' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/app-password-confirm password root' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/admin-pass password root' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/mysql/app-pass password root' | sudo debconf-set-selections
echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | sudo debconf-set-selections

sudo apt install -y phpmyadmin

# Link config file if not already linked
if [ ! -e /etc/apache2/conf-available/phpmyadmin.conf ]; then
    echo "🔗 Creating symlink for phpMyAdmin config..."
    sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf
fi

echo "⚙️ Enabling phpMyAdmin configuration in Apache..."
sudo a2enconf phpmyadmin

echo "🔁 Restarting Apache..."
sudo systemctl reload apache2

echo "✅ Done! You can now access phpMyAdmin at http://localhost/phpmyadmin"

