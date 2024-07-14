docker info > /dev/null 2>&1

# Ensure that Docker is running...
if [ $? -ne 0 ]; then
    echo "Docker is not running."
    exit 1
fi

CYAN='\033[0;36m'
LIGHT_CYAN='\033[1;36m'
BOLD='\033[1m'
GREEN='\033[32m'
NC='\033[0m'

# Copy environment config
echo -e "${BOLD}Copy file .env.local to .env:${NC} \c"
cp .env.local .env
echo -e "${GREEN}Done${NC}"

# Install dependencies
echo ""
echo -e "${BOLD}Install dependencies${NC}"
echo ""

docker run --rm \
    --pull=always \
    -v "$(pwd)":/opt \
    -w /opt \
    laravelsail/php83-composer:latest \
    bash -c "composer install --ignore-platform-req=ext-intl"

#    bash -c "apt-get update && apt-get install -y libicu-dev && docker-php-ext-install intl && composer install"


# Allow build with no additional services..
echo ""
echo -e "${BOLD}Build additional services${NC}"
echo ""

if [ "mysql redis meilisearch mailpit selenium phpmyadmin" == "none" ]; then
    ./vendor/bin/sail build
else
    ./vendor/bin/sail pull mysql redis meilisearch mailpit selenium phpmyadmin
    ./vendor/bin/sail build
fi

echo ""

if sudo -n true 2>/dev/null; then
    sudo chown -R $USER: .
else
    echo -e "${BOLD}Please provide your password so we can make some final adjustments to your application's permissions.${NC}"
    echo ""
    sudo chown -R $USER: .
    echo ""
fi
echo -e "Thank you! ${GREEN}Done${NC}"

# Start Laravel Sail
echo ""
echo -e "${BOLD}Start Laravel Sail${NC}"
echo ""
./vendor/bin/sail up -d

# Create the storage symbolic links
echo ""
echo -e "${BOLD}Create the storage symbolic links${NC}"
echo ""

./vendor/bin/sail artisan storage:link

# Install frontend dependencies
echo ""
echo -e "${BOLD}Install frontend dependencies${NC}"
echo ""

./vendor/bin/sail npm install

# Run database migrations
echo ""
echo -e "${BOLD}Run database migrations${NC}"
echo ""

./vendor/bin/sail artisan migrate

# Seed the database with records
echo ""
echo -e "${BOLD}Seed the database with records${NC}"
echo ""

./vendor/bin/sail artisan db:seed


# Success
echo ""
echo -e "${GREEN}Success${NC}"
echo -e "You can access the application in your web browser at: ${BOLD}http://localhost${NC}"
echo ""
exit 1
