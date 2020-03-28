FROM node:8.11.3 as build-deps
WORKDIR /usr/src/app
COPY package.json ./
RUN npm install
COPY . ./
RUN npm dev
