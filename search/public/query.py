import re
import sys
import json
import pickle

# Argumen check
if len(sys.argv) < 4:
    print("\n\nPenggunaan\n\tquery.py [index] [n] [query] [category]\n")
    sys.exit(1)

index_path = sys.argv[1]
n = int(sys.argv[2])
query = sys.argv[3].strip()  # Ambil query dari argumen
category = sys.argv[4].strip() if len(sys.argv) > 4 else ''  # Ambil kategori dari argumen jika ada

with open(index_path, 'rb') as indexdb:
    indexFile = pickle.load(indexdb)

# Menggabungkan semua argumen query menjadi satu string
queries = query.split() if query else []

list_doc = {}

# Filter berdasarkan query
if queries:
    for q in queries:
        try:
            for doc in indexFile[q]:
                if category and doc['category'].lower() != category.lower():
                    continue  # Skip jika kategori tidak cocok
                if doc['url'] in list_doc:
                    list_doc[doc['url']]['score'] += doc['score']
                else:
                    list_doc[doc['url']] = doc
        except KeyError:
            continue

# Filter berdasarkan kategori saja jika tidak ada query
elif category:
    for key, docs in indexFile.items():
        for doc in docs:
            if doc['category'].lower() == category.lower():
                if doc['url'] in list_doc:
                    list_doc[doc['url']]['score'] += doc['score']
                else:
                    list_doc[doc['url']] = doc

# Convert to list and sort
list_data = [list_doc[data] for data in list_doc]
sorted_data = sorted(list_data, key=lambda k: k['score'], reverse=True)

# Output hasil pencarian
for count, data in enumerate(sorted_data[:n], start=1):
    print(json.dumps(data))
