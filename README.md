# Trabalho_Final

# Iniciar MySQL
sudo service mysql start

# Verificar se iniciou
sudo service mysql status

# Se pedir senha, deixe em branco (apenas Enter)
# Testar conexão
mysql -u laravel -psenha123 gestao_produtos -e "SELECT 1;"

# Se der erro, vamos reconfigurar
sudo mysql -e "CREATE USER IF NOT EXISTS 'laravel'@'localhost' IDENTIFIED BY 'senha123';"
sudo mysql -e "GRANT ALL PRIVILEGES ON gestao_produtos.* TO 'laravel'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Verificar .env
cat .env | grep DB_

# Se as credenciais estiverem erradas, editar:
nano .env

pkill -f "php artisan serve"
php artisan serve --host=0.0.0.0 --port=8000

Email: admin@teste.com
Senha: 123456

