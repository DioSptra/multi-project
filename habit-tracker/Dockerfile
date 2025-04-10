FROM node:18

# Set working directory di dalam container
WORKDIR /app

# Copy package.json dulu biar npm install bisa cache
COPY package.json ./

# Install dependencies
RUN npm install

# Copy semua file project ke dalam container
COPY . .

# Jalankan aplikasi
CMD ["node", "app.js"]

# Expose port (ganti kalau kamu pakai port lain)
EXPOSE 3000
