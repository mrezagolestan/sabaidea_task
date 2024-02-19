## Saba Idea Task

### Prerequisites:
1. Makefile
2. Docker
3. Docker-compose

### Step 1:
Copy Example `.env` file 
```bash
$ cp .env.example .env
```

### Step 2:
set `.env` values as expected

### Step 3:
In order to build & run docker containers, run below command:
```bash
$ make up
```

### Step 4:
In Order to make project ready, run below command:

```bash
$ make provision
```

now you can access to project via browser ( `link provided after make up command` )

you can stop project by running
```bash
$ make down
```

### Description
- Authentication simulated & you're open website as user id `1`. authentication can be completed by `Auth` class completion and adding `login` `logout` , etc pages.

- I made a simple framework for this project consist of
  - Router
  - Request wrapper (for security & code style simplicity)
  - PDO DB
  - Config (read from `.env` file)
  - Controller
  - Repository
  - Views
  - Layout