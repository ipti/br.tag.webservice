FROM node:alpine

WORKDIR /usr/api

COPY package*.json ./
RUN npm install

COPY . .

EXPOSE 3333

CMD ["npm","start"]