include .env

COMPOSE_FILES=docker-compose.yml
ROOT_USER=root

up:
	@echo "App: STARTING ..."
	@docker-compose -f $(COMPOSE_FILES) up -d
	@echo "App: STARTED"
	@echo "click to open: http://0.0.0.0:"${APP_PORT}

down:
	@echo "App: STOPPING..."
	@docker-compose -f $(COMPOSE_FILES) down
	@echo "App: STOPPED..."

shell:
	docker-compose -f $(COMPOSE_FILES) exec php bash

shell-as-root:
	docker-compose -f $(COMPOSE_FILES) exec --user=$(ROOT_USER) app bash

logs: 
	@docker-compose logs -f