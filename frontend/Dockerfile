FROM nginx:stable-alpine

# Copy static frontend files into nginx's html directory
COPY . /usr/share/nginx/html

# Optional: remove default nginx index if present
# RUN rm -f /usr/share/nginx/html/index.nginx-debian.html

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
