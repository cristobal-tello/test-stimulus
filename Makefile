PROJECT_NAME=test-stimulus
USER_ID:=$(shell id -u)
GROUP_ID:=$(shell id -g)
COMPOSE=docker-compose -p "$(PROJECT_NAME)" -f docker/docker-compose.yml

.EXPORT_ALL_VARIABLES:
DOCKER_UID=$(USER_ID)
DOCKER_GID=$(GROUP_ID)


start:
	$(COMPOSE) up -d

stop:
	$(COMPOSE) stop
	
restart:
	$(MAKE) stop && $(MAKE) start

down:
	$(COMPOSE) down

bash:
	docker exec -it $(PROJECT_NAME)-app bash

mysql_bash:
	docker exec -it $(PROJECT_NAME)-db bash

logs:
	docker logs $(PROJECT_NAME)-app

php-fpm_logs:
	$(COMPOSE) logs php-fpm

nginx_logs:
	$(COMPOSE) logs nginx

nginx_bash:
	docker exec -it ${PROJECT_NAME}-nginx bash

mysql_logs:
	docker exec -it $(PROJECT_NAME)-db tail -n 100 /var/lib/mysql/general.log

code-format-check:
	./vendor/bin/php-cs-fixer fix code/src --dry-run --verbose

code-format-fix:
	./vendor/bin/php-cs-fixer fix code/src --verbose

code-analyse:
	./vendor/bin/phpstan analyse code/src -c phpstan.dist.neon
