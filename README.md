<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Job App for asaxiy</h1>
    <br>


Install
-------------------

```
git clone https://github.com/WmMorgan/Job-app.git
cd job-app
php init
php yii/migrate
    login: morgan
    parol: dunyoseni...
```
Install via docker
-------------------
```
git clone https://github.com/WmMorgan/Job-app.git
cd job-app
docker-compose build
docker-compose up -d

   link app: localhost:20080
   link API: localhost:6060/v1/stataments
   link postgres pgadmin: localhost:5050 
        login: admin@app.net
        parol: admin
api-example
    https://www.getpostman.com/collections/ac6f046d32a86c2226e5

!Eslatma: dockerda ishga tushirganda port 80 bo'lishi,
kerak agar os windows bo'lsa docker-compose.yml va app papkalardagi Dockerfile.larda portni 80dan ->8080 ga o'zgartirish kerak.
```


