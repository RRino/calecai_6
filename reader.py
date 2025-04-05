from itertools import zip_longest
from pathlib import Path
import re

data = Path("attivita.txt").read_text()

values = (
    1,
    0,
    "0",
    "1",
    '"3"',
    "Passeggiata nel bosco",
    None,
    "In giro in mezzo agli alberi",
    "10",
    "20",
    "Mario",
    "Rossi",
    "3934708659",
    "mario.rossi@example.com",
    None,
    None,
    "2025-04-11",
    "2025-04-11",
    0,
    "2025-04-05",
    "2025-04-10",
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    "river-sunset-nature-png-5690483.png",
    "I-Borghi-della-Valmarecchia-16-03-2025.pdf",
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    None,
    "https://docs.google.com/forms/d/e/1FAIpQLSf8OuKU7BBei4gFignL6Oz8i15P3INxCUJ49WY6qVBaBKJbaA/viewform?usp=dialog",
    "amministratore@example.com",
    0,
    None,
    1,
    "2025-04-04 18:34:30",
    "2025-04-04 18:34:30",
)
fields = []

for line in data.splitlines():
    field = re.search(r"`\w*`", line)
    if field:
        fields.append(field.group(0))
        
for field, value in zip_longest(fields, values):
    print(field, value)

