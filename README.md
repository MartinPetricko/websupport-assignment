## Docker Initialization

### 1. Bash alias
```bash
alias dcomposer='docker-compose run --rm composer'
```

```bash
source ~/.bashrc
```

### 2. Docker compose
```bash
docker-compose up
```

Application is available at
```
http://localhost:8000
```

For project initialization with docker use
```bash
dcomposer
```

## Project Initialization

### 1. Copy .env.example to .env
```bash
cp .env.example .env
```

### 2. Install dependencies
```bash
composer install
```
