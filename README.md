# Santins
Nesse projeto foi desenvolvido um sistema básico usando Laravel e Nuxt (Vue.js), sendo que o frontend em Nuxt vai consumir a API em Laravel seguindo o padrão REST. Para autenticação do frontend com o backend foi utilizado a biblioteca Laravel Sanctum, tento como principal motivador, a sua facilidade em gerenciamento de permissões e grupos.

Para facilitar a execução do sistema, estão disponíveis os arquivos necessários para execução do sisteam usando o docker, com isso será possível que todos executem o sistema em um ambiente muito semelhante, mitigando alguns problemas relacionados com o ambiente de execução. Vale salientar, que os containers disponíveis são: 
- Um container para execução da base de dados;
- Um container com o phpMyAdmin para possíveis acessos e verificações na base de dados;
- Um container para execução do backend com PHP8;
- Um container com o node 14.15.4, para execução do frontend.

Ademais, todos os containers, estão na mesma rede para facilitar a cominicação deles e suas resoluções de nomes, porém futuramente pode ser interessante seguimentar esses container em redes que forneçam um isolamento, para que só quem precisar acessar um container possa acessar ele.

# Como rodar o ambiente?
- Primeiro você deve criar o arquivo de ambiente do Laravel, para isso você pode copiar o arquivo de exemplo com o comando `cp .env.example .env`, caso você queira mudar alguma configuração no ambiente docker, você deve atualizar o arquivo de ambiente com essa nova informação;
- Você deve levantar os containers do ambiente, sendo que isso pode ser feito com o comando `docker-compose up`;
- Depois disso, você deve migrar as informações para a base de dados, para isso você pode usar o comando `docker exec santins_back php artisan migrate`;