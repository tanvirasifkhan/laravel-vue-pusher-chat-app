FROM node:22.17-alpine3.22

RUN apk update && apk upgrade && apk add git bash

WORKDIR /frontend

COPY package*.json ./

RUN npm install

COPY . ./

CMD ["npm", "run", "dev"]