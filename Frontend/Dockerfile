FROM node:10.5

RUN apt-get update -qq && apt-get install -y build-essential libpq-dev vim

WORKDIR /Frontend
COPY . .

RUN yarn install

RUN npm install -g @angular/cli

EXPOSE 4200
