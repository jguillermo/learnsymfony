# Docker Seed

## Install

```bash
$ ./scripts/tasks.build.sh
```

```bash
$ docker-compose down
$ docker-compose up
```

```bash
$ ./scripts/tasks.migration.sh migrate
$ ./scripts/tasks.migration.sh generate
$ ./scripts/tasks.migration.sh status
```

```bash
$ ./scripts/tasks.composer.sh install
$ ./scripts/tasks.composer.sh update
```

```bash
./docker/scripts/tasks.console.sh doctrine:schema:update --force
```


## Open
http://localhost:8081/