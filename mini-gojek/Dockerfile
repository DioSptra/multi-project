FROM python:3.10

WORKDIR /app

# Copy semua file dalam folder mini_gojek ke dalam container
COPY . .

# Install dependensi
RUN pip install --no-cache-dir -r requirements.txt

# Jalankan aplikasinya
CMD ["python", "app.py"]
