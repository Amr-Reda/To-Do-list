# To-Do-list
The application is separated into backend API generate JSON response and frontend access this api.

#How_to_run
#########################
step 1: git clone https://github.com/WessamSaeid/To-Do-list-.git

{if you do not have mongodb server:
run command 'sudo apt-get install mongodb'
            'sudo apt-get install php-mongodb'}

step 2: run command 'mongod'

step 3: cd Backend
step 4: run command 'composer install'
step 5: rename .env.example file to just .env
step 6: run command 'php artisan serve'

step 7: cd Frontned
step 8: npm install
step 9: run command  'ng update' 
step 10: run command 'ng serve'

step 11:  open your browser on http://localhost:4200/

###########################
if you want to run with docker:

step 1 : run command sudo docker-compose build
step 2 : run command sudo docker-compose up 
step 3:  open your browser on http://localhost:4200/

