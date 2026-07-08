import os
from dotenv import load_dotenv
import requests

load_dotenv()

# PENTING: Masukkan API Key milikmu di sini
api_key = os.getenv("GEMINI_API_KEY")
url = f"https://generativelanguage.googleapis.com/v1beta/models?key={api_key}"

print("Sedang memindai daftar model langsung dari server Google...")
response = requests.get(url)
data = response.json()

if 'error' in data:
    print(f"Error: {data['error']['message']}")
else:
    print("\nDaftar model yang TERSEDIA dan BISA DIGUNAKAN untuk generateContent:")
    for m in data.get('models', []):
        if 'generateContent' in m.get('supportedGenerationMethods', []):
            # Memotong teks 'models/' agar langsung dapat nama intinya
            print(f"- {m['name'].replace('models/', '')}")