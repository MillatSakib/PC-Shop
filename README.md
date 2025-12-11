# PC Shop

- If you run this project on docker for the first time then execute the command below:

```sh
sudo docker compose up -d --build
```

- If you run this container before then execute the command bellow :

```sh
sudo docker compose down
sudo docker rm -f pc-shop-app-1
sudo docker rm -f pc-shop-db-1
sudo docker volume rm $(docker volume ls -q)
sudo docker compose down -v
sudo docker compose down --remove-orphans
sudo docker compose build --no-cache
sudo docker compose up -d
```
